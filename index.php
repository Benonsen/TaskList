<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<!-- Bootstrap CSS CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<!-- Our Custom CSS -->
<link rel="stylesheet" href="../tasklist/style/login.css">

<!-- Blau-Farbton logo 46c4f9 -->

<style>
    body {
        background: #efefef;
    }
</style>
<?php
require_once '../tasklist/classes/class.user.php';
require_once '../tasklist/classes/class.userdao.php';
require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';


session_start();

if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 1:
                require_once '../tasklist/files/meta.login.php';

            case 1000:
                require_once '../tasklist/files/src.createaccount.php';
                break;

            case 2000:
                require_once '../tasklist/files/src.createTaskFrom.php';
                break;

            case 2500:
                require_once '../tasklist/files/meta.createTask.php';
                break;
        }
    } else {
        require_once '../tasklist/files/src.home.php';
    }
} else {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'doLogin':
                require_once '../tasklist/files/meta.login.php';
                break;
            case 'SignUpForm':
                require_once '../tasklist/files/src.createaccount.php';
                break;
            case 'doSignUp':
                require_once '../tasklist/files/meta.signup.php';
                break;
        }
    } else {
        require_once '../tasklist/files/src.login.php';
    }
}
?>