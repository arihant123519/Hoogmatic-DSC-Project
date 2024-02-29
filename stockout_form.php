<?php

include "connect.php";
$no_of_license="1";
$dsc_token_id="";

$token_option=$_POST['token_option'];
if(!empty($_POST['no_of_license'])){
    $no_of_license=$_POST['no_of_license'];
}
if(!empty($_POST['dsc_token_id'])){
    $dsc_token_id=$_POST['dsc_token_id'];
}

$order_id=$_POST['order_id'];
$lead_id=$_POST['lead_id'];
$connector_code=$_POST['connector_code'];
$remarks=$_POST['remarks'];


mysqli_query($con,"INSERT INTO stockout_form(no_of_license, dsc_token_id, order_id, lead_id, connector_code, remarks, token_option) VALUES ('$no_of_license', '$dsc_token_id', '$order_id', '$lead_id', '$connector_code', '$remarks', '$token_option')");

// echo "INSERT INTO stockout_form(no_of_license, dsc_token_id, order_id, lead_id, connector_code, remarks, token_option) VALUES ('$no_of_license', '$dsc_token_id', '$order_id', '$lead_id', '$connector_code', '$remarks', '$token_option')";
mysqli_query($con, "UPDATE no_of_license SET no_of_license = no_of_license - $no_of_license WHERE id = 1");
mysqli_query($con,"UPDATE usb_token SET available='0' WHERE serial='$dsc_token_id' ");
// echo "UPDATE usb_token SET available='0' WHERE serial='$dsc_token_id' ";
//  echo "INSERT INTO stockout_form(no_of_license, dsc_token_id, order_id, lead_id, connector_code, remarks, token_option) VALUES ('$no_of_license', '$dsc_token_id', '$order_id', '$lead_id', '$connector_code', '$remarks', '$token_option')";
header("Location: fetch.php");
?>