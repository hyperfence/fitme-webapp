<?php
    require "config/initialize.php";

    $page_title = "Workout Plans";

    if(isset($_POST["delete-plan-submit"]))
    {
        $planID = $_POST["workout-id"];
        $sql_query = "DELETE FROM user_workout WHERE workout_id = '$planID' AND user_id = '$userID'";
        $query_id = oci_parse($con, $sql_query); 		
        $result = oci_execute($query_id);
        header("Location: workout-plans.php");
        exit();
    }

    $sql_query_0 = "SELECT * FROM workout WHERE workout_id IN (SELECT workout_id FROM user_workout WHERE user_id = '$userID')";
    $query_id_0 = oci_parse($con, $sql_query_0); 		
    $result = oci_execute($query_id_0);

    include "templates/header.html";
    include "templates/workout-plans.html";
    include "templates/footer.html";
?>