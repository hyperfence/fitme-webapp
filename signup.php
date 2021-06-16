<?php
    require "config/initialize.php";

    if($loggedin == true)
    {
        header("Location: home.php");
    }

    if(isset($_POST["signup-submit"]))
    {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $age = $_POST["age"];
        $weight = $_POST["weight"];
        $height = $_POST["height"];
        // DB Query Here

        header("Location: complete-reg.php");
        exit();
    }

    $page_title = "Register";

    include "templates/header.html";
    include "templates/signup.html";
    include "templates/footer.html";

?>