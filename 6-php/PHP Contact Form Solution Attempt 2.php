<?php
    print_r($_POST)

?>

<!doctype html>
<html lang="en">
  <head>
    <style type="text/css"?>
        #message {
            width:100%;
        }  
      
    </style>
      
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <script 
src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Contact Form</title>
  </head>
  <body>
    <div class="container">
        <h1>Get in touch!</h1>
        <div id="error"></div>
        <form method="post">
          <div class="form-group">
            <label for="email">Email address</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input name="email" type="text" class="form-control" id="subject">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <br>

            <textarea name="email" id="message" name="message"></textarea>
          </div>
          <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
        

    </div>
 
  </body>
</html>