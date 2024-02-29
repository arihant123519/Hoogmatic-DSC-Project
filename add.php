<?php

include "connect.php";

$dsc_use_id=$_POST['dsc_use_id'];

$awb_no=$_POST['awb_no'];
$courier_comp=$_POST['courier_comp'];
$license_no=$_POST['license_no'];

mysqli_query($con,"INSERT INTO delivered_dsc (awb_no, courier_comp, license_no, dsc_use_id, status) VALUES ('$awb_no', '$courier_comp', '$license_no', '$dsc_use_id', '1') ");
mysqli_query($con,"UPDATE dsc_use SET status='2' WHERE dsc_use_id='$dsc_use_id' ");

header("Location: fetch.php");
?>