<?php

//doesn't show warning...0-false
error_reporting(0);

//establishing connection 

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "employee";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn)
{
    //echo "Connection Successful! ";
}
else
{
    echo "Connction Failed! ".mysqli_connect_error();
}

?>