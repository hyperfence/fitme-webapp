<?php
    require "config/initialize.php";

    if($loggedin == true)
    {
        header("Location: home.php");
    }
    $error = "";
    $success = "";
    if(isset($_POST["signup-submit"]))
    {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $age = $_POST["age"];
        $weight = $_POST["weight"];
        $height = $_POST["height"];
        $bmi = $weight / pow(($height * 0.01),2);
        $sql_query = "INSERT INTO users (user_type, first_name, last_name, gender, email, age, height, weight, bmi, register_date) VALUES (1, '$fname', '$lname', '$gender', '$email', '$age', '$height', '$weight', '$bmi', sysdate)";
        $query_id = oci_parse($con, $sql_query); 		
        $result = oci_execute($query_id);

        if($result == true)
        {
            $success = "<i class='fas fa-check'></i> Account created successfully! Please procees to login.";
        }
        else
        {
            $error = "Failed to create your account! Please try again.";
        }
    }

    $page_title = "Register";

    include "templates/header.html";
    include "templates/signup.html";
    include "templates/footer.html";

?>