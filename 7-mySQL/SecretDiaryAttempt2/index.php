<?php

    session_start();

    print_r($_COOKIE);
    print_r($_SESSION);
     

    if (array_key_exists("logout", $_GET)){
        
        echo "trying to log out";
        unset($_SESSION);
        setcookie("id", "", time()-60*60*24);
       
        
        echo "After unsetting sessions andcookie \n";
        print_r($_COOKIE);
        echo "SESSION";
        print_r($_SESSION);


        
        
    } else if (array_key_exists("id", $_SESSION) OR 
            array_key_exists("id", $_COOKIE)  ){
            
        header("Location: loggedinpage.php");
    }

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
            
            if ($_POST['signUp']== 1){
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

                        // hashing the password

                        $query = "UPDATE users SET password='". md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id ='".mysqli_insert_id($link)."' LIMIT 1";

                        mysqli_query($link, $query);

                        $_SESSION['id'] = mysqli_insert_id($link);

                        if ($_POST['stayLogginIn'] == 1){
                            //seeting cookie since user wants to stay logged in
                            setcookie("id", mysqli_insert_id($link), time()+60*60*24);
                        }

                        header("Location: loggedinpage.php");

                    
                } else { //query failed
                    echo "We were unable to register your account - please try again later";
                }
            
                
            
                } 
            
            } else { //user is trying to login
                
                $query = "SELECT * FROM users where email ='".mysqli_real_escape_string($link, $_POST['email'])."'";
                
                $result = mysqli_query($link, $query);
                
                $row = mysqli_fetch_array($result);
                print_r($row);
                
                if (array_key_exists("id", $row)){
                    
                    $hashedpassword = md5( md5($row['id']).$_POST['password'] );
                        
                        if ($hashedpassword == $row['password']){
                            
                            
                            $_SESSION['id'] = $row['id'];
                            
                            if ($_POST['stayLogginIn'] == 1){
                            //seeting cookie since user wants to stay logged in
                            setcookie("id", mysqli_insert_id($link), time()+60*60*24);
                            }
                            
                            header("Location: loggedinpage.php");
                        }
                    
                        echo "Your email/password is invalid, please try again";
                    
                        
                        
                    
                }
                
            }
            
            
        }
        
    }



?>

<form method="post">

    <input type="email" name="email" placeholder="Email here">
    <input type="password" name="password" placeholder="Password here">
    <input type="checkbox" name="stayLogginIn" value="1">
    <input type="hidden" name="signUp" value="1">
    <input type="submit" name="submit" value="Sign up">


</form>
<form method="post">

    <input type="email" name="email" placeholder="Email here">
    <input type="password" name="password" placeholder="Password here">
    <input type="checkbox" name="stayLogginIn" value="1">
    <input type="hidden" name="signUp" value="0">
    <input type="submit" name="submit" value="Log in">


</form>