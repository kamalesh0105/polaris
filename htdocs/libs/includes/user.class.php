<?
include_once __DIR__ . "/../trait/SQLGetterSetter.trait.php";
class User
{
    public $conn = false;
    public $username;
    public $id;
    public $data;
    use SQLGetterSetter;

    public static function signup($username, $password, $email, $phone)
    {

        $conn = Database::get_connection();
        //$password=md5(strrev(md5($password)));//security through obsecurity...
        $options = ['cost' => 7,];
        $pass = password_hash($password, PASSWORD_BCRYPT, $options);
        $sql = " INSERT INTO `auth` (`username`, `password`,`email`, `phone`, `active`,`isadmin`)
        VALUES ('$username','$pass','$email','$phone','1','0')";
        //* use this instead
        try {
            return $conn->query($sql);
        } catch (Exception $e) {
            echo "Error" . $sql . "<br>" . $conn->error . "catched error:" . $e;
        }
    }

    public function __construct($username)
    {
        //echo"Constructor got called,$username";
        $this->conn = Database::get_connection();
        $this->username = $username;
        $this->id = null;
        $this->table = 'auth';
        //me
        $query = "SELECT * FROM `auth` WHERE `username` = '$username' OR `id` = '$username' OR `email` = '$username' LIMIT 1";
        $result = $this->conn->query($query);
        if ($result->num_rows) {
            $data = $result->fetch_assoc();
            //print_r($data);
            $this->id = $data['id'];
            //echo "\nid=$this->id";
        } else {
            throw new Exception("Username does not exists...");
        }
    }

    public static function login($user, $pass)
    {
        //$pass=md5(strrev(md5($pass)));
        $query = "SELECT * FROM `auth` WHERE `username` = '$user'";
        $conn = Database::get_connection();
        $result = $conn->query($query);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            //if($data['password']==$pass) {
            // echo "inside verify";
            if (password_verify($pass, $data['password'])) {
                //echo "inside return";

                return $data['username'];
                //return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //extra
    //class ends here

}
