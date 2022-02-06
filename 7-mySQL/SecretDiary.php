<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$database = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();

  if (array_key_exists('email', $_POST) OR array_key_exists('password', $_POST)){
        if ($_POST['email']==""){
            echo "<p>An email is required</p>";
        }
        else if ($_POST['password']==""){
            echo "<p>A password is required</p>";
        } else {
            $query = "SELECT id FROM users where email='".mysqli_real_escape_string($conn, $_POST['email'])."'";
            
            $result = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($result)>0){
                echo "<p>This email address has already been registered</p>";
            } else {
                
                $query = "INSERT INTO users (email, password) VALUES ('".mysqli_real_escape_string($conn, $_POST['email'])."', '".mysqli_real_escape_string($conn, $_POST['password'])."')";

                if (mysqli_query($conn, $query)) {
                    $_SESSION['email'] = $_POST['email'];
                    header("Location: session.php");
                    
                } else {
                    echo "<p>There has been an issue</p>";
                }
                
            }
        }
    }

    if (array_key_exists('emailSignIn', $_POST) OR array_key_exists('passwordSignIn', $_POST)){
        if ($_POST['emailSignIn']==""){
            echo "<p>An email is required to sign in</p>";
        }
        else if ($_POST['passwordSignIn']==""){
            echo "<p>A password is required to sign in</p>";
        } else {
            
            //email and password are valid
            $query = "SELECT * FROM users where email='".mysqli_real_escape_string($conn, $_POST['emailSignIn'])."' AND password ='".mysqli_real_escape_string($conn, $_POST['passwordSignIn'])."'";
            
            $result = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($result)>0){
                echo "<p>You have successfully logged in: </p>";
            } else {
                echo "<p>The password/email you entered does not match our system. Please try again.";
            }
            
            
        }
        
    }



?>

<form method="post">
    <label>Sign up here:</label>
    <br>
    <input name="email" placeholder="email here" type="text">
    <input name="password" placeholder="password" type="password">
    <input type="submit" value="Sign up">
</form>
    
<form method="post">
    <label>Already registered? Sign in here:</label>
    <br>
    <input name= "emailSignIn" placeholder="email here" type="text">
    <input name= "passwordSignIn" placeholder="password" type="password">
    <input type="submit" value="Sign In">
</form>
