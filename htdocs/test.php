<pre>
<?php 
 //include_once "libs/load.php";
// $ob=new user('root');

// print_r($_POST);
// print_r($_GET);
// print_r($_FILES);
// print_r($_COOKIE);
include "libs/load.php";
$p=new Post(1);
print($p->getimage_uri());


?>

</pre>
