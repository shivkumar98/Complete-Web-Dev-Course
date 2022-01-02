<?php

$number = $_GET["number"];

    

  
    $numberOfFactors=0;
    for ($i = 1; $i<= $number; $i++){
        if ($number%$i == 0) {
            $numberOfFactors++;
        }
        else 
        {
            continue;
        }
    }

    if ($numberOfFactors==2){
        echo "The number: ".$number." is prime!";
    } else
    {
        echo "The number: ".$number." is not prime!";
    }




?>

<p> Is it prime?</p>

<form>
<input name="number" placeholder="enter number here">
<input type="submit" value ="Check">

</form>
