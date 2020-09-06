<?php

require_once '../tasklist/classes/class.userdao.php';
require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';


session_start();


if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    $signup = userdao::doSignUP($_POST['username'], $_POST['email'], $_POST['password']);
    
}
if(isset($_POST['checkusernamedb'])){
    userdao::checkUsername($_POST['username']);
}
if(isset($_POST['logout'])) {
    session_destroy();
}

?>