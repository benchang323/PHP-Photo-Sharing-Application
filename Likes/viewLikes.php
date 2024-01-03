<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Default/default.css">
    <link rel="stylesheet" href="CSS/viewLikes.css">
    <title>Document</title>
</head>
<body>
<ul>
    <li><a href="../main.php">Home</a></li>
    <li><a href="../Personal/profile.php">Profile</a></li>
    <li><a href="../Personal/myPage.php">My Posts</a></li>
    <li><a href="../Follows/follows.html">Follows</a></li>
    <li><a href="../View Posts/viewLikedposts.php">Liked Posts</a></li>
    <li><a href="../View Posts/seeFollowerPost.php">Follower's Posts</a></li>
    <li><a href="../Onboarding/Handler/logoutHandler.php">Log Out</a></li>
</ul>
<h1>The Users That Liked This Post</h1>
<?php
//Connect to database and start session
include '../Default/database.php';

//Query all users who liked the post
$sql11111 = "SELECT * FROM `Post Likes` WHERE Post_ID = $_POST[Post_ID]";
$result1111 = $conn->query($sql11111);

//Print out all users who liked the post
if ($result1111->num_rows > 0) 
{
    while($row1111 = $result1111->fetch_assoc()) 
    {
        //Query all information of the user
        $sql22222 = "SELECT * FROM Account WHERE Account_ID = $row1111[Account_ID]";
        $result22222 = $conn->query($sql22222);
        $row22222 = $result22222->fetch_assoc();
        
        echo "<div class='postPic'>";
        //Print out the user's name
        echo "<p>".$row22222['Username']."</p>";
        //Print out the user's profile picture
        echo "<img src='data:image/jpeg;base64,".base64_encode($row22222['ProfilePicture'])."'/>";
        echo "</div>";
    }
} 
else 
{
    header("Location: ../main.php");
}

?>
</body>
</html>