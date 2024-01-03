<?php
//Comment on the post
echo "<form action='../Handler/commentPostHandler.php' method='post'>";
//Save hidden post ID
echo "<input type='hidden' name='Post_ID' value='$row[Post_ID]'>";
//Save hidden account ID
echo "<input type='hidden' name='Account_ID' value='$_SESSION[id]'>";
//Enter comment text
echo "<input class = 'text-input' type='text' name='Comment'>";
echo "<input class = 'button'  type='submit' value='Comment'>";
echo "</form>";
//Print how many comments are under the post
$sql444 = "SELECT * FROM `Comment` WHERE Post_ID = '$row[Post_ID]'";
$result444 = $conn->query($sql444);
if ($result444 !== false && $result444->num_rows > 0) 
{
    //Link to showComments.php with the placeholder of how many comments as a form
    echo "<form action='../Comments/showComments.php' method='POST'>";
    echo "<input type='hidden' name='Post_ID' value='$row[Post_ID]'>";
    //Store the number of comments as a stirng
    $num = 'Comments '. ($result444->num_rows);
    echo "<input class = 'button'  type='submit' value='$num'>";
    echo "</form>";
}
else
{
    echo "<p>Comments: 0</p>";
}
?>