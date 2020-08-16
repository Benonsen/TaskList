<?php
/*
function OpenCon(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "tasklist";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die ("Connection failed". $conn->error);

    return $conn;
}

function CloseCon($conn){
    $conn -> close();
}
*/?>
<?php

class MySQLDatabase{

    protected $db;

    protected function connect(){
        $this->db = @new mysqli('127.0.0.1', 'root', '', 'tasklist');
        if(mysqli_connect_errno()){
            echo mysqli_connect_error() . " - " . mysqli_connect_errno();
            header('Location: ./error.php');
            exit();
        }
        $this->db->set_charset("utf8");
    }

    public function executeQuery($query, $type = NULL){
        static::connect();
        $results = $this->db->prepare($query);
        if(!$results){
            echo $this->db->error;
            echo $query;
            //header('Location: ./error.php');
            exit();
        }
        if(!is_null($type)){
            $do = array();
            for($i = 2; $i < func_num_args(); $i++)
                $do[] = func_get_arg($i);

            $refs = array();
            foreach($do as $key => $value)
                $refs[$key] = &$do[$key];
            call_user_func_array(array($results, "bind_param"), array_merge(array($type), $do));
        }
        $results->execute();
        $results->store_result();
        return $results;
    }

    public function executeUpdate($query, $type = NULL, $returnID = false){
        static::connect();
        $results = $this->db->prepare($query);


        if(!$results){
            echo $this->db->error;
            echo $query;
// 			header('Location: ./error.php');
// 			exit();
        }
        if(!is_null($type)){
            $do = array();

            for($i = 2; $i < func_num_args(); $i++){
                if($type{$i-2}=="s"){
                    $do[] = htmlentities(func_get_arg($i));
                }else
                    $do[] = func_get_arg($i);
            }


            $refs = array();
            foreach($do as $key => $value)
                $refs[$key] = &$do[$key];

            call_user_func_array(array($results, "bind_param"), array_merge(array(strtolower($type)), $do));
        }
        $results->execute();

        echo $results->error;
        if(strpos($query, 'INSERT')===0)
            return mysqli_insert_id($this->db);
        else
            return mysqli_affected_rows($this->db);
    }

    public function getLastInsertID(){
        return $this->db->insert_id;
    }

    public function rowsAffected(){
        return $this->db->affected_rows;;
    }

    public function close(){
        $this->db->close();
    }
}
?>
