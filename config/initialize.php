<?php
    if(session_id() == '') 
    {
        session_start();
    }

    require "db_conn.php";
    
    if(!isset($_SESSION["LoggedIn"]))
    {
        $_SESSION["LoggedIn"] = false;
    }

    $loggedin = $_SESSION["LoggedIn"];
?>