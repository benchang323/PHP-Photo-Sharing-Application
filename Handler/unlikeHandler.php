<?php
//Connect to database and start session
include '../Default/database.php';

//Store as local variable
$postID = $_POST['Post_ID'];
$myid = $_SESSION['id'];

//Unlike the post
$sql2333 = "DELETE FROM `Post Likes` WHERE Post_ID = $postID AND Account_ID = $myid";
//Execute query
$conn->query($sql2333);

header("Location: ../main.php");
?>