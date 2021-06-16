<?php
    require "config/initialize.php";
    $_SESSION["LoggedIn"] = false;
    header("Location: home.php");
?>