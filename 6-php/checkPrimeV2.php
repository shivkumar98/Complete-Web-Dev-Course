<?php
if (is_null($_GET["number"])){
   
} else
{
    if (is_numeric($_GET["number"]) and $_GET["number"]>0){
        $number = $_GET["number"];
        $numberOfFactors = 0;
        
        for ($i=1;$i<=$number;$i++){
            if ($number%$i==0){
                $numberOfFactors++;
            }
        }
        if ($numberOfFactors>2){
            echo "the number ".$number." is not prime";
        } elseif ($numberOfFactors==2) {
            echo "the number ".$number." is prime";
        } else { //we have 1 factor when the number is one
            echo "this number ".$number." is not prime";
        }
        
    } else {
        echo "please enter a positive number";
    }
}

?>
<p>Enter number:</p>
<form>
<input type="text" name="number">
<input type="submit" value="Check!">
</form>