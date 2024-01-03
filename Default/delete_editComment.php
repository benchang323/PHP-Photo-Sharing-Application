<?php

//Let the user delete their own comment
if ($row["Account_ID"] == $_SESSION["id"])
{
    echo "<form action='../Handler/deleteCommentHandler.php' method='post'>";
    echo "<input type='hidden' name='Comment_ID' value='$row[Comment_ID]'>";
    echo "<input type='hidden' name='Post_ID' value='$_POST[Post_ID]'>";
    echo "<input class = 'button' type='submit' value='Delete'>";
    echo "</form>";

    //Let the user edit their own comment by inputting a new text here
    echo "<form action='../Handler/editCommentHandler.php' method='post'>";
    echo "<input type='hidden' name='Comment_ID' value='$row[Comment_ID]'>";
    echo "<input type='hidden' name='Post_ID' value='$_POST[Post_ID]'>"; 
    echo "</form>";
}



//New comment input
include '../Default/commentStuff2.php';
// echo "<form action='../Handler/newCommentHandler.php' method='post'>";
// echo "<input class = 'text-input'type='text' name='Comment'>";
// echo "<input class = 'button' type='submit' value='Comment'>";
// echo "</form>";
echo "<br>";

?>