<?
class User{
    private $conn;

    public static function signup($username,$password,$email,$phone){

        $conn=Database::get_connection();

        $sql =" INSERT INTO `auth` (`username`, `password`,`email`, `phone`, `blocked`, `active`)
        VALUES ('$username','$password','$email','$phone', '0', '1')";
        $error=false;
        if ($conn->query($sql) === TRUE) { $error=false;
        } else {
            $error=$conn->error;
            //echo "Error:;
        
        }
        return $error;


    }

    public function __construct($username){
        $this->conn=Database::get_connection();
       // $this=>conn->query();
    }
    


    //class ends here
}



?>