<?

// $filename=$_GET['name'];
// $path=get_config('upload_path');
// $img_path=$path.$filename;
include_once "libs/load.php";
// $img_pat=get_config('upload_path');
// $img_path=$img_pat.$_GET['name'];
$img_path="/home/geek/polaris_uploads/sunflower.png";
$obj = fopen($img_path, "rb"); 
$contents = fread($obj, filesize($img_path)); 
fclose($obj); 
header("content-type:".mime_content_type($img_path)); 
header("content-Length:".filesize($img_path));
echo $contents;

?>
