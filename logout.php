<?php
session_start();
include('lib/connect.php');	
	$obj=new connect();
if($_SESSION['id'])
	{	
		$id=$_SESSION['id'];
		$res=$obj->logged_out($id);
		$username=$obj->getusername($id);
			$obj->droptable($username);
		session_destroy();
		header('location:index.php');
	}
?>