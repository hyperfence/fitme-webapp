<?php
    require "config/initialize.php";
    
    if($loggedin == true)
    {
        header("Location: home.php");
    }
    $error = "";
    if(isset($_POST["login-submit"]))
    {
        $email = $_POST["email"];
        $sql_query = "SELECT * FROM users WHERE email = '$email'";
        $query_id = oci_parse($con, $sql_query); 		
        $result = oci_execute($query_id);
        $result_arr = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
        if($result == true && $result_arr != false)
        {
            $_SESSION["LoggedIn"] = true;
            $_SESSION["UserID"] = $result_arr['USER_ID'];
            $_SESSION["isInstructor"] = ($result_arr['USER_TYPE'] == 2) ? true : false;
            $_SESSION["setupRequired"] = false;
            $userID = $_SESSION["UserID"];
            $sql_query = "SELECT * FROM user_workout WHERE user_id = '$userID'";
            $query_id = oci_parse($con, $sql_query); 		
            $result = oci_execute($query_id);
            $result_arr = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
            if($result == true && $result_arr == false)
            {
                $_SESSION["setupRequired"] = true;
                header("Location: setup-workout.php");
                exit();
            }
            header("Location: home.php");
            exit();
        }
        else
        {
            $error = "<i class='fas fa-exclamation-triangle'></i> No user found with the provided email address!";
        } 
    }

    $page_title = "Login";

    include "templates/header.html";
    include "templates/login.html";
    include "templates/footer.html";
?>