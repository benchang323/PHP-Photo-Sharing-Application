<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Default/default.css">
    <link rel="stylesheet" href="CSS/showComments.css">
    <title>Comments of This Post</title>
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
<h1> Comments of This Post </h1>
<?php
//Start session and connect to database
include '../Default/database.php';

$pid = $_POST["Post_ID"];

//Show all the comments of the post
$sql = "SELECT * FROM Comment WHERE Post_ID = '$pid'";
$result = $conn->query($sql);

//Print out the comments   
if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        //User Account_ID to get Username
        $sql = "SELECT Username FROM Account WHERE Account_ID = '" . $row["Account_ID"] . "'";
        $result2 = $conn->query($sql);

        //Print username
        if ($result2->num_rows > 0) 
        {
            while($row2 = $result2->fetch_assoc()) 
            {
                //Order the comments based on new to old time
                $sql = "SELECT * FROM Comment WHERE Comment_ID = '" . $row["Comment_ID"] . "' ORDER BY Time ASC";
                $result3 = $conn->query($sql);

                //Print out the comments
                if ($result3 !== false && $result3->num_rows > 0)
                {
                    while($row3 = $result3->fetch_assoc()) 
                    {
                        echo "<div class='postPic'>";
                        echo "<p>Profile Image</p>";
                
                        //Print profile picture of the comment user
                        $sql = "SELECT ProfilePicture FROM Account WHERE Account_ID = '" . $row["Account_ID"] . "'";
                        $result4 = $conn->query($sql);

                        if ($result4->num_rows > 0) 
                        {
                            while($row4 = $result4->fetch_assoc()) 
                            {
                                echo "<img src='data:image/jpeg;base64,".base64_encode($row4["ProfilePicture"])."' width='200' height='200'/>";
                            }
                        }
                        echo "<p>Username<br>" . $row2["Username"] . "</p>";
                        //Print the comment that this user has commented on this post
                        echo "<p>Comment<br>" . $row["Comment"] . "</p>";

                        //Edit and Delete comments
                        include '../Default/delete_editComment.php';
                        echo "</div>";
                    }
                }
            }
        }
    }
}
?>
</body>
</html>