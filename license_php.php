<?php

include "connect.php";

$license_type=$_POST['license_type'];
$company_option=$_POST['company_option'];
$class=$_POST['class'];
$validity = $_POST['validity'];
$license_no=$_POST['license_no'];

mysqli_query($con,"INSERT INTO certificate_license(license_type, company_option, class, license_no, validity) VALUES ('$license_type', '$company_option', '$class', '$license_no', '$validity')");

mysqli_query($con, "UPDATE no_of_license SET no_of_license = no_of_license + $license_no WHERE id = 1");

header("Location: license_fetch.php");
?>