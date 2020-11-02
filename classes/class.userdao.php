<?php
require_once '../tasklist/classes/class.user.php';
require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';

Class UserDAO
{
    public static function doLogin($username, $password)
    {
        error_log($username . ' ' . sha1($password));

        $db = new MySQLDatabase();

        $stmt = $db->executeQuery('SELECT id, username, ismaster FROM user WHERE username=? or email=? and password=?', 'sss', $username, $username , sha1($password));
        $stmt->bind_result($rs_id, $rs_name, $rs_ismaster);

        if ($stmt->fetch()) {

            echo $rs_id . $rs_name;
            //update last login
            $stmt = $db->executeQuery('UPDATE user SET last_login =? WHERE id=?', 'ii',time(), $rs_id);
            return array(
                'id' => $rs_id,
                'username' => $rs_name,
                'ismaster' => $rs_ismaster
            );
        }
        else {
            return 1;
        }
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

    public static function getUserInfo($id){
        $db = new MySQLDatabase();

        $stmt = $db->executeQuery('SELECT id, username, password, email, ismaster, create_date, last_login, profile_picture from user WHERE id = ?', 'i', $id);
        $stmt->bind_result($rs_id, $rs_username, $rs_password, $rs_email, $rs_ismaster, $rs_create_date, $rs_last_login, $rs_profile_picture);

        if($stmt->fetch()){
            return new User($rs_id,$rs_username, $rs_password, $rs_email, $rs_ismaster, $rs_create_date, $rs_last_login, $rs_profile_picture);

        }
        

    }
}
?>
