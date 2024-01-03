<?php
//Get data from form
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$bio = $_POST['bio'];

//Add slashes
$username = addslashes($username);
$email = addslashes($email);
$password = addslashes($password);
$bio = addslashes($bio);

//Hash password
$hpassword = password_hash($password, PASSWORD_BCRYPT);

//If nothing is submitted, reload back to the sign up page
if(empty($username) || empty($password) || empty($email) || empty($bio)){
    header("Location: ../signup.html");

}

try 
{
    //Connect to database
    $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp", 'root', 'root');
    //Set Error Mode
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Prepare SQL statement
    $prep = $conn -> prepare("SELECT * FROM Account WHERE Username = ?");
    //Bind parameters
    $prep -> bindParam(1, $username);
    //Execute SQL statement
    $prep -> execute();
    $t = 1;
    //Check if username already exists
    while($row = $prep->fetch())
    {
        $t = 0;
    }

    if($t == 1)
    {
        //Get image data as blob to store into database
        $image = $_FILES['profilePicture']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        //Insert all data into database
        $sql = "INSERT INTO Account (Username, Email, Password, Bio, ProfilePicture) VALUES ('$username', '$email', '$hpassword', '$bio', '$imgContent')";
        $conn->exec($sql);

        //Start session
        session_start();

        //Set session variables
        $_SESSION['id'] = $conn->lastInsertId();
        $_SESSION['username'] = "$username";
        $_SESSION['email'] = "$email";
        $_SESSION['password'] = "$password";
        $_SESSION['bio'] = "$bio";

        //Direct to main page
        header("Location: ../../main.php");
    }
    else
    {
        echo "<h1>Username already exists</h1>";
        // sleep(10);
        
        //Redirect to signup page
        header("Location: ../signup.html");
    }
} 
catch(PDOException $e)
{
    //Output error
    echo "Connection failed: " . $e->getMessage();
}
?>