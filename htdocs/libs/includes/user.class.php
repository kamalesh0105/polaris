<?
class User
{
    public $conn=false;
    public $username;
    public $id;

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
        public function __call($name, $arguments)
        {
            echo "\ncall got called";
            $property=preg_replace("/[^0-9a-zA-Z]/","",substr($name,3));
            $property=strtolower(preg_replace('/\B([A-Z])/','_$1',$property));
            //echo "\n".$property;
            if(substr($name,0,3)=='get'){
                return $this->_get($property);

            }elseif(substr($name,0,3)=='set'){
                return $this->_set($property,$arguments[0]);

            }else{
                throw new Exception(" User::__call()->$name function not available");
            }


        }
    public function __construct($username)
    {
        echo"Constructor got called\n";
        $this->conn=Database::get_connection();
        $this->username=$username;
        $this->id=null;
        //me
        $query="SELECT * FROM `auth` WHERE `username` = '$username'OR `id` = '$username' OR `email` = '$username' LIMIT 1";
        $result=$this->conn->query($query);
       if($result->num_rows){
        $data=$result->fetch_assoc();
        $this->id=$data['id'];
        echo "\nid=$this->id";
       }else{
        throw new Exception("Username does not exists...");
       }

    }

    public static function login($user,$pass){
        //$pass=md5(strrev(md5($pass)));
        $query="SELECT * FROM `auth` WHERE `username` = '$user'";
        $conn=Database::get_connection();
        $result=$conn->query($query);
        if($result->num_rows==1){          
            $data=$result->fetch_assoc();
            //if($data['password']==$pass) {
               // echo "inside verify";
            if(password_verify($pass,$data['password'])){
                //echo "inside return";

                return $data['username'];
                //return true;
            }else{
                return false;
            }
        }else{
            return false;
        }


    }

private function _get($var){
if(!$this->conn) {
    $this->conn=Database::get_connection();
}
echo "\nget got called:$var";
    $sql="SELECT $var FROM `users` WHERE id='$this->id'";
    $result=$this->conn->query($sql);
    if($result->num_rows){
        echo "\ninside condition";
        $data=$result->fetch_assoc();
        return $data["$var"];
    }else{
        return null;
    }
}


private function _set($var,$data){
if(!$this->conn) {
   // echo"inside setdata function-1";
    $this->conn=Database::get_connection();
   
}

echo"inside setdata function-2,$var,$data";
    $sql="UPDATE `users` SET $var='$data' WHERE id='$this->id'";
    if($this->conn->query($sql)){
       //echo "inside condition";
        return true;

    }else{
        return 'sdsad';
    }
    



}

    //class ends here
//  public static function authenticate()
//  {

//  }

//  public function set_bio($bio)

// {
//     //echo "Setbio got called";
//     return $this->setdata('bio',$bio);

//  }


//  public  function get_bio()
//  {
//     return $this->getdata('bio');

// }
//  public function set_avatar($link)

//  {

//     return $this->setdata('avatar',$link);
//  }

//  public function get_avatar(){ 

//      return $this->getdata('avatar');
    
//  }
 

}

?>