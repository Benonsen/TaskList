<?php
require_once '../tasklist/classes/class.user.php';
require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';

Class UserDAO
{
    public static function doLogin($username, $password)
    {
        error_log($username . ' ' . sha1($password));

        $db = new MySQLDatabase();

        $stmt = $db->executeQuery('SELECT id, username, ismaster FROM user WHERE username=? and password=?', 'ss', $username, sha1($password));
        $stmt->bind_result($rs_id, $rs_name, $rs_ismaster);

        if ($stmt->fetch()) {

            echo $rs_id . $rs_name;

            return array(
                'id' => $rs_id,
                'username' => $rs_name,
                'ismaster' => $rs_ismaster
            );
        }
    }
}
?>