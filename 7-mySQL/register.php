<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$database = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

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



// Check connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
                
<form method="post">
    <input name="email" placeholder="email here" type="text">
    <input name="password" placeholder="password" type="password">
    <input type="submit" value="Sign up">

</form>