<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Style Sheet -->
    <link rel="stylesheet" href="../Default/default.css">
    <link rel="stylesheet" href="CSS/myPage.css">
    <title>My Posts</title>
</head>
<body>

<ul>
    <li><a href="../main.php">Home</a></li>
    <li><a href="profile.php">Profile</a></li>
    <li><a href="myPage.php">My Posts</a></li>
    <li><a href="../Follows/follows.html">Follows</a></li>
    <li><a href="../View Posts/viewLikedposts.php">Liked Posts</a></li>
    <li><a href="../View Posts/seeFollowerPost.php">Follower's Posts</a></li>
    <li><a href="../Onboarding/Handler/logoutHandler.php">Log Out</a></li>
</ul>

<h1>My Posts</h1>

<?php
    //Connect to database and start session
    include '../Default/database.php';

    //Query all posts by this user
    $sql = "SELECT * FROM Post WHERE Account_ID = '$_SESSION[id]'";
    $result = $conn->query($sql);

    //Print out all posts of this user
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            echo "<div class='postPic'>";
            echo "<img src='data:image/jpeg;base64,".base64_encode($row['Image'])."'/>";
            
            //Print discription of the post
            echo "<p>".$row['Description']."</p>";

            

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
        echo "You have not posted anything.";
    }
?>
</body>
</html>