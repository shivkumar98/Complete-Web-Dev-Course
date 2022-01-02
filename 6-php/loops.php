<?php

$family = array("Shiv", "Tommy", "Joel", "Elly");

foreach ($family as $k => $v) {
    $family[$k] = $v." Kumar";
    echo $family[$k]."<br>";
}


echo $family[0];
?>