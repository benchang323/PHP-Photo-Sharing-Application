<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Default/default.css">
    <link rel="stylesheet" href="CSS/myFollowers.css">
    <title>My Followers</title>
</head>
<body>
<ul>
    <li><a href="../../main.php">Home</a></li>  
    <li><a href="../Personal/profile.php">Profile</a></li>
    <li><a href="../Posts/post.html">Make Post</a></li>
    <li><a href="../Personal/myPage.php">My Posts</a></li>
    <li><a href="../Follows/follows.html">Follows</a></li>
    <li><a href="../View Posts/viewLikedposts.php">Liked Posts</a></li>
    <li><a href="../View Posts/seeFollowerPost.php">Follower's Posts</a></li>
    <li><a href="../Search/search.html">Search Users</a></li>
    <li><a href="../../Handler/logoutHandler.php">Log Out</a></li>
</ul>
<h1> My Followers </h1>

<?php

//Connect to database and start session
include '../Default/database.php';

//Query the all the users that follows this user
$sql = "SELECT * FROM Followers WHERE Follower_ID = '" . $_SESSION['id'] . "'";
$result = $conn->query($sql);

//Print out the users that follows this user
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        echo "<div class = 'postPic'>";
        //From ID query and print out the username
        $sql2 = "SELECT * FROM Account WHERE Account_ID = '" . $row['Account_ID'] . "'";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) 
        {
            // output data of each row
            while($row2 = $result2->fetch_assoc()) 
            {
                echo "<p>".$row2['Username']."</p>";
            }
        }
        //Button to view the user's posts
        echo "<a class = 'button' href='../View Posts/viewUserPosts.php?id=".$row['Account_ID']."'>View</a>";

        //Make a button that removes the follower
        echo "<form action='../Handler/sunfollowHandler.php' method='post'>";
        echo "<input type='hidden' name='Account_ID' value='" . $row['Account_ID'] . "'>";
        echo "<br>";
        echo "<input class = 'button' type='submit' value='Remove'>";
        echo "</div>";
    }
} 
else 
{
    //Redirect back
    header("Location: ../main.php");
}
?>
</body>
</html>