<pre>
<?
include "libs/load.php";
//Session::start();
setcookie("testcookie","testvalue",time()+(86400*30),"/");
//print_r($_SERVER);
//print_r($_GET);
//print_r($_POST);
//print_r($_FILES);
print_r($_COOKIE);
print_r($_SESSION);
if(isset($_GET['clear'])){
    echo "unsetting sesssion....";
    Session::unset();
}
if(isset($_GET['destroy'])){
    echo "destroying sesssion....";
    Session::destroy();
}
if(isset($_SESSION['a'])){
    print("A already exists :$_SESSION[a]\n");
}else{
    $_SESSION['a']=time();
    print("Assigning A value:$_SESSION[a]\n");
}


?>
</pre>