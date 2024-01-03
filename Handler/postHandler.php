<?php
//Connect to database and start session
include '../Default/database.php';

//Set to local variables
$id = $_SESSION['id'];
$des = $_POST['description'];

//Process image
$image = $_FILES['profilePicture']['tmp_name'];
$imageContent = addslashes(file_get_contents($image));

//Run query to upload post
$sql = "INSERT INTO `Post` (`Account_ID`, `Image`, `Description`) VALUES ('$id', '$imageContent', '$des')";
$result = $conn->query($sql);

header("Location: ../main.php");
?>

