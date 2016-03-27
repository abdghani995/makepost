<?php 
include('../lib/connect.php');	
	$obj=new connect();
	$id=$_GET['value'];
	$val=$obj->getnotcount($id);
	echo 'NOTIFICATION ('.$val.')';
?>