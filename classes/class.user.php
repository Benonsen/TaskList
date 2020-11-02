<?php
require_once '../tasklist/classes/class.userdao.php';
require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';

Class User implements JsonSerializable {
    private $id, $username, $password, $email, $ismaster, $create_date, $last_login, $profile_picture;

    public function __construct($_id, $_username, $_password, $_email, $_ismaster, $_create_date, $_last_login, $_profile_picture) {
        $this->id = $_id;
        $this->username = $_username;
        $this->password = $_password;
        $this->email = $_email;
        $this->ismaster = $_ismaster;
        $this->create_date = $_create_date;
        $this->last_login = $_last_login;
        $this->profile_picture = $_profile_picture;
    }

    public function __get($property) {
        if(property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if(property_exists($this, $property)) {
            $this->property = $value;
        }
    }

    public function jsonSerialize() {
        return (object)get_object_vars($this);
    }

}

?>
