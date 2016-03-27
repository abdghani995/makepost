<?php
session_start();
$id=$_SESSION['id'];
include('../lib/connect.php');	
	$obj=new connect();
$obj->remove_pic($id);
header('Location:../account');
?>