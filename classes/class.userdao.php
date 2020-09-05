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

           
        }
        else {
            $stmt = $db->executeQuery('INSERT INTO user (username, password, email, ismaster, create_date) VALUES (?, ?, ?, ?, ?)', 'ssssi', $username, sha1($password), $email, 0, time());
        
            return $db->getLastInsertID();
        }
        
        
        
    }
}
?>
