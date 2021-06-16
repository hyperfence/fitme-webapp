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
    $con = @oci_connect($db_user, $db_pass, $XE); 
    if(!$con) 
    {
        echo "
        <div style=\"text-align: center; font-family: 'Helvetica'; margin-top: 150px;\">
            <img width='220px' src='media/images/server-error.png'>
            <br/><br/>
            <h2 style=\"color: red;\">Server Error!</h2><br/>
            <h4>Please ensure that your connection credentials are working fine!</h4>
        </div>
        ";
        exit();
    } 
?>