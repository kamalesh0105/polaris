<?
include "libs/load.php";
$a=null;
if(isset($a)){
    echo "set";
}else{
    echo "not set";
}
$pos=Post::getAllPosts();
print_r($pos);
$p= new Post($pos[0]['id']);
$val=$p->getpost_text();
$sup=$p->getimage_uri();
echo "$val,$sup";

?>