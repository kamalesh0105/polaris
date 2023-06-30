<?
include "libs/load.php";     
$img_path=get_config('upload_path');
$filename=$img_path.$_GET['name']; 
$obj = fopen($filename, "rb"); 
$contents = fread($obj, filesize($filename)); 
fclose($obj); 
header("content-type:".mime_content_type($filename)); 
header("content-Length:".filesize($filename));
echo $contents;

?>
