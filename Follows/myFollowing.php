<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Following Users</title>
    <link rel="stylesheet" href="../Default/default.css">
    <link rel="stylesheet" href="CSS/myFollowers.css">
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
<h1>My Following Users</h1>
<?php
//Connect to database and start session
include '../Default/database.php';

//Query the all the users that this user is following
$sql = "SELECT * FROM Followers WHERE Account_ID = '" . $_SESSION['id'] . "'";
$result = $conn->query($sql);

//Print out the users that this user is following
if ($result->num_rows > 0) 
{
    while ($row = $result->fetch_assoc()) 
    {
        //Query the user's information
        $sql = "SELECT Username FROM Account WHERE Account_ID = '" . $row['Follower_ID'] . "'";
        $result2 = $conn->query($sql);
        if ($result2->num_rows > 0) 
        {
            while ($row2 = $result2->fetch_assoc()) 
            {
                echo "<div class = 'postPic'>";
                echo "<p>" . $row2['Username'] . "</p>";
                //Button to view the user's posts
                echo "<a class = 'button' href='../View Posts/viewUserPosts.php?id=".$row['Account_ID']."'>View</a></button>";
                
                echo "<form action='../Handler/unfollowHandler.php' method='post'>";
                echo "<input type='hidden' name='Account_ID' value='" . $row['Follower_ID'] . "'>";
                echo "<input class = 'button'type='submit' value='Unfollow'>";
                echo "</form>";
                echo "</div>";
            }
        }
        else
        {
            header("Location: ../main.php");
        }
    }
}
else
{
    header("Location: ../main.php");
}
?>
</body>
</html>