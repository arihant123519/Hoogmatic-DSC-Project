<?php

include "connect.php";

$dsc_use_id = $_POST['dsc_use_id'];

$sql=mysqli_query($con,"SELECT license_no,quantity FROM dsc_use WHERE dsc_use_id='$dsc_use_id' ");
$row=mysqli_fetch_assoc($sql);

$output="
<div class='modal-body'>

    <div class='mb-3'>
        <label for='awb_no' class='form-label'>AWB No.</label>
        <input type='text' class='form-control' id='awb_no' name='awb_no' required>
    </div>
    <div class='mb-3'>
        <label for='courier_comp' class='form-label'>Courier Company</label>
        <input type='text' class='form-control' id='courier_comp' name='courier_comp' required>
    </div>
    <div class='mb-3'>
        <label for='license_no' class='form-label'>License No.</label>
        <input type='text' class='form-control' id='license_no' name='license_no' value='".$row['license_no']."' required>
    </div>
    <input type='hidden' name='dsc_use_id' value='$dsc_use_id'>
    <div class='mb-3'>
        <label for='dsc_use_id' class='form-label'>DSC Id</label>
        <input type='text' class='form-control' id='dsc_use_id' name='dsc_use_id' value='$dsc_use_id' required>
    </div>
    <div class='mb-3'>
        <label for='quantity' class='form-label'>Quantity</label>
        <input type='number' class='form-control' id='quantity' name='quantity' value='".$row['quantity']."' required>
    </div>
</div>
<div class='modal-footer'>
    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
    <button type='submit' class='btn btn-primary'>Save changes</button>
</div>
";
echo $output;

?>