<?php

$to = "kirankumar.yedidi@gmail.com";
$subject = "ΔREM REU Application";
$from = "neuronem@latech.edu";
$message = "This is for testing mail functionality.";
$headers =  "To: Venkata Yedidi <$to>\r\n" .
            "From: $from\r\n" .
            "Reply-To: $from\r\n" .
            "X-Mailer: PHP/".phpversion();

if (!mail($to, $subject, $message, $headers)) { 
    print_r(error_get_last());
    echo "error in mail sent";
}
else
    echo "Success!";
?>