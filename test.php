<pre>
<?php 
include_once "libs/load.php";
$ob=new user('root');

$res=$ob->getAvatar();
echo "\nBio is :$res";
if($res){
  echo "\nsuccess...";
}else{
  echo  "failed";
}

?>

</pre>
