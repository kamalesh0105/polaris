<?
class Session{
    public $user;

    public static function start(){
            session_start();
    }
    public static function unset(){
        session_unset();   
     }
    public static function destroy(){
        session_destroy();        
    }
    public static function set($key,$value){

        $_SESSION[$key]=$value;
    }
    public static function del($key){
        unset($_SESSION[$key]);
    }
    public static function isset($key){
        if(
        isset($_SESSION[$key])){
            return true;

        }
        else{
            return false;
        }
    }
    public static function get($key,$default=false){
        if(Session::isset($key)){
            //echo "Session has set";
            return $_SESSION[$key];
        }else{
            return $default;
        }
        
    }

}



?>