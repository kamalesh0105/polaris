<?

use Session as GlobalSession;


class Session
{
    public static $user = null;   //object of user class
    public static $usersession = null;


    public static function start()
    {
        session_start();
    }
    public static function unset()
    {
        session_unset();
    }
    public static function destroy()
    {
        session_destroy();
    }
    public static function set($key, $value)
    {

        $_SESSION[$key] = $value;
    }
    public static function del($key)
    {
        unset($_SESSION[$key]);
    }
    public static function isset($key)
    {
        if (
            isset($_SESSION[$key])
        ) {
            return true;
        } else {
            return false;
        }
    }
    public static function get($key, $default = false)
    {
        if (Session::isset($key)) {
            return $_SESSION[$key];
        } else {
            return $default;
        }
    }
    public static  function loadtemplate($name)
    {
        $script = $_SERVER["DOCUMENT_ROOT"] . get_config('base_path') . "_templates/$name.php";
        if (is_file($script)) {
            include $script;
        } else {
            Session::loadtemplate("index/error");
        }
    }
    public static function renderpage()
    {
        load_template("_master");
    }
    public static function currentscript()
    {
        return (basename($_SERVER['SCRIPT_NAME'], '.php'));
    }
    public static function isauthenticated()
    {
        if (is_object(Session::getusersession())) {
            return Session::getusersession()->isValid();
        } else {
            return  false;
        }
    }
    public static function getUser()
    {
        return Session::$user;
    }
    public static function getusersession()
    {
        return Session::$usersession;
    }

    public static function ensurelogin()
    {
        if (!Session::isauthenticated()) {
            Session::set("_redirect", $_SERVER['REQUEST_URI']);
            header("Location: /htdocs/login");
            die();
        }
    }
    public static function isOwnerof($owner)
    {
        $sess_user = Session::getUser();
        if ($sess_user) {
            if ($sess_user->getemail() == $owner or $sess_user->getisadmin()) {
                return true;
            }
        } else {
            return false;
        }
    }
}
