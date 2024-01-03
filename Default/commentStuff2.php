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
?>