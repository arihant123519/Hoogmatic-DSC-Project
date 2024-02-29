<?php

include "connect.php";

$validity=$_POST['validity'];
$certificate_license_id=$_POST['certificate_license_id'];
$issue=$_POST['issue'];
$valid_from = date("Y-m-d"); // Current date in the format YYYY-MM-DD
$valid_till = $_POST['valid_till'];
$license_no=$_POST['license_no'];
$new_license_no= $license_no-$issue;

mysqli_query($con,"INSERT INTO license_record(certificate_license_id, issue, valid_from, valid_till) VALUES ('$certificate_license_id', '$issue', '$valid_from', '$valid_till')");

mysqli_query($con,"UPDATE certificate_license SET license_no='$new_license_no' WHERE certificate_license_id='$certificate_license_id'");

header("Location: license_fetch.php");
?>
