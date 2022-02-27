<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <style type="text/css">
          .container{
              text-align: center;
              width: 400px;
              margin-top: 200px;
          }
          html { 
          background: url(sea.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
          body{
              background: none;
          }
          
          #LoginForm{
              display: none;
          }
          #loginToggle{
              
          }
          .toggleForms{
              font-size: 20px;
              color: aliceblue;
          }
          
          body{
              color: white
          }
          #error{
              
          }
          
          
          
          
      </style>
    <title>Hello, world!</title>
  </head>
  <body>
      
    <h1>Secret Diary </h1>
      <h2>Store your thoughts permanently</h2>
   
      <div id="error" class="alert alert-danger" role="alert">
         <?php echo $error; ?>
      </div>
   