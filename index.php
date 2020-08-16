
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

<!-- Blau-Farbton logo 46c4f9 -->

<style>
    body{
        background: #efefef;
    }

</style>
<?php
require_once '../tasklist/classes/class.user.php';
require_once '../tasklist/classes/class.userdao.php';
require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';


session_start();
/*
require_once 'header.php';
//require_once 'home.php';
$conn = OpenCon();
if($conn){
    //echo "DB Conn works";
}
else{
    echo "ERROR";
}

CloseCon($conn);


*/
if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    if(isset($_GET['action'])) {
        switch($_GET['action']) {
            case 1:
                require_once '../tasklist/files/meta.login.php';
                /*
            case 1000:
                require_once '../verkaufsportal/files/src.insertcustomer.php';
                break;
            case 1001:
                require_once '../verkaufsportal/files/src.home.php';
                break;
            case 1002:
                require_once '../verkaufsportal/files/src.updatecustomer.php';
                break;
            case 1003:
                require_once '../verkaufsportal/files/src.angeboteUser.php';
                break;
            case 1004:
                require_once '../verkaufsportal/files/src.angeboteMaster.php';
                break;
            case 1005:
                require_once '../verkaufsportal/files/src.artikel.php';
                break;
            case 1006:
                require_once '../verkaufsportal/files/src.editartikel.php';
                break;
            case 1007:
                require_once '../verkaufsportal/files/meta.editartikel.php';
                break;
            case 1008:
                require_once '../verkaufsportal/files/src.kunden.php';
                break;
            case 1009:
                require_once '../verkaufsportal/files/src.editkunden.php';
                break;
            case 1010:
                require_once '../verkaufsportal/files/meta.editkunden.php';
                break;
            case 1011:
                require_once '../verkaufsportal/files/src.referenz.php';
                break;
            case 1012:
                require_once '../verkaufsportal/files/src.editreferenz.php';
                break;
            case 1013:
                require_once '../verkaufsportal/files/meta.editreferenz.php';
                break;
            case 1014:
                require_once '../verkaufsportal/files/src.notiz.php';
                break;
            case 1015:
                require_once '../verkaufsportal/files/src.editnotiz.php';
                break;
            case 1016:
                require_once '../verkaufsportal/files/meta.editnotiz.php';
                break;
            case 1017:
                require_once '../verkaufsportal/files/src.editkundenangebot.php';
                break;
            case 1018:
                require_once '../verkaufsportal/files/src.editAngebot.php';
                break;
            case 1019:
                require_once '../verkaufsportal/files/src.getartikelid.php';
                break;

            case 2100:
                require_once '../verkaufsportal/files/meta.editangebot.php';



            case 2000:
                require '../verkaufsportal/files/meta.calculatepreis.php';
                break;

            case 5000:
                require_once '../verkaufsportal/files/meta.kundenbezeichnung.php';
                break;
            case 6000:
                require_once '../verkaufsportal/files/src.home.php';
                break;
            case 9999:
                require '../verkaufsportal/files/meta.calculatepreis.php';
                break;
                */

        }
    } else {
        require_once '../tasklist/files/src.home.php';
    }
} else {
    if(isset($_GET['action'])) {
        switch($_GET['action']) {
            case 'doLogin':
                require_once '../tasklist/files/meta.login.php';
                break;
        }
    } else {
        require_once '../tasklist/files/src.login.php';
    }
}
?>