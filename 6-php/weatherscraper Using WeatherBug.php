<?php
    
    $weatherForecast = "";

    if ($_GET["city"]){
        $cityName =str_replace(' ', '-', $_GET["city"]);
        
        $file = "https://www.weather-forecast.com/locations/". $cityName. "/forecasts/latest";
        $file_headers = @get_headers($file);
        if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
            $exists = false;
        }
        else {
              $forecastPage = file_get_contents("https://www.weather-forecast.com/locations/". $cityName. "/forecasts/latest");
        $first = explode("<span class=\"phrase\">", $forecastPage);
        $second = explode("<p></p>", $first[1]);
        $weatherForecast = $second[0];
        }
        
      
    }

    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style type="text/css">
      html { 
          background: url(background.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
        body {
            
           
        }
        .container {
            text-align: center;
            margin-top: 100px;
            background: none;
        
        }
        input {
            margin: 5px 0 5px 0
        }
        #weatherForecast {
            margin-top: 15px;
        }
        
      
  </style>
      
  <title>Weather Scraper</title>
  </head>
    
  <body>
      
      <div class="container">
          <h1 id="title">What's the weather?</h1>

        <form>
          <div class="form-group">
            <label for="city">Please enter a city:</label>
            <input type="text" name="city" class="form-control" id="city" aria-describedby="emailHelp" placeholder="E.g. London, Tokyo">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="weatherForecast">
            <?php
                if ($weatherForecast){
                    echo "<div class=\"alert alert-success role=\"alert\">$weatherForecast";
                } else {
                    echo "<div class=\"alert alert-danger\" role=\"alert\">
  Oh no! I think you made a typo. Please enter a valid city name
</div>";
                }
            ?>
                
        </div>

      
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

