<?

$res = "kamalesh";
$file_path = $_GET['file'];

function startsWith($haystack, $needle)
{
    return substr($haystack, 0, strlen($needle)) === $needle;
}

function fetch_file($file_path)
{
    if (startsWith($file_path, "/")) {
        $file_path = basename($file_path);
    }
    $sanitized_path = str_replace("./", "#", $file_path);
    $output = require($sanitized_path);
    echo $output;
}
