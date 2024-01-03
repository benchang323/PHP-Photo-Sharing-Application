<?php
//Start session and connect to database
include '../Default/database.php';

//Add the comment under the post
$sql = "INSERT INTO `Comment` (`Comment_ID`, `Account_ID`, `Post_ID`, `Comment`) VALUES (NULL, '$_SESSION[id]', '$_POST[Post_ID]', '$_POST[Comment]')";
//Execute the query
$result = $conn->query($sql);

header("Location: ../main.php");
?>