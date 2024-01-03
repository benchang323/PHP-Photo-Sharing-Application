<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Default/default.css">
    <link rel="stylesheet" href="CSS/seeFollowerPost.css">
    <title>Document</title>
</head>
<body>
<ul>
    <li><a href="../main.php">Home</a></li>
    <li><a href="../Personal/profile.php">Profile</a></li>
    <li><a href="../Personal/myPage.php">My Posts</a></li>
    <li><a href="../Follows/follows.html">Follows</a></li>
    <li><a href="viewLikedposts.php">Liked Posts</a></li>
    <li><a href="seeFollowerPost.php">Follower's Posts</a></li>
    <li><a href="../Onboarding/Handler/logoutHandler.php">Log Out</a></li>
</ul>
<h1>My Follower's Posts </h1>
<?php

//Connect to database and start session
include '../Default/database.php';

//Query the users this user follows
$sql = "SELECT * FROM Followers WHERE Account_ID = '" . $_SESSION['id'] . "'";
$result = $conn->query($sql);

//Print out the posts of the users this user follows
if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        //Query the posts of the users this user follows
        $sql = "SELECT * FROM Post WHERE Account_ID = '" . $row["Follower_ID"] . "'";
        $result2 = $conn->query($sql);
        
        //Print out the posts of the users this user follows
        if ($result2->num_rows > 0) 
        {
            while($row2 = $result2->fetch_assoc()) 
            {
                //User Account_ID to get Username
                $sql = "SELECT Username FROM Account WHERE Account_ID = '" . $row2["Account_ID"] . "'";
                $result3 = $conn->query($sql);

                //Print username
                if ($result3->num_rows > 0) 
                {
                    while($row3 = $result3->fetch_assoc()) 
                    {
                        echo "<div class='postPic'>";
                        echo "<p>Username <br><br>" . $row3["Username"] . "</p><br>";
                        echo "<p>Caption <br><br>" . $row2["Description"] . "</p><br>";
                        echo "<p>Image</p> ";
                        
                        //Fetch the image of the post
                        $sql = "SELECT Image FROM Post WHERE Post_ID = " . $row2["Post_ID"];
                        $result3 = $conn->query($sql);
                        
                        //Display the image
                        if ($result3->num_rows > 0) 
                        {
                            while($row3 = $result3->fetch_assoc()) 
                            {
                                echo "<img src='data:image/jpeg;base64,".base64_encode($row3["Image"])."' width='200' height='200'/>";
                            }
                        }
                        $row['Post_ID'] = $row2['Post_ID'];
                        //Comments button stuff
                        include '../Default/commentStuff.php';

                        //Like and unlike button
                        include '../Default/like_unlike.php';

                        //Display who liked the post link
                        include '../Default/displayLikes.php';
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
            // header("Location: ../main.php");
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