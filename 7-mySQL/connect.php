<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

//initialising variabe


// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    //check if fields are filled in
    
    
    $validEmail = false;
    $validPassword = false;
    $emailIsRegistered = false;
    if ($_POST['email']!=""){
        $validEmail=true;
    }
    if ($_POST['password']!=""){
        $validPassword = true;
    }

    if ($validEmail && $validPassword){
        $query = "SELECT email from users where email='".$_POST['email']."'";
        if ($result = mysqli_query($conn, $query)){
            $row = mysqli_fetch_array($result);
            
            if($row[0]!=""){
              echo  "this email is already registered";
            } else {
                $query = "INSERT INTO `users`(`email`, `password`) VALUES ('".$_POST['email'] ."','". $_POST['password']."')";
              
                
                if ($result = mysqli_query($conn, $query)){
                    echo "<br>successfully registered";
                }
                
            }
        }
    }
                   
                
                
                
     
    
   
?>
<html>
    <head>
    
    </head>
    <body>
        <div class="errors">
        <?php
        
            ?>
        </div>
        <h1>Register below:</h1>
        <form method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <button type="submit">Submit</button>
            
        
        </form>
    </body>


</html>
