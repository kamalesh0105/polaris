<?php

function load_template($name){
    #print("including ".__DIR__."/../_templates/$name.php");
    #print(__FILE__);
    include $_SERVER["DOCUMENT_ROOT"]."/app/_templates/$name.php";
}

function verify_credentials($username,$password){
    if($username =="user@gmail.com" and $password=="root"){
        return true;
    }else{
        return false;
    }
}

function signup($username,$password,$email,$phone){
$servernamedb = "localhost";
$usernamedb = "root";
$passwordb = "alpha";
$dbname = "photogram";

// Create connection
$conn = new mysqli($servernamedb, $usernamedb, $passwordb, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{
    //echo "connection-Success";
}

$sql =" INSERT INTO `auth` (`username`, `password`,`email`, `phone`, `blocked`, `active`)
VALUES ('$username','$password','$email','$phone', '0', '1')";
$error=false;
if ($conn->query($sql) === TRUE) { $error=true;
} else {
    $error=$conn->error;
    //echo "Error:;

}


$conn->close();
return $error;
echo $error;
}

?>