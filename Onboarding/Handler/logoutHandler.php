<?php
    //Start session
    session_start();
    //Log out destroy session
    session_destroy();
    //Redirect to directory page
    header("Location: ../../index.html");
?>