<?php
include "libs/load.php";
//print("oo".__DIR__."00");
if(isset($_GET['logout'])){
    if(Session::isset('session_token')){
        $sess=new Usersession(Session::get('session_token'));
        if($sess){
           echo"<h3> previous session has been removed from db</h3>"   ;
           $sess->remove_session();       
        }else{
       echo "<h3>previous session could'nt be remove from db</h3>";
        }
    }
    Session::destroy();
    header("Location: /htdocs/");
    die();  

}else{
    Session::renderpage();
}?>