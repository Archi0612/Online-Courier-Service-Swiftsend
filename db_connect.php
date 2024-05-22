<?php 

$conn= new mysqli('localhost','root','','cms_db')or die("Could not connect to mysql".mysqli_error($con));

date_default_timezone_set('Asia/Kolkata');
$error="";
