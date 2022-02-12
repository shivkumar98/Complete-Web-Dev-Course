<?php
    
    session_start();
    
    $conn = new mysqli("127.0.0.1:3307", "root", "", "test");
    
    if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

     if (array_key_exists("submit", $_POST)){
         
           
         $error = "";
         
         if (array_key_exists("logout", $_GET)){
             unset($_SESSION);
             setcookie("id", "", time()- 60*60*24);
             $_COOKIE["id"] = "";
         } else if(array_key_exists("id", $_SESSION) OR array_key_exists("id",
                                                    $_COOKIE)) {
             header("Location: loggedinpage.php");
             
         }
         
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
             
             if ($_POST['signUp']==1){
                 


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

                         $_SESSION['id'] = mysqli_insert_id($conn);

                         if ($_SESSION['id'] == 1){
                             setcookie("id", mysqli_insert_id($conn), 60*60*24);
                         }


                         header("Location: loggedinpage.php");
                     }

                 }


             } else {
                 $query = "SELECT id from users where email ='".mysqli_real_escape_string($conn, $_POST['email'])."'";
                 
                 $result = mysqli_query($conn, $query);
                 
                 $row = mysqli_fetch_array($result);
                 
                 echo $row;
                 
                 if (array_key_exists("id", $row )){
                     
                     $hashedpassword = md5(md5($row['id']).$_POST['password']);
                     
                     if ($hashedpassword == $row['password']){
                         setcookie("id", mysli_insert_id($conn), time()+60*60*24);
                         header("Location: loggedinpage.php");
                     } else {
                         echo "wrong password";
                     }
                     
                     
                     
                     
                 }
                 
             }
         }
     }
         
         
     

?>


<form method="post">
    <input type="email" name="email" placeholder="Email here">
    
    <input type="password" name="password" placeholder="Password here">
    
    <input type="checkbox" name="stayLoggedIn">
    
    <input type="hidden" name="signUp" value="1">
    
    <input type="submit" name="submit" value="Sign up!">
    
</form>

<form method="post">
    <input type="email" name="email" placeholder="Email here">
    
    <input type="password" name="password" placeholder="Password here">
    
    <input type="hidden" name="signUp" value="0">
    
    <input type="submit" name="submit" value="Log in!">
    
</form>
