<?php

//Start session and connect to databse
session_start();
$conn = new mysqli("localhost", "root", "root", "PhotoSharingApp");

//Delete the comment that the user commented using comment ID
$sql = "DELETE FROM `Comment` WHERE Comment_ID = $_POST[Comment_ID]";

//check if query is successful
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//Back to main page
header("Location: ../main.php");

?>
