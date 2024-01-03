<?php
//Connect to database and start session
include '../../Default/database.php';

//Fetch data from form as local variables
$username = $_POST['username'];
$password = $_POST['password'];

//Query database for username
$sql = "SELECT * FROM Account WHERE Username = '$username'";
if ($result = $conn->query($sql)) 
{
    if ($result->num_rows > 0) 
    {
        //Fetch other associated data from database
        while($row = $result->fetch_assoc()) 
        {
            $hpassword = $row["Password"];
            $email = $row["Email"];
            $bio = $row["Bio"];
            $profilePicture = $row["ProfilePicture"];
        }

        //Verify if entered password is accurate
        if (password_verify($password, $hpassword)) 
        {
            //Get Account_ID from database and store as session variable id
            $sql = "SELECT Account_ID FROM Account WHERE Username = '$username'";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()) 
            {
                //Set session variable 'id' as the Account_ID of the user
                $_SESSION['id'] = $row["Account_ID"];
            }

            //Set session variables
            $_SESSION['username'] = "$username";
            $_SESSION['email'] = "$email";
            $_SESSION['password'] = "$password";
            $_SESSION['bio'] = "$bio";
            $_SESSION['profilePicture'] = "$profilePicture";

            //Redirect to main page
            header("Location: ../../main.php");
        }
        else
        {
            //Redirect to login page
            header("Location: ../login.html");
        }
    }
    else
    {
        //Redirect to login page
        header("Location: ../login.html");
    }
}
else
{
    //Redirect to login page
    header("Location: ../login.html");
}

?>