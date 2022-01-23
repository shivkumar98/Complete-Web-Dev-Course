<?php

?>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">   
     
        <style type="text/css">
            #formcontainer {
                margin-top: 50px
            }    
            textarea {
                width: 100%
            }
            #errorMessage {
                padding: 10px;
            }
        
        </style>
        
        <title>Contact Form</title>
    </head>
    <body>
       <div id="formcontainer" class="container">
           <div id="errorMessage"> </div>
            <form>
                <div class="form-group">
                    <label for="email">Email-address:</label>
                    <input id="email" type="email" class="form-control" placeholder="Enter email here">
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input id="subject" type="text" class="form-control"
                    placeholder="Enter subject here">
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <br>
                    <textarea id="message" placeholder="Enter message here"></textarea>
                </div>
                <button id="submitButton" type="submit">Submit</button>
               
           </form>
        </div>


            
               
        
    </body>
</html>