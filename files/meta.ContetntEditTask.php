<?php
    if(isset($_POST['task_id'])){ 
        $_SESSION['task_id'] = $_POST['task_id'];
        return 1;
    }
    return 2;
?>