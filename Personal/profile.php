<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Stylesheets-->
    <link rel="stylesheet" href="../Default/default.css">
    <link rel="stylesheet" href="CSS/profile.css">
    <title>Profile Page</title>
</head>
<body>
<!-- Navigation Bar -->
<ul>
    <li><a href="../main.php">Home</a></li>
    <li><a href="profile.php">Profile</a></li>
    <li><a href="myPage.php">My Posts</a></li>
    <li><a href="../Follows/follows.html">Follows</a></li>
    <li><a href="../View Posts/viewLikedposts.php">Liked Posts</a></li>
    <li><a href="../View Posts/seeFollowerPost.php">Follower's Posts</a></li>
    <li><a href="../Onboarding/Handler/logoutHandler.php">Log Out</a></li>
</ul>

<h1> Profile </h1>

<?php
    //Connect to database and start session
    include '../Default/database.php';

    //Print out information
    echo "<div class='info'>";
    echo "<p>Account ID</p> <br>" . $_SESSION['id'] . "<br>";
    echo "<br>";
    echo "<p>Username</p> <br>" . $_SESSION['username'] . "<br>";
    echo "<br>";
    echo "<p>Email</p> <br>" . $_SESSION['email'] . "<br>";
    echo "<br>";
    echo "<p>Password</p> <br>" . $_SESSION['password'] . "<br>";
    echo "<br>";
    echo "<p>Bio</p> <br>" . $_SESSION['bio'] . "<br>";
    echo "<br>";
    

    echo "<p>Profile Picture</p>";

    //Fetch user profile picture from database
    $sql = "SELECT ProfilePicture FROM Account WHERE Account_ID = " . $_SESSION['id'];
    $result = $conn->query($sql);

    //Display profile picture
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            echo "<div class='profilePicture'>";
            echo "<br>";
            echo "<img src='data:image/jpeg;base64,".base64_encode($row["ProfilePicture"])."' width='300' height='300'/>";
            echo "</div>";
        }
    }
    echo "</div>";
?>

</body>
</html>