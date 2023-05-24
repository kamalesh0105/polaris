<?php
include_once "includes/Database.class.php";
include_once "includes/user.class.php";
include_once "includes/Session.class.php";
include_once "includes/usersession.class.php";
include_once "includes/Webapi.class.php";
global $_site_config;
echo $_SERVER['DOCUMENT_ROOT'].'-end';
//$_site_config_path=dirname(is_link($_SERVER['DOCUMENT_ROOT']) ? readlink($_SERVER['DOCUMENT_ROOT']) : $_SERVER['DOCUMENT_ROOT'])."/dbconfig.json";
//echo $_site_config_path;
//$_site_config=file_get_contents($_site_config_path);
//echo $_site_config;

$wapi= new webapi();
$wapi->initiate_session();

function get_config($key,$default=null){
    global $_site_config;
    $array=json_decode($_site_config,true);
    if(isset($array[$key])){
        return $array[$key];
    }else{
        return $default;
    }


}


function load_template($name){
    #print("including ".__DIR__."/../_templates/$name.php");
    #print(__FILE__);
    include $_SERVER["DOCUMENT_ROOT"].get_config('base_path')."_templates/$name.php";
}

function verify_credentials($username,$password){
    if($username =="user@gmail.com" and $password=="root"){
        return true;
    }else{
        return false;
    }
}



?>