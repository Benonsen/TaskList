<?php

function OpenCon(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "tasklist";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die ("Connection failed". $conn->error);

    return $conn;
}

function CloseCon($conn){
    $conn -> close();
}