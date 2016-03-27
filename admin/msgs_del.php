<?php 
include('../lib/connect.php');	
$obj=new connect();
$id=$_GET['id'];
	$val=$obj->deletee($id);
	if($val==1)
	header('location:msgs.php');
?>