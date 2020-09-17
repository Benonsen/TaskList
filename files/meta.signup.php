<?php

require_once '../tasklist/classes/class.userdao.php';
require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';


session_start();


if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    $usernamecheck = userdao::checkUsername($_POST['username'], $_POST['email']);
    if ($usernamecheck) {
        //wenn dr username und die email no frei isch


        $signup = userdao::doSignUP($_POST['username'], $_POST['email'], $_POST['password']);
?>
        <script>
            console.log("neuer Nutzer");
            window.alert("neuer Nutzer");
            location.reload();
        </script>
    <?php
    } else {
        //moch oanfoch no nix -> man kimmp wieder auf die login page 
        //am besten do no a fehlermeldung ausgeben
        //js funktion aufruafen de a fehlermeldung ausgib 
        echo "asdfjkhas�lkdfjal�skdjf";
    ?>
        <script>
            console.log("fehler");
            window.alert("fehler");
            location.reload();
        </script>
<?php
    }
}

if (isset($_POST['logout'])) {
    session_destroy();
}

?>