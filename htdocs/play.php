
<pre><?
//print_r($_SERVER);
include "libs/load.php";
?><br></br><?
$val=Session::$user->getip('session');
echo("out=$val");
?>
</pre>