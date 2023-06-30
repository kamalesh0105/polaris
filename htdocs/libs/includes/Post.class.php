<?php
include_once __DIR__."/../trait/SQLGetterSetter.trait.php";
class Post
{
    public $id;
    public $conn;
    use SQLGetterSetter;
    public static function registerPost($text, $image_tmp)
    {
        if(is_file($image_tmp) and exif_imagetype($image_tmp)!==False) {
            $author=Session::getUser()->getEmail();
            $image_name=md5($author.time()).image_type_to_extension( exif_imagetype($image_tmp));//change the id gen algorithm
            $image_path=get_config("upload_path")."$image_name";
            //echo"$author=$image_name=$image_path";
            if(move_uploaded_file($image_tmp, $image_path)) {
                $image_uri="?name=$image_name";
                $insert_cmd="INSERT INTO `posts` (`post_text`,`multiple_image`, `image_uri`, `like_count`, `upload_time`, `owner`)
    VALUES ('$text',0, '$image_uri', '0', now(), '$author')";
                //echo "$image_uri----$insert_cmd";   
                $db=Database::get_connection();
                if($db->query($insert_cmd)) {
                    $id=mysqli_insert_id($db);
                    return new Post($id);
                } else {
                    throw new Exception("sql error");
                    return false;
                }
            } else {
                echo "failed";
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
