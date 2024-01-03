<?php
//Create a follow button on profile pages that are not the user's own.
//Check if the user is already following the user
$sqls2s = "SELECT * FROM Followers WHERE Account_ID = '" . $_SESSION['id'] . "' AND Follower_ID = '" . $row['Account_ID'] . "'";
$results2s = $conn->query($sqls2s);
if ($results2s->num_rows > 0) 
{
    
    //User is already following the user, so print unfollow button and set post method
    echo "<form action='../Handler/unfollowHandler.php' method='post'>";
    echo "<input type='hidden' name='Account_ID' value='" . $row['Account_ID'] . "'>";
    echo "<input type='submit' value='Unfollow' class = 'button'>";
    echo "</form>";
}
else
{
    //User is not following the user, so print follow button and set post method
    echo "<form action='../Handler/followHandler.php' method='post'>";
    echo "<input type='hidden' name='Account_ID' value='" . $row['Account_ID'] . "'>";
    echo "<input type='submit' value='Follow' class = 'button'>";
    echo "</form>";
}
?>