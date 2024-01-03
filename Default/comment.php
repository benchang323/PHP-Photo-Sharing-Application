<?php
//Start session and connect to database
include '../Default/database.php';

//Comment on the post
echo "<form action='commentPostHandler.php' method='post'>";
//Save hidden post ID
echo "<input type='hidden' name='Post_ID' value='$row2[Post_ID]'>";
//Save hidden account ID
echo "<input type='hidden' name='Account_ID' value='$_SESSION[id]'>";
//Enter comment text
echo "<input type='text' name='Comment' placeholder='Enter comment here'>";
echo "<input class='button'type='submit' value='Comment'>";
echo "</form>";

//Print how many comments are under the post
$sql5s = "SELECT * FROM `Comment` WHERE Post_ID = '$row2[Post_ID]'";
$result5s = $conn->query($sql5s);

if ($result5s !== false && $result5s->num_rows > 0) 
{
    //Link to showComments.php with the placeholder of how many comments
    echo "<a href='../Page/Comments/showComments.php?Post_ID=$row2[Post_ID]&Comment_Count=$result5s->num_rows'>Comments ($result5s->num_rows)</a>";
    echo "<br>";

}
else
{
    echo "Comments: 0<br>";
}

?>