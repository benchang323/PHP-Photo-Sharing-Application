<?php
//Start session and connect to databse
session_start();
$conn = new mysqli("localhost", "root", "root", "PhotoSharingApp");

//Edit comment
$sql = "UPDATE `Comment` SET `Comment` = '$_POST[Comment]' WHERE `Comment_ID` = $_POST[Comment_ID]";

//check if query is successful
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//Link back to main page
header("Location: ../main.php");

?>