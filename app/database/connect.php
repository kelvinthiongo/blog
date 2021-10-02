<?php

$SERVERNAME = "localhost";
$DBUSERNAME = "root";
$DBPASSWORD = "";
$DBNAME = "blog";

$conn = new mysqli($SERVERNAME, $DBUSERNAME, $DBPASSWORD, $DBNAME);

if($conn->connect_error){
    die("Database connection error: " . $conn->connect_error);
}