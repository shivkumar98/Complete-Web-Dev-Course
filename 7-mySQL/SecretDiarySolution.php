<?php
    
    session_start();
    
    $conn = new mysqli("127.0.0.1:3307", "root", "", "test");
    
    if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

     if (array_key_exists("submit", $_POST)){
         
           
         $error = "";
         
         if (!$_POST['email']){
             $error .= "An email is required<br>";
         }
         
         if (!$_POST['password']){
             
             $error .= "A password is required<br>";
         }
         
         if ($error!=""){
             $error = "<p><strong>There were errors in your form:</strong></p>".$error;
             echo $error;
         } else {
            
             $query = "SELECT id from users where email ='".mysqli_real_escape_string($conn, $_POST['email']). "' LIMIT 1";
             
             $result = mysqli_query($conn, $query);
             
             if (mysqli_num_rows($result) > 0) {
                 
                 $error = "This email is already taken";
                 echo $error;
                 
             }else {
                 $query = "INSERT INTO users (email, password) VALUES ('".mysqli_real_escape_string($conn, $_POST['email'])."', '".mysqli_real_escape_string($conn, $_POST['password'])."')";
                 
                 if (!mysqli_query($conn, $query)){
                     
                     $error = "<p>Could not sign you up - please try again</p>";
                     
                 } else {
                     
                     $query = "UPDATE users SET password = '".md5(md5(mysqli_insert_id($conn)).$_POST['password'])."' WHERE ID = ".mysqli_insert_id($conn);
                     
                     mysqli_query($conn, $query);
                     
                     
                     
                     echo "Sign up successful!";
                 }
                 
             }
             
             
         }
     }
         
         
     

?>


<form method="post">
    <input type="email" name="email" placeholder="Email here">
    
    <input type="password" name="password" placeholder="Password here">
    
    <input type="checkbox" name="stayLoggedIn">
    
    <input type="submit" name="submit" value="Sign up!">
    
</form>