<?
include_once "libs/load.php";
$user="root";
$pass="toor";
$result=null;
//print_r($_SESSION);
if(Session::get('is_loggedin')){
    echo "Already signed in";
    $userdata=Session::get('session_user');
    //echo "userdata=".$userdata;
    echo "Welcome again $userdata[username]";


}else{
        print("Log in now fella....");
        $result=User::login($user,$pass);

        //print_r($result);
        if($result){
          
            Session::set('is_loggedin',true);
            Session::set('session_user',$result);
            echo "Login Success..";
            //print_r("Result..$result");
        
        }else{
            echo "Login failed...";
        }
        
}


?>