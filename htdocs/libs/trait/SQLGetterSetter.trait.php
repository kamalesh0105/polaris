<?
trait SQLGetterSetter
{
    public function __call($name, $arguments=null)
    {
        //print_r($arguments);
        // echo "\ncall got called";
       // $property=preg_replace("/[^0-9a-zA-Z]/", "", substr($name, 3));
      // $property=strtolower(preg_replace('/\B([A-Z])/', '_$1', $property));
        $property=substr($name,3);
        $property=strtolower($property);
        //echo "\n".$property;
        if(substr($name, 0, 3)=='get') {
        if(!isset($arguments)) {
        return $this->_get($property, $arguments[0]);
        } else{
            return $this->_get($property);
        }

        } elseif(substr($name, 0, 3)=='set') {
            return $this->_set($property, $arguments[0]);

        } else {
            throw new Exception(__CLASS__."::__call()->$name function not available");
        }


    }
    private function _get($var,$tab=null)
    {
        //echo "table=$tab";
      
        if(!$this->conn) {
            $this->conn=Database::get_connection();
        }
    try{
        if(!(isset($tab))) {
            $sql="SELECT `$var` FROM `$this->table` WHERE `id` = '$this->id' LIMIT 1";
        } else {
            $sql="SELECT `$var` FROM `$tab` WHERE `id` = '$this->id' or 'uid' ='$this->id' LIMIT 1";
        }
        $result=$this->conn->query($sql);
        if($result->num_rows) {
            $data=$result->fetch_assoc();
            return $data["$var"];
        } else {
            return null;
        }

    }catch(Exception $e){
        throw new Exception(__CLASS__."::_get()->$var ,data unavailable$e");
    }
    

    }



    private function _set($var, $data)
    {
        if(!$this->conn) {
            $this->conn=Database::get_connection();

        }
        try{
            $sql="UPDATE `$this->table` SET $var='$data' WHERE id='$this->id'";

        if($this->conn->query($sql)) {
            //echo "inside condition";
            return true;

        } else {
            return 'error';
        }
        }catch(Exception $e){
            throw new Exception(__CLASS__."::_set()->$var ,data unavailable");
        }



    }
}

?>