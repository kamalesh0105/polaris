<?
class Usersession{

    public $id,$data,$uid,$token;
    public $conn=null;


    public static function authenication($user,$pass){
        $username=User::login($user,$pass);
        $user=new User($username);
        if($username) {
            $ip=$_SERVER['REMOTE_ADDR'];
            $agent=$_SERVER['HTTP_USER_AGENT'];
            $token=md5(rand(0,99999).$ip.$agent.time());
            
             $conn=Database::get_connection();
             $sql=" INSERT INTO `session` (`uid`, `token`,`login_time`, `ip`,`user_agent`,`active`)
             VALUES ($user->id,$token,now(),$ip,$agent,1)";
             $result=$conn->query($sql);
             if($result){
                Session::set('user_token',$token);
                return $token;
             }else{
                return false;   
             }
//new

        }else{
            return false;
        }
        


    }

    public static function authorize($token){
try {
    $session= new Usersession($token);
    if(isset($_SERVER['REMOTE_ADDR']) and isset($_SERVER["HTTP_USER_AGENT"])){
        if($_SERVER['REMOTE_ADDR']==$session->get_ip()){
            if($_SERVER["HTTP_USER_AGENT"]==$session->get_useragent()){
                Session::$user = $session->getUser();
                return $session;
            }throw new Exception("User agent doesn't match");


        }throw new Exception("IP doesnt match");
    }throw new Exception("ip or user agent is empty");

}catch(Exception $e){
    throw new Exception("something is wrong...");

}
    }


function __construct($token)
{
    $this->conn=Database::get_connection();
    $this->token=$token;
    $this->data=null;
    $sql="SELECT * FROM `session` WHERE `token` = $token LIMIT 1";
    $row=$this->conn->query($sql);
    if($row->num_rows) {
        $data=$row->fetch_assoc();
        $this->data=$data;
        $this->uid=$data['uid'];
    } else {
    throw new Exception("Sesion is Invlaid");

}
}
 public function getuser(){

    return new user($this->id);
}

public function get_ip()
{
    return isset($this->data["ip"]) ? $this->data["ip"] : false;
}

public function get_useragent(){
    return isset($this->data['user_agent']) ? $this->data['user_agent'] :false;
}

public function isActive()
{
    if (isset($this->data['active'])) {
        return $this->data['active'] ? true : false;
    }
}
public function remove_session(){
 
    if(isset($this->data['id'])){
        $id=$this->data['id'];
        if(!$this->conn){
            $this->conn =Database::get_connection();
            $sql="DELETE FROM 'session' WHERE 'id'=$id";
            if($this->conn->query($sql)){
                return true;
            }else{
                return false;
            }
        }
       
    }else
    {
        return false;
    }
}


}





?> 