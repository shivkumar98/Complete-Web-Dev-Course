<?php

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
        <form>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <br>

            <textarea id="message" name="message"></textarea>
          </div>
          <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
        
        <script type="text/javascript">
            $("form").submit(function(e){
                e.preventDefault();
         
                var errorMessage = "";
                if ($('#email').val() == "") {
                    errorMessage=errorMessage+ "<p>The email field is required</p>";
                }
         
                if ($('#subject').val() == "") {
                    errorMessage=errorMessage+ "<p>The subject field is required</p>";
                }
                if ($('#message').val() == "") {
                    errorMessage=errorMessage+ "<p>The message field is required</p>";
                }
                
                
                
                if (errorMessage != ""){
                       $("#error").html('<div class="alert alert-danger" role="alert">'
  
                                 +errorMessage+"</div>");
                } else {
                    $("#error").html('<div class="alert alert-success" role="alert">Your query has been successfully sent</div>')
                }
             
                
            });
            
        
        
        </script>
    </div>
 
  </body>
</html>