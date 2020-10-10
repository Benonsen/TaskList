<?php

require_once '../tasklist/classes/class.taskdao.php';
require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';

if(isset($_POST['user_id']) && isset($_POST['task_id'])){
    Taskdao::shareTaskWithUser($_POST['task_id'], $_POST['user_id']);
}


?>