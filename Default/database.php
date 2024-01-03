<?php
//Start session
session_start();

//Connect to database
$conn = new mysqli("localhost", "root", "root", "PhotoSharingApp");

//Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
?>