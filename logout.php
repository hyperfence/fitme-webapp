<?php
    require "config/initialize.php";
    $_SESSION["LoggedIn"] = false;
    $_SESSION["UserID"] = 0;
    session_destroy();
    header("Location: home.php");
?>