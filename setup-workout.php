<?php
    require "config/initialize.php";

    $page_title = "Setup Workout Plan";

    $sql_query_0 = "SELECT * FROM workout WHERE workout_id NOT IN (SELECT workout_id FROM user_workout WHERE user_id = '$userID')";
    $query_id_0 = oci_parse($con, $sql_query_0); 		
    $result = oci_execute($query_id_0);

    $sql_query_1 = "SELECT * FROM exercise";
    $query_id_1 = oci_parse($con, $sql_query_1); 		
    $result1 = oci_execute($query_id_1);

    if(isset($_POST["add-plan-submit"]))
    {
        $last_insert_id = "";
        $plan_name = $_POST["wname"];
        $exercises = $_POST["exercises"];

        // Creates a workout plan
        $sql_query_2 = "INSERT INTO workout (name) VALUES ('$plan_name') RETURNING workout_id INTO :id";
        $query_id_2 = oci_parse($con, $sql_query_2); 	
        oci_bind_by_name($query_id_2, ":id", $last_insert_id);	
        $result2 = oci_execute($query_id_2);

        // Linking user and workout plan
        $sql_query_3 = "INSERT INTO user_workout (user_id, workout_id, creation_date) VALUES ('$userID', '$last_insert_id', sysdate)";
        $query_id_3 = oci_parse($con, $sql_query_3); 		
        $result3 = oci_execute($query_id_3);

        $nutrients = array();
        $nutrients[0] = 0;
        $nutrients[1] = 0;
        $nutrients[2] = 0;
        $nutrients[3] = 0;
        $nutrients[4] = 0;
        $nutrients[5] = 0;

        // Linking exercises and targets with the workout plan
        foreach($exercises as $exercise)
        {
            $target = "target_".$exercise;
            $target = isset($_POST[$target])?$_POST[$target]:5;
            if($exercise == 1)
            {
                if($target < 3)
                {
                    $nutrients[0] += 100;
                    $nutrients[3] += 80;
                    $nutrients[2] += 70;
                }
                else if($target >= 3 && $target < 9)
                {
                    $nutrients[0] += 130;
                    $nutrients[3] += 100;
                    $nutrients[1] += 20;
                    $nutrients[2] += 70;
                }
                else if($target >= 9)
                {
                    $nutrients[0] += 170;
                    $nutrients[3] += 110;
                    $nutrients[1] += 40;
                    $nutrients[2] += 80;
                }
            }
            if($exercise == 2)
            {
                if($target < 3)
                {
                    $nutrients[0] += 90;
                    $nutrients[3] += 70;
                    $nutrients[5] += 50;
                }
                else if($target >= 3 && $target < 9)
                {
                    $nutrients[0] += 125;
                    $nutrients[3] += 80;
                    $nutrients[5] += 50;
                    $nutrients[1] += 20;
                }
                else if($target >= 9)
                {
                    $nutrients[0] += 125;
                    $nutrients[3] += 80;
                    $nutrients[5] += 50;
                    $nutrients[1] += 50;
                }
            }
            if($exercise == 3)
            {
                if($target < 3)
                {
                    $nutrients[4] += 50;
                    $nutrients[2] += 60;
                    $nutrients[5] += 50;
                }
                else if($target >= 3 && $target < 9)
                {
                    $nutrients[4] += 7;
                    $nutrients[2] += 80;
                    $nutrients[5] += 60;
                }
                else if($target >= 9)
                {
                    $nutrients[0] += 60;
                    $nutrients[4] += 7;
                    $nutrients[2] += 80;
                    $nutrients[5] += 60;
                }
            }
            if($exercise == 4)
            {
                if($target < 3)
                {
                    $nutrients[4] += 60;
                    $nutrients[1] += 40;
                    $nutrients[2] += 60;
                    $nutrients[5] += 50;
                }
                else if($target >= 3 && $target < 9)
                {
                    $nutrients[4] += 70;
                    $nutrients[1] += 60;
                    $nutrients[2] += 70;
                    $nutrients[5] += 60;
                }
                else if($target >= 9)
                {
                    $nutrients[4] += 90;
                    $nutrients[1] += 80;
                    $nutrients[2] += 70;
                    $nutrients[5] += 60;
                }
            } 
            if($exercise == 5)
            {
                if($target < 3)
                {
                    $nutrients[0] += 60;
                    $nutrients[4] += 60;
                    $nutrients[1] += 40;
                    $nutrients[2] += 60;
                }
                else if($target >= 3 && $target < 9)
                {
                    $nutrients[0] += 80;
                    $nutrients[4] += 60;
                    $nutrients[1] += 40;
                    $nutrients[2] += 70;
                }
                else if($target >= 9)
                {
                    $nutrients[0] += 100;
                    $nutrients[4] += 60;
                    $nutrients[1] += 70;
                    $nutrients[2] += 70;
                }
            }
            if($exercise == 6){
                if($target < 3)
                {
                    $nutrients[0] += 80;
                    $nutrients[3] += 40;
                    $nutrients[1] += 80;
                    $nutrients[2] += 60;
                }
                else if($target >= 3 && $target < 9)
                {
                    $nutrients[0] += 100;
                    $nutrients[3] += 60;
                    $nutrients[1] += 80;
                    $nutrients[2] += 60;
                }
                else if($target >= 9)
                {
                    $nutrients[0] += 150;
                    $nutrients[3] += 90;
                    $nutrients[1] += 90;
                    $nutrients[2] += 90;
                }
            }
            if($exercise == 7){
                if($target < 3)
                {
                    $nutrients[0] += 150;
                    $nutrients[5] += 60;
                    $nutrients[1] += 100;
                    $nutrients[2] += 60;
                }
                else if($target >= 3 && $target < 9)
                {
                    $nutrients[0] += 200;
                    $nutrients[5] += 60;
                    $nutrients[1] += 150;
                    $nutrients[2] += 80;
                }
                else if($target >= 9)
                {
                    $nutrients[0] += 180;
                    $nutrients[5] += 60;
                    $nutrients[5] += 220;
                    $nutrients[2] += 80;
                }
            }
            if($exercise == 8){
                if($target < 3)
                {
                    $nutrients[0] += 150;
                    $nutrients[3] += 60;
                    $nutrients[1] += 100;
                    $nutrients[2] += 60;
                    $nutrients[4] += 40;
                }
                else if($target >= 3 && $target < 9)
                {
                    $nutrients[0] += 200;
                    $nutrients[3] += 60;
                    $nutrients[1] += 150;
                    $nutrients[2] += 80;
                    $nutrients[4] += 50;
                }
                else if($target >= 9)
                {
                    $nutrients[0] += 220;
                    $nutrients[3] += 60;
                    $nutrients[1] += 220;
                    $nutrients[2] += 100;
                    $nutrients[4] += 60;
                }
            }
            $sql_query_4 = "INSERT INTO workout_exercise (workout_id, exercise_id, target_reps) VALUES ('$last_insert_id', '$exercise', '$target')";
            $query_id_4 = oci_parse($con, $sql_query_4); 		
            $result4 = oci_execute($query_id_4);
        }

        for($i=0; $i<6; $i++)
        {
            $count = $i+1;
            if($nutrients[$i] != 0)
            {
                $sql_query_5 = "INSERT INTO nutrient_plan (workout_id, nutrient_id, amount) VALUES ('$last_insert_id', '$count', '$nutrients[$i]')";
                $query_id_5 = oci_parse($con, $sql_query_5); 		
                $result5 = oci_execute($query_id_5);
            }
        }

        if($result2 == true && $result3 == true)
        {
            // redirect to workout plan page
            header("Location: workout-plans.php");
            exit();
        }
    }
    else if(isset($_POST["select-plan-submit"]))
    {
        $planID = $_POST["workout-id"];
        // Linking user and workout plan
        $sql_query_3 = "INSERT INTO user_workout (user_id, workout_id, creation_date) VALUES ('$userID', '$planID', sysdate)";
        $query_id_3 = oci_parse($con, $sql_query_3); 		
        $result3 = oci_execute($query_id_3);
        // redirect to workout plan page
        header("Location: workout-plans.php");
        exit();
    }

    include "templates/header.html";
    include "templates/setup-workout.html";
    include "templates/footer.html";

?>