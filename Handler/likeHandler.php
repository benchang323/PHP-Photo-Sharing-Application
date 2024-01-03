<?php
//Connect to database and start session
include '../Default/database.php';

//Store as local variable
$postID = $_POST['Post_ID'];
$myid = $_SESSION['id'];

//Like the post
$sql233 = "INSERT INTO `Post Likes` (Post_ID, Account_ID) VALUES ($postID, $myid)";

//Execute query
$conn->query($sql233);

header("Location: ../main.php");
?>