<?php
require_once '../tasklist/classes/class.taskdao.php';
require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';

Class Task implements JsonSerializable {
    private $id, $create_date, $modify_date, $titel, $beschreibung, $start_date, $end_date, $catergory, $priority, $user_id;

    public function __construct($_id, $_create_date, $_modify_date, $_titel, $_beschreibung, $_start_date, $_end_date, $_catergory, $_priority, $_user_id) {
        $this->id = $_id;
        $this->create_date = $_create_date;
        $this->modify_date = $_modify_date;
        $this->titel = $_titel;
        $this->beschreibung = $_beschreibung;
        $this->start_date = $_start_date;
        $this->end_date = $_end_date;
        $this->catergory = $_catergory;
        $this->priority = $_priority;
        $this->user_id = $_user_id;
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
