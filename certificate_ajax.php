<?php

include "connect.php";

$certificate_license_id = $_POST['certificate_license_id'];
$license_no=$_POST['license_no'];
$date = date("Y-m-d"); // Get the current date in "Y-m-d" format
$validity=$_POST['validity'];
$formattedDate = date("Y-m-d", strtotime($date . " +".$_POST['validity']." year")); // Convert and format the date

$output="
<div class='modal-body'>
    <div class='mb-3'>
        <label for='valid_from' class='form-label'>Valid From</label>
        <input type='text' class='form-control' id='valid_from' name='valid_from' value='".date("Y-m-d")."' required>
    </div>
    <input type='hidden' name='certificate_license_id' value='$certificate_license_id'>
    <input type='hidden' name='license_no' value='$license_no'>
    <div class='mb-3'>
        <label for='valid_till' class='form-label'>Valid Till</label>
        <input type='text' class='form-control' id='valid_till' name='valid_till' value='$formattedDate' required>
    </div>
    <div class='mb-3'>
        <label for='issue' class='form-label'>Issue Number of License</label>
        <input type='number' class='form-control' id='issue' name='issue' required>
    </div>
</div>
<div class='modal-footer'>
    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
    <button type='submit' class='btn btn-primary'>Save changes</button>
</div>
";
echo $output;

?>