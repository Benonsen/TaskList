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
      
      //echo "<a class=btn btn-success onclick=toastr.success('Hi! I am success message.');>Success message</a>";
      
      
      $db->getLastInsertID();
          
    }
    
    public static function getAllTaskByUserId(){
        $db = new MySqlDatabase();
        
        $stmt = $db->executeQuery('SELECT * FROM task WHERE user_id=?', 'i', $_SESSION['user']['id']);
        
        $stmt->bind_result($rs_id, $rs_create_date, $rs_modify_date, $rs_titel, $rs_beschreibung, $rs_start_date, $rs_end_date, $rs_category, $rs_priority, $user_id, $done);
                
        $result = Array();
        
        while ($stmt->fetch()){
            $result[] = new Task($rs_id, $rs_create_date, $rs_modify_date, $rs_titel, $rs_beschreibung, $rs_start_date, $rs_end_date, $rs_category, $rs_priority, $user_id, $done);
        }
        
        return $result;
    }
}
?>
