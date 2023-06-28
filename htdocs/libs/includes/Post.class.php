<?php

class Post
{
    public $id;
    public $conn;
    public function __call($name, $arguments)
    {
        //print_r($arguments);
       // echo "\ncall got called";
        $property=preg_replace("/[^0-9a-zA-Z]/","",substr($name,3));
        $property=strtolower(preg_replace('/\B([A-Z])/','_$1',$property));
        //echo "\n".$property;
        if(substr($name,0,3)=='get'){
            return $this->_get($property);

        }elseif(substr($name,0,3)=='set'){  
            return $this->_set($property,$arguments[0]);

        }else{
            throw new Exception(" User::__call()->$name function not available");
        }


    }

    public static function registerPost($text, $image_tmp)
    {
        if(isset($_POST["$image_tmp"])) {
            $author=Session::getUser()->getEmail();
            $image_name=md5($author.time())."jpg"; #TODO //change the id gen algorithm
            $image_path=get_config("uploaf_path")."$image_name";
            if(move_uploaded_file($image_tmp, $image_path)) {
                $insert_cmd="INSERT INTO `posts` (`posttext`, `imageuri`, `likecount`, `uploadtime`, `owner`)
    VALUES ('$text', 'https://c8.alamy.com/comp/RJR7N5/random-objects-on-black-background-vector-illustration-RJR7N5.jpg', '0', now(), '$author')";
                $db=Database::get_connection();
                if($db->query($insert_cmd)) {
                    $id=mysqli_insert_id($db);
                    return new Post($id);
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            throw new Exception("Image not found...");
        }
    }



    public function __construct($id)

    {
        $this->id=$id;
        $this->conn=Database::get_connection();
        $query="SELECT * FROM `posts` WHERE `id` = '$id' LIMIT 1";

    }



    private function _get($var)
    {

        if(!$this->conn) {
            $this->conn=Database::get_connection();
        }
            $sql="SELECT `$var` FROM `posts` WHERE `id` = '$this->id' LIMIT 1";

            //$sql="SELECT `$var` FROM `$table` WHERE `id` ='$this->id' LIMIT 1";

        
        $result=$this->conn->query($sql);
        if($result->num_rows) {
            //echo "\ninside condition";
            $data=$result->fetch_assoc();
            return $data["$var"];
        } else {
            return null;
        }
    }



    private function _set($var, $data)
    {
        if(!$this->conn) {
            $this->conn=Database::get_connection();

        }
        $sql="UPDATE `auth` SET $var='$data' WHERE id='$this->id'";
       
        if($this->conn->query($sql)) {
            //echo "inside condition";
            return true;

        } else {
            return 'sdsad';
        }




    }

}


?>
