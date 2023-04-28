<pre>
<?php 
include "libs/load.php";
//Database::get_connection();
//Database::get_connection();
//Database::get_connection();
//Database::get_connection();
//print_r($_SERVER);
//print_r($_GET);
//print_r($_POST);
//print_r($_COOKIE);
//print_r($_SESSION);
//$da=file_get_contents($_SERVER['DOCUMENT_ROOT'].'/../config.txt');
$servernamedb = get_config('db_server');
//echo "username".$usernamedb;
$usernamedb = get_config('db_username');
$passwordb = get_config('db_pass');
$dbname = get_config('db_name');
$connection = new mysqli($servernamedb, $usernamedb, $passwordb, $dbname);
// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}else{echo "sucess";
}

// Create connection



?>

</pre>
