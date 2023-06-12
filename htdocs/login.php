<?php
include "libs/load.php";
if(Session::isauthenticated()) {
    header("Location: /htdocs/");
    die();
    
}else{
    Session::renderpage();
}
//echo __DIR__;



?>
