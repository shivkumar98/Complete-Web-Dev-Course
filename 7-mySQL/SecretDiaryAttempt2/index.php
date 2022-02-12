<?php
    
    $link = new mysqli("127.0.0.1:3307", "root", "", "test");
    
    if ($link->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

    //checking if submit has been clicked:
    if (array_key_exists("submit", $_POST)){
        
        // initialising error:
        $error = "";
        
        if (!$_POST['email']){
            $error.="<p>Please enter an email</p>";
        }
        if (!$_POST['password']){
            $error.="<p>Please enter a password</p>";
        }
        
        if ($error!= ""){
            $error = "<p>There were error(s) in your form:</p>".$error;
            echo $error;
        } else { // if there are no errors in the form, then ...
            
            
            
            // checking if email is taken already
            
            $query = "SELECT id from Users where email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            
            $result = mysqli_query($link, $query);
            
            // checking number of rows of result
            if (mysqli_num_rows($result) > 0){
                
                $error = "This email is already registered";
                
                echo $error;
                
            } else { // if the email is NOT taken, then ...
                                
                $query = "INSERT INTO `users`(`email`, `password`) VALUES ('"
                    .mysqli_real_escape_string($link, $_POST['email'])."', '"
                    .mysqli_real_escape_string($link, $_POST['password']) ."');";
              
                
                if (mysqli_query($link, $query)){
                    echo "successfully registered";
                }
            
                
            }
            
        }
        
    }



?>

<form method="post">

    <input type="email" name="email" placeholder="Email here">
    <input type="password" name="password" placeholder="Password here">
    <input type="checkbox" name="stayLogginIn" value="1">
    <input type="submit" name="submit" value="Sign up">


</form>