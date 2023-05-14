<?
include_once "libs/load.php";
$user="root";
$pass=isset($_GET['pass']) ? $_GET['pass'] : '';
$result=null;
//print_r($_SESSION);

if(Session::get('is_loggedin')){
    echo "Already signed in";
    $userdata=Session::get('session_user');
    //echo "userdata=".$userdata;
    echo "Welcome again";
if(isset($_GET['logout'])){
        Session::destroy();
        echo "\nSession Destroyed...<a href='logintest.php'>login again</a>";
    
    }
    


}else{
        print("\nLog in now fella....");
        $result=User::login($user,$pass);
  
        $reul=new user($result['username']);

        //print_r($result);
        if($reul){
          
            Session::set('is_loggedin',true);
            Session::set('session_user',$result);
            echo "Login Success..";
            $bio=$reul->getBio();
            echo("bio:::$bio");
            //print_r("Result..$result");
        
        }else{
            echo "Login failed...$result";
        }
        
}


?>