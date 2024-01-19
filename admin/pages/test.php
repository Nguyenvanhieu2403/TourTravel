<?php 
    session_start();
    $userId = "";
    if(isset($_SESSION["id"])) {
        $userId = $_SESSION["id"];
    }
    echo $_SESSION["id"];
?>