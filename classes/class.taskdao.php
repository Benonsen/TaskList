<?php
require_once '../tasklist/classes/class.task.php';
require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';

Class Taskdao
{
    public static function createTask($titel, $beschreibung, $datum, $prio, $user_id)
    {
      $db = new MySQLDatabase();
      
      $stmt = $db->executeQuery('INSERT INTO task (create_date, modify_date, titel, beschreibung, start_date, end_date, category, priority, user_id)')
    }
     
    public static function doSignUP($username, $email, $password){
        $db = new MySQLDatabase();
        
        
        $stmt = $db->executeQuery('SELECT username, email FROM user WHERE username=? or email=?', 'ss', $username, $username);
        $stmt->bind_result($rs_id, $rs_name);

        if ($stmt->fetch()) {
            require_once 'error.php';
            $_GET['action'] = 'notUniqueEmailorUsername';
            return 12;
        }
        else if(!empty ($username) && !empty ($email) && !empty ($password)) {
            $stmt = $db->executeQuery('INSERT INTO user (username, password, email, ismaster, create_date) VALUES (?, ?, ?, ?, ?)', 'ssssi', $username, sha1($password), $email, 0, time());
            $credentials = userdao::doLogin($_POST['username'], $_POST['password']);
    

    
            if(!empty($credentials && $credentials != 1)) {
                $_SESSION['user']['name'] = $credentials['username'];
                $_SESSION['user']['id'] = $credentials['id'];
                $_SESSION['user']['ismaster'] = $credentials['ismaster'];

                Header('Location: '.$_SERVER['PHP_SELF']);
            }
            else if($credentials == 1){
                echo "error";
            }
            return $db->getLastInsertID(); 
        }
        else {
            $_GET['action'] = 'notUniqueEmailorUsername';
        }
        
        
        
    }
    
    public static function checkUsername($username, $email){
        $db = new MySQLDatabase();
        
        $stmt = $db->executeQuery('SELECT id FROM user WHERE username=? or email=?', 'ss', $username, $email);
        $stmt->bind_result($rs_id);
        
         if ($stmt->fetch()){
            return FALSE;
            echo "<input type=hidden id=usernameavailability value=1>";
         }else {
             return TRUE;
            echo "<input type=hidden id=usernameavailability value=0>";
        }
        

        
        
    }
}
?>
