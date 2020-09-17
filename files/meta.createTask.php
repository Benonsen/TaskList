<?php

require_once '../tasklist/classes/class.taskdao.php';
require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';

if(isset($_POST['titeldb']) && isset($_POST['beschreibungdb']) && isset($_POST['datumdb']) && isset($_POST['prioritaetdb']) && isset($_POST['user_id_db'])){
    Taskdao::createTask($_POST['titeldb'], $_POST['beschreibungdb'], $_POST['datumdb'], $_POST['prioritaetdb'], $_POST['user_id_db']);
    
}

?>