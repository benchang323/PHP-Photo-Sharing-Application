<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Default/default.css">
    <link rel="stylesheet" href="../Personal/CSS/myPage.css">
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
<h1> The User's Posts </h1>
<?php
    //Connect to database and start session
    include '../Default/database.php';

    //View the quered user's posts from search.php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM Post WHERE Account_ID = '$id'";
        $result = $conn->query($sql);

        //Print out all posts
        if ($result->num_rows > 0) 
        {
            // output data of each row
            while($row = $result->fetch_assoc()) 
            {
                echo "<div class = 'postPic'>";
                //Print out post's caption
                echo "<p>".$row['Description']."</p>";
                //Display all post image
                echo "<img src='data:image/jpeg;base64,".base64_encode($row['Image'])."'/>";
                
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
            echo "No results";
        }
    }
?>
</body>
</html>