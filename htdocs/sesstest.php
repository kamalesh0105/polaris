<pre>

<?
include "libs/load.php";
if(isset($_GET['logout'])){
    $out=new Usersession(Session::get('session_token'));
    if($out){
        $out->remove_session();
        echo "sucess";
        print_r($_SESSION);
        session_destroy();
        print_r($_COOKIE);
        echo"destroyed";
        print_r($_SESSION);
        print_r($_COOKIE);


    }else{
        echo"failed";
    }

}
// if(isset($_GET['logout'])) {
//     if(Session::isset('session_token')) {
//         $sess=new Usersession(Session::get('session_token'));
//         if($sess) {
//             echo"<h3> previous session has been removed from db</h3>"   ;
//             $sess->remove_session();
//         } else {
//             echo "<h3>previous session could'nt be remove from db</h3>";
//         }
//     }
//     Session::destroy();
//     //header("Location: /");
//     die();
// }
// else{
//     echo "failed";
// }
?>
</pre>
