<?
// $img_path = "/home/geek/polaris_uploads/";
// $filename = $_GET['name'];
// $filename = $img_path . $filename;
// $contents = fread($obj, filesize($filename));
// fclose($obj);
// $obj = fopen($filename, "rb");
session_cache_limiter('none');
$filename = $_GET['name'];

if (is_file($filename)) {

    header("content-type:" . mime_content_type($filename));
    header("content-Length:" . filesize($filename));
    header('Cache-control: max-age=' . (60 * 60 * 24 * 365));
    header('Expires: ' . gmdate(DATE_RFC1123, time() + 60 * 60 * 24 * 365));
    header('Last-Modified: ' . gmdate(DATE_RFC1123, filemtime($filename)));
    header_remove('Pragma');

    echo file_get_contents($filename);
} else {
    echo "Some error";
}
