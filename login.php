<?php
    require "config/initialize.php";
    
    if($loggedin == true)
    {
        header("Location: home.php");
    }

    if(isset($_POST["login-submit"]))
    {
        $email = $_POST["email"];
        // DB Query Here
        $_SESSION["LoggedIn"] = true;
        header("Location: home.php");
        exit();
    }

    $page_title = "Login";

    include "templates/header.html";
    include "templates/login.html";
    include "templates/footer.html";
?>