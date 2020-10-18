<?php

require_once '../tasklist/classes/class.taskdao.php';
require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';

if(isset($_POST['task_id_done'])){
    Taskdao::markTaskasDone($_POST['task_id_done']);
}
?>