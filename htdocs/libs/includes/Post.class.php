<?php
include_once __DIR__."/../trait/SQLGetterSetter.trait.php";
class Post
{
    public $id;
    public $conn;
    use SQLGetterSetter;
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
        $this->table='posts';
        $this->conn=Database::get_connection();
        $query="SELECT * FROM `posts` WHERE `id` = '$id' LIMIT 1";

    }



   


}


?>
