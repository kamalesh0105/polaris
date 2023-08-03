<?
$file_path = $_GET['file'];
//echo "$file_path,1";

function startsWith($haystack, $needle)
{
    echo "inside";
    return substr($haystack, 0, strlen($needle)) === $needle;
}

function fetch_file($file_path)
{
    if (startsWith($file_path, "/")) {
        echo "inside-2";
        $file_path = basename($file_path);
    }
    $sanitized_path = str_replace("./", "#", $file_path);
    echo "res=>$sanitized_path";
    //$output = require($sanitized_path);
    //echo $output;
}
Fetch_file($file_path);
