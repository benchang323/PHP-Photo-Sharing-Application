<?php
    //Connect to database and start session
    include '../Default/database.php';

    //Follow the user
    $sql = "INSERT INTO Followers (Account_ID, Follower_ID) VALUES ('" . $_SESSION['id'] . "', '" . $_POST['Account_ID'] . "')";
    $conn->query($sql);

    //Redirect back to main page
    header("Location: ../main.php");
?>