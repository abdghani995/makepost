<?php 
session_start();
include('../lib/connect.php');	
	$obj=new connect();
if($_SESSION['id'] )
			{	
			$id=$_SESSION['id'];
			$pic=$obj->get_ppic($id);
			$name=$obj->get_name($id);
			if(!($id==1 || $id==10))
				{
					header('location:../login');
				}
			}
else
	{
		header('location:../login');
	}
 $page=$_GET['page'];
$pid=$_GET['pid'];
$pid=$obj->decr($pid);
$obj->delete_post($pid);
header('location:posts.php?page='.$page);
?>