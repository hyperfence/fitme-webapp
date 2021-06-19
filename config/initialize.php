<?php
    if(session_id() == '') 
    {
        session_start();
    }

    require "db_conn.php";
    
    if(!isset($_SESSION["LoggedIn"]))
    {
        $_SESSION["LoggedIn"] = false;
        $_SESSION["UserID"] = 0;
        $_SESSION["isInstructor"] = false;
    }

    $loggedin = $_SESSION["LoggedIn"];
    $userID = $_SESSION["UserID"];
    $isInstructor =  $_SESSION["isInstructor"];
?>