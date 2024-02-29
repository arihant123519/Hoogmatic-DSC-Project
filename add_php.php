<?php

include "connect.php";

$product=$_POST['product'];
$token=$_POST['token'];
$license_no=$_POST['license_no'];
$serial_no=$_POST['serial_no'];
$certificate=$_POST['certificate'];
$quantity=$_POST['quantity'];
$options=$_POST['options'];

for ($i = 0; $i < $quantity; $i++) {
    mysqli_query($con,"INSERT INTO dsc_use(product, token, license_no, serial_no, certificate, quantity,options) VALUES ('$product', '$token', '$license_no', '$serial_no', '$certificate', '1','$options')");
}

header("Location: fetch.php");
?>