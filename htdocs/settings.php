<?
include "libs/load.php";
if(Session::isauthenticated()){
    echo 'yes';
}else{
    Session::ensurelogin();
    echo "no";
}

?>