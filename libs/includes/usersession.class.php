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

        $sess= new Usersession($token);


    }

    function __construct($token){
        $this->conn=Database::get_connection();
        $this->token=$token;
        $this->data=null;
        $sql="SELECT * FROM `session` WHERE `token` = $token LIMIT 1";
        $row=$this->conn->query($sql);
        if($row->num_rows){
            $data=$row->fetch_assoc();
            $this->data=$data;
            $this->uid=$data['uid'];
        }else{
            throw new Exception("Sesion is Invlaid");

        }

    }
 public function getuser(){

    return new user($this->id);
}



}



?>