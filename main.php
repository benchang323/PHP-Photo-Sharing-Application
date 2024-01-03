<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Stylesheets-->
    <link rel="stylesheet" href="Default/default.css">
    <link rel="stylesheet" href="main.css">
    <title>Main Page</title>
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

<?php
    //Connect to database and start session
    include 'Default/database.php';

    //Welcome message
    echo "<h1>";
    echo "Welcome, " . $_SESSION['username'] . "!";
    echo "</h1>";
?>

<!--Form for making a post-->
<h2>Make A Post!</h2>
<form action="Handler/postHandler.php" method="post" enctype="multipart/form-data" class='postBox'>
    <p>Description</p><input type="text" name="description" class='text-input'>
    <p>Picture</p><input type="file" name="profilePicture" class = "upload-button">
    <input type="submit" name="submit" class="button">
</form>

<!--Form for searching users-->
<h2>Look Up A User!</h2>
<form action="Search/searchResults.php" method="post" class='searchBox'>
    <p>Search for a user</p><input type="text" name="search" class='text-input'>
    <input class = 'button' type="submit" value="Search">
</form>

</body>
</html>