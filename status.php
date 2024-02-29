<?php

include "connect.php";

if(!empty($_GET['unused'])){
    mysqli_query($con,"UPDATE dsc_use SET status='2' WHERE dsc_use_id='".$_GET['unused']."' ");
}

if(!empty($_GET['used'])){
    mysqli_query($con,"UPDATE dsc_use SET status='1' WHERE dsc_use_id='".$_GET['used']."' ");
}

header("Location: fetch.php");
?>