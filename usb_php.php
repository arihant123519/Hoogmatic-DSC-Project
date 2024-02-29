<?php

include "connect.php";

$token_option=$_POST['token_option'];
$manufacturer=$_POST['manufacturer'];
$serial=$_POST['serial'];

foreach ($serial as $value) {
    
    mysqli_query($con,"INSERT INTO usb_token(manufacturer, token_option, serial) VALUES ('$manufacturer', '$token_option', '$value')");
}

header("Location: usb_fetch.php");
?>