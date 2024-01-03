<?php
    //Connect to database and start session
    include '../Default/database.php';

    //Unfollow the user
    $sql = "DELETE FROM Followers WHERE Account_ID = '" . $_SESSION['id'] . "' AND Follower_ID = '" . $_POST['Account_ID'] . "'";
    $conn->query($sql);
    //Redirect back to main page
    header("Location: ../main.php");
?>