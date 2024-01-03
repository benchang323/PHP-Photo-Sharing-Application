<?php
//Link to the page that shows the users who liked this post as a form
echo "<form action='../Likes/viewLikes.php' method='POST'>";
echo "<input type='hidden' name='Post_ID' value='".$row['Post_ID']."'>";
echo "<input class = 'button' type='submit' value='Users'>";
echo "</form>";
echo "</div>";
?>