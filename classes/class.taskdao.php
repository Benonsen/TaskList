<?php
require_once '../tasklist/classes/class.task.php';
require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';

Class Taskdao
{
    public static function createTask($titel, $beschreibung, $datum, $prio, $user_id)
    {
      $db = new MySQLDatabase();
      $datum = strtotime($datum);
      
      $stmt = $db->executeQuery('INSERT INTO task (create_date, modify_date, titel, end_date, beschreibung, priority, user_id) VALUES  (?,?,?,?,?,?,?)', 'iisissi', time(), 0, $titel, $datum, $beschreibung, $prio, $user_id);
      
      $db->getLastInsertID();
          
    }
}
?>
