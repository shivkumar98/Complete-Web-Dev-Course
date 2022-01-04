<?php

$permissableNames = array("Shiv", "Joe", "Tommy");

if (in_array($_POST["name"], $permissableNames)){
    echo "Hello ".$_POST["name"];
} else {
    echo "Access denied";
}

?>

<p>Please enter your name</p>
<form method="post">
<input name="name" type="text" placeholder="Enter name here">
<input type="submit" value="Enter">

</form>