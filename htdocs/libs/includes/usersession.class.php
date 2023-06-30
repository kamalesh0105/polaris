<?

class Usersession
{
    public $id;
    public $data;
    public $uid;
    public $token;
    public $conn=null;

    
    public static function authenticate($name, $pass)
    {
        $username=User::login($name, $pass);

        if($username) {
            $user=new User($username);
            $ip=$_SERVER['REMOTE_ADDR'];
            $agent=$_SERVER['HTTP_USER_AGENT'];
            $token=md5(rand(0, 99999).$ip.$agent.time());

            $conn=Database::get_connection();
            //echo "id===$user->id";
            $sql=" INSERT INTO `session` (`uid`, `token`,`login_time`, `ip`,`user_agent`,`active`)
             VALUES ('$user->id','$token',now(),'$ip','$agent','1')";
            $result1=$conn->query($sql);
            if($result1) {
                Session::set('session_token', $token);
               // echo"token-$token";
                return $token;

            } else {//echo"false now";
                return false;
            }
            //new

        } else {
            return false;
        }



    }

    public static function authorize($token)
    {
        try {
            //echo"temp-verify";
            //echo"/n$token";
            $session= new Usersession($token);
            //echo"temp-verify";
            
            
            if(isset($_SERVER['REMOTE_ADDR']) and isset($_SERVER["HTTP_USER_AGENT"])) {
                if($_SERVER['REMOTE_ADDR']==$session->get_ip()) {
                    if($_SERVER["HTTP_USER_AGENT"]==$session->get_useragent()) {
                       // echo"temp-verify";
                        Session::$user = $session->getUser();
                        //echo"temp-verify";
                        return $session;
                    }throw new Exception("User agent doesn't match");


                }throw new Exception("IP doesnt match");
            }throw new Exception("ip or user agent is empty");

        } catch(Exception $e) {
            throw new Exception("something is wrong...+$e");

        }
    }


public function __construct($token)
{
   // echo "Construtor got called";
    $this->conn=Database::get_connection();
    $this->token=$token;
    $this->data=null;
    $sql="SELECT * FROM `session` WHERE `token` = '$token' LIMIT 1";
    $row=$this->conn->query($sql); 
    //echo "Construtor got called";
    if($row->num_rows) {
        $data=$row->fetch_assoc();
        //echo "Construtor got called";
        //print_r($data);
        $this->data=$data;
        $this->uid=$data['uid'];
    } else {
        throw new Exception("Session is Invlaid");

    }
}
 public function getuser()
 {
    //echo("tt-$this->id");
     return new user($this->data['uid']);
 }

public function get_ip()
{
    return isset($this->data["ip"]) ? $this->data["ip"] : false;
}

public function get_useragent()
{
    return isset($this->data['user_agent']) ? $this->data['user_agent'] : false;
}

public function isActive()
{
    if (isset($this->data['active'])) {
        return $this->data['active'] ? true : false;
    }
}
public function remove_session()
{
if(isset($this->data['id'])) {
    $id=$this->data['id'];
    if(!$this->conn) {
        $this->conn =Database::get_connection();
    }
    $sql="DELETE FROM `session` WHERE ((`id` = '$id')) ";
    if($this->conn->query($sql)) {
        return true;
    } else {
        return false;
    }
    }
}
public function deactivate()
{
    if (!$this->conn) {
        $this->conn = Database::get_Connection();
    }
    $sql = "UPDATE `session` SET `active` = 0 WHERE `uid`=$this->uid";

    return $this->conn->query($sql) ? true : false;
}


public function isValid()
{
   /// echo "isvalid func";
    if (isset($this->data['login_time'])) {
        $login_time = DateTime::createFromFormat('Y-m-d H:i:s', $this->data['login_time']);
        if (3600 > time() - $login_time->getTimestamp()) {
            //echo"true";
            return true;
        } else {
           // echo"false";
            return false;
        }
    } else {
        throw new Exception("login tiem is null");
    }
}

public function test(){
    echo "test got called";
}





}





?> 