<?php

    $salt = "random string";
    
    echo md5(md5($row['id'])."password");

?>