<?php

require_once '../tasklist/classes/class.userdao.php';
require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';


session_start();


if(isset($_POST['username']) && isset($_POST['password'])) {
    $credentials = userdao::doLogin($_POST['username'], $_POST['password']);


    if(!empty($credentials)) {

        error_log('sesssss');

        $_SESSION['user']['name'] = $credentials['username'];
        $_SESSION['user']['id'] = $credentials['id'];
        $_SESSION['user']['ismaster'] = $credentials['ismaster'];

        Header('Location: '.$_SERVER['PHP_SELF']);
    }
}

if(isset($_POST['logout'])) {
    session_destroy();
}

?>