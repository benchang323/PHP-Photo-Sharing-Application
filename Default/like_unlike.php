<?php
//Query whether the user has liked this post
$sql52 = "SELECT * FROM `Post Likes` WHERE Post_ID = '$row[Post_ID]' AND Account_ID = '$_SESSION[id]'";
$result52 = $conn->query($sql52);

//If the user has liked this post, show the unlike button and vice versa
if ($result52->num_rows > 0) 
{
    echo "<form action='../Handler/unlikeHandler.php' method='post'>";
    echo "<input type='hidden' name='Post_ID' value='$row[Post_ID]'/>";
    echo "<input type='submit' value='Unlike' class='button'/>";
    echo "</form>";
}
else
{
    echo "<form action='../Handler/likeHandler.php' method='post'>";
    echo "<input type='hidden' name='Post_ID' value='$row[Post_ID]'/>";
    echo "<input type='submit' value='Like' class='button'/>";
    echo "</form>";
}
?>