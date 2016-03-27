<?php 
session_start();
include('../lib/connect.php');	
$obj=new connect();
$pid=$_GET['pid'];
$pid=$obj->decr($pid);
$obj->delete_post($pid);
header('location:index.php');
?>