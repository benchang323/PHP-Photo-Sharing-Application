<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Default/default.css">
    <link rel="stylesheet" href="../Follows/CSS/myFollowers.css">
    <title>My Followers</title>
</head>
<body>

<ul>
    <li><a href="main.php">Home</a></li>
    <li><a href="Personal/profile.php">Profile</a></li>
    <li><a href="Personal/myPage.php">My Posts</a></li>
    <li><a href="Follows/follows.html">Follows</a></li>
    <li><a href="View Posts/viewLikedposts.php">Liked Posts</a></li>
    <li><a href="View Posts/seeFollowerPost.php">Follower's Posts</a></li>
    <li><a href="Onboarding/Handler/logoutHandler.php">Log Out</a></li>
</ul>
<h1>Results</h1>
<?php
    //Connect to database and start session
    include '../Default/database.php';

    //Get search term
    $searchTerm = $_POST['search'];

    //Search for users
    $sql = "SELECT * FROM Account WHERE Username LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    //Print out all users
    if ($result->num_rows > 0) 
    {
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
            //Don't show the user itself
            if ($row['Account_ID'] != $_SESSION['id'])
            {
                echo "<div class = 'userinfo'>";
                //Print out username
                echo "<p>".$row['Username']."</p>";
                //Button to view the user's posts
                echo "<a class = 'button' href='../View Posts/viewUserPosts.php?id=".$row['Account_ID']."'>View Posts</a>";

                include '../Default/follow_unfollow.php';
                echo "</div>";
            }
            
        }
    } 
    else 
    {
        echo "No results";
    }
?>
</body>
</html>