<?php

$emailTo = "shiv_kumar.98@outlook.com";

$subject = "Test email subject";

$body = "I think you're great";

$headers = "From: shiv_kumar.98@outlook.com";

if (mail($email, $subject, $body, $headers)) {
    echo "email successfully sent";
} else {
    echo "the email cannot be sent";
}


?>