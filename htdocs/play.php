<?
//include "libs/load.php";
//$img_path = get_config('upload_path');
$img_path = "/home/geek/polaris_uploads/";
$filename = $img_path . $_GET['name'];
$obj = fopen($filename, "rb");
if ($obj == true) {
    $contents = fread($obj, filesize($filename));
    fclose($obj);
    header("content-type:" . mime_content_type($filename));
    header("content-Length:" . filesize($filename));
    echo $contents;
} else {
    echo "Some error";
}
