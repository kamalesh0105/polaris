<?

use Database as GlobalDatabase;

class Database{
    public static $conn=null;

    public static function get_connection(){

    if(Database::$conn==null) {



$servernamedb = "localhost";
$usernamedb = "root";
$passwordb = "alpha";
$dbname = "photogram";

// Create connection
$connection = new mysqli($servernamedb, $usernamedb, $passwordb, $dbname);
// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}else{
    //printf("Creating new connection....");
    Database::$conn=$connection;
    return Database::$conn;
    //echo "connection-Success";
}
    }else{
       // printf("Returning existing connection.....");
        return Database::$conn;
    }

}

}



?>