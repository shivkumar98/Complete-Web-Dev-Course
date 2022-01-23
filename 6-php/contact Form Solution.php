<?php
    
    $error = "";
    print_r($_POST);
    if ($_POST) {
        if (!$_POST["email"]){
        $error.="An email-address is requested.<br>";
    }
    if (!$_POST["subject"]) {
        $error.="A subject is required.<br>";
    }
    if (!$_POST["message"]){
        $error.="A message is required.<br>";
    }
    if ($_POST["email"] && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $error.="E-mail address is not valid.<br>";    
    }

    if ($error!=""){
        $error = '<div class="alert alert-danger" role="alert">'. $error .'</div>';
    }
        print($error);
    } else {
         $emailTo = "shiv@yahoo.com";
         $subject = $_POST["subject"];
         $conent = $_POST["message"];
        $headers = "From: ".$_POST["email"];
            if (mail($emailTo, $subject, $content, $headers)){
                $error = '<div class="alert alert-success" role="alert">Success!!</div>';
            } else {
                $error = '<div class="alert alert-danger" role="alert">Your message could not be sent</div>';
            }
            
    }

    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
      
    <title>PHP Contact Fi</title>
  </head>
    
  <body>
    <h1>Get in Touch</h1>
      <div id="error"><? echo $error; ?></div>
      <div class="container">
    <form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address:</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="subject">Subject:</label>
    <input type="text" name="subject" class="form-control" id="subject">
  </div>
<div class="form-group">
<label>What would you like to ask us?</label>
<textarea class="form-control" name="message" id="message"></textarea>
        </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
         <script 
src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script>

      <script type="text/javascript">

          
        
      </script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  </body>
</html>

