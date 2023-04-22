<?php

function load_template($name){
    #print("including ".__DIR__."/../_templates/$name.php");
    #print(__FILE__);
    include $_SERVER["DOCUMENT_ROOT"]."/app/_templates/$name.php";
}

function verify_credentials($username,$password){
    if($username =="user@gmail.com" and $password=="root"){
        return true;
    }else{
        return false;
    }
}

?>