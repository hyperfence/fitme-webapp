<?php
    require "config/initialize.php";

    $page_title = "Your Logs";

    if(isset($_POST["add-log"]))
    {
        if(isset($_POST["target_1"]))
        {
            $value = $_POST["target_1"];
            $wid = $_POST["workout-id"];
            $w = $value/10000 * 50;
            $b = $value/100000 * 20;
            $m = $value/10000 * 60;
            $sql_query = "INSERT INTO exercise_log (user_id, workout_id, exercise_id, exercise_date, reps_completed, weight_loss, bmi_change, muscle_gain) VALUES ('$userID', '$wid', 1, sysdate, '$value', '$w', '$b', '$m')";
            $query_id = oci_parse($con, $sql_query); 		
            $result = oci_execute($query_id);
        }
        if(isset($_POST["target_2"]))
        {
            $value = $_POST["target_2"];
            $wid = $_POST["workout-id"];
            $w = $value/10000 * 50;
            $b = $value/100000 * 20;
            $m = $value/10000 * 60;
            $sql_query = "INSERT INTO exercise_log (user_id, workout_id, exercise_id, exercise_date, reps_completed, weight_loss, bmi_change, muscle_gain) VALUES ('$userID', '$wid', 2, sysdate, '$value', '$w', '$b', '$m')";
            $query_id = oci_parse($con, $sql_query); 		
            $result = oci_execute($query_id);
        }
        if(isset($_POST["target_3"]))
        {
            $value = $_POST["target_3"];
            $wid = $_POST["workout-id"];
            $w = $value/10000 * 50;
            $b = $value/100000 * 20;
            $m = $value/10000 * 60;
            $sql_query = "INSERT INTO exercise_log (user_id, workout_id, exercise_id, exercise_date, reps_completed, weight_loss, bmi_change, muscle_gain) VALUES ('$userID', '$wid', 3, sysdate, '$value', '$w', '$b', '$m')";
            $query_id = oci_parse($con, $sql_query); 		
            $result = oci_execute($query_id);
        }
        if(isset($_POST["target_4"]))
        {
            $value = $_POST["target_4"];
            $wid = $_POST["workout-id"];
            $w = $value/10000 * 50;
            $b = $value/100000 * 20;
            $m = $value/10000 * 60;
            $sql_query = "INSERT INTO exercise_log (user_id, workout_id, exercise_id, exercise_date, reps_completed, weight_loss, bmi_change, muscle_gain) VALUES ('$userID', '$wid', 4, sysdate, '$value', '$w', '$b', '$m')";
            $query_id = oci_parse($con, $sql_query); 		
            $result = oci_execute($query_id);
        }
        if(isset($_POST["target_5"]))
        {
            $value = $_POST["target_5"];
            $wid = $_POST["workout-id"];
            $w = $value/10000 * 50;
            $b = $value/100000 * 20;
            $m = $value/10000 * 60;
            $sql_query = "INSERT INTO exercise_log (user_id, workout_id, exercise_id, exercise_date, reps_completed, weight_loss, bmi_change, muscle_gain) VALUES ('$userID', '$wid', 5, sysdate, '$value', '$w', '$b', '$m')";
            $query_id = oci_parse($con, $sql_query); 		
            $result = oci_execute($query_id);
        }
        if(isset($_POST["target_6"]))
        {
            $value = $_POST["target_6"];
            $wid = $_POST["workout-id"];
            $w = $value/10000 * 50;
            $b = $value/100000 * 20;
            $m = $value/10000 * 60;
            $sql_query = "INSERT INTO exercise_log (user_id, workout_id, exercise_id, exercise_date, reps_completed, weight_loss, bmi_change, muscle_gain) VALUES ('$userID', '$wid', 6, sysdate, '$value', '$w', '$b', '$m')";
            $query_id = oci_parse($con, $sql_query); 		
            $result = oci_execute($query_id);
        }
        if(isset($_POST["target_7"]))
        {
            $value = $_POST["target_7"];
            $wid = $_POST["workout-id"];
            $w = $value/10000 * 50;
            $b = $value/100000 * 20;
            $m = $value/10000 * 60;
            $sql_query = "INSERT INTO exercise_log (user_id, workout_id, exercise_id, exercise_date, reps_completed, weight_loss, bmi_change, muscle_gain) VALUES ('$userID', '$wid', 7, sysdate, '$value', '$w', '$b', '$m')";
            $query_id = oci_parse($con, $sql_query); 		
            $result = oci_execute($query_id);
        }
        if(isset($_POST["target_8"]))
        {
            $value = $_POST["target_8"];
            $wid = $_POST["workout-id"];
            $w = $value/10000 * 50;
            $b = $value/100000 * 20;
            $m = $value/10000 * 60;
            $sql_query = "INSERT INTO exercise_log (user_id, workout_id, exercise_id, exercise_date, reps_completed, weight_loss, bmi_change, muscle_gain) VALUES ('$userID', '$wid', 8, sysdate, '$value', '$w', '$b', '$m')";
            $query_id = oci_parse($con, $sql_query); 		
            $result = oci_execute($query_id);
        }
        header("Location: logs.php");
        exit();
    }

    $sql_query_0 = "SELECT * FROM workout WHERE workout_id IN (SELECT workout_id FROM user_workout WHERE user_id = '$userID')";
    $query_id_0 = oci_parse($con, $sql_query_0); 		
    $result = oci_execute($query_id_0);

    include "templates/header.html";
    include "templates/logs.html";
    include "templates/footer.html";

?>