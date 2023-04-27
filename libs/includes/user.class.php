<?
class User
{
    private $conn;

    public static function signup($username, $password, $email, $phone)
    {

        $conn=Database::get_connection();
        //$password=md5(strrev(md5($password)));//security through obsecurity...
        $options=['cost'=>7,];
        $pass=password_hash($password,PASSWORD_BCRYPT,$options);
        $sql =" INSERT INTO `auth` (`username`, `password`,`email`, `phone`, `active`)
        VALUES ('$username','$pass','$email','$phone','1')";
        $error=false;
        if ($conn->query($sql) === true) {
            $error=false;
        } else {
            $error=$conn->error;
            //echo "Error:;

        }
        return $error;

    }

    public function __construct($username)
    {
        $this->conn=Database::get_connection();
        // $this=>conn->query();
    }

    public static function login($user,$pass){
        //$pass=md5(strrev(md5($pass)));
        $query="SELECT * FROM `auth` WHERE `username` = '$user'";
        $conn=Database::get_connection();
        $result=$conn->query($query);
        if($result->num_rows==1){          
            $data=$result->fetch_assoc();
            //if($data['password']==$pass) {
            if(password_verify($pass,$data['password'])){
                return $data;
                //return true;
            }else{
                return false;
            }
        }else{
            return false;
        }


    }



    //class ends here
 public static function authenticate()
 {

 }

 public static function set_bio()
 {

 }
 public static function get_bio()
 {

 }
 public static function set_avatar()
 {

 }

 public static function get_avatar(){
    
 }

}

?>