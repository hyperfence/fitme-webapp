<?php
    /*
        This is the main connection file update this
        file according to your configuration
    */
    $XE =
    "(DESCRIPTION =
        (ADDRESS = (PROTOCOL = TCP)(HOST = Cybirus)(PORT = 1521))
        (CONNECT_DATA =
        (SERVER = DEDICATED)
        (SERVICE_NAME = XE)
        )
    )";
    $db_user = "scott";
    $db_pass = "1234";
    $con = oci_connect($db_user, $db_pass, $XE); 
    if(!$con) 
    {
        die("Could not connect to Oracle: "); 
        exit();
    } 
?>