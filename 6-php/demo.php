<?php
print_r($_GET);

if (is_null($_GET['name']) || $_GET['name']==""){
    echo "<br>"."howdy, stranger";
}
else {
    echo  "Hello ".$_GET['name'];
}

?>

<p> What is your name? </p>

<form>
<input name="name" placeholder="name">
<input type="submit" value ="Go!">

</form>

