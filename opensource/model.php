<?php

//! Database Connection
class Model
{

    public static $conn = null;

    public static function get_db()
    {

        $servername = 'localhost';
        $usernamedb = 'root';
        $passwordb = 'alpha';
        $dbname = 'photogram';
        if (Model::$conn == null) {
            $connection = new mysqli($servername, $usernamedb, $passwordb, $dbname);
            if ($connection->connect_error) {
                die("connection failed" . $connection->connect_error);
            } else {
                Model::$conn = $connection;
            }
        }
    }
    public static function signup($username, $password)
    {
        $sql = "INSERT INTO `lib_user` (`name`, `email`, `number`, `password`)
        VALUES ('kamalesh', 'kamaleshselvam75@gmail.com', '6385896668', 'pass')";
    }
    //! function for insert records
    public function insertRecord($post)
    {
        $name = $post['name'];
        $email = $post['email'];
        $sql = "insert into lib_users(name,email) values('$name','$email')";
        $result = $this->conn->query($sql);

        if ($result) {

            //? location will divert to index.php page
            //? this string will use in index page or where we need to display alert when GET['msg'] variable is set

            header('location:index.php?msg=insert');
        } else {
            echo 'error' . $sql . '<br>' . $this->conn->error;
        }

        //? below if statement is also right to display message but it'll display message at top. 
        //? above if statement is used to display message whereever we want by using if(isset) condition

        // if ($result) {
        //     // The query was successful.
        //     echo 'Record inserted successfully.';
        // } else {
        //     // The query failed.
        //     echo 'Error inserting record: ' . $this->conn->error;
        // }
    }

    //! Function for Update Record

    public function updateRecord($post)
    {
        $name = $post['name'];
        $email = $post['email'];
        $updateid = $post['upd'];
        $sql = "update lib_users set name ='$name', email = '$email' where id = '$updateid'";
        $result = $this->conn->query($sql);

        if ($result) {

            //? location will divert to index.php page
            //? this string will use in index page or where we need to display alert when GET['msg'] variable is set

            header('location:index.php?msg=update');
        } else {
            echo 'error' . $sql . '<br>' . $this->conn->error;
        }
    }

    //! Function for delete record

    public function deleteRecord($did)
    {
        $sql = "delete from lib_users where id = '$did'";
        $result = $this->conn->query($sql);

        if ($result) {
            header('location:index.php?msg=delete');
        } else {
            echo "Error " . $sql . "<br>" . $this->conn->error;
        }
    }

    //! Function for  Display records

    public function displayRecord()
    {
        $sql = "select * from lib_users";
        $result = $this->conn->query($sql);
        // $result = mysqli_query($this->conn,$sql);

        if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
                $data[] = $rows;
            } //* while loop closev
            return $data;
        } //* if loop close

        //? we can also write same code in different way

        // $result = mysqli_query($this->conn,$sql);
        // $num_rows = mysqli_num_rows($result);

        // if($num_rows>0){
        //     while($fetch = mysqli_fetch_assoc($result)){
        //         $data[] = $fetch;
        //     }
        //     return $data;
        // }
    }

    //! funtion for editid

    public function displayRecordById($editid)
    {
        $sql = "select * from lib_users where id = '$editid'";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row;
        }
    }
}
