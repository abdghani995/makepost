<?php 
include('../../lib/connect.php');
$obj=new connect();
session_start();
$curr_id=$_SESSION['id'];
$id=$_GET['value'];
$val=$obj->check_follow($id,$curr_id);
if($val==0)
	{
	$obj->insert_follow($id,$curr_id);
	$count= $obj->count_follow($id);	
	$str='<button class="btn btn-default" id="follow" onClick="addfollow('.$id.')"><p>FOLLOW('.$count.')</p></button>';
	echo $str;
	}
else
	{
	$obj->delete_follow($id,$curr_id);
	$count= $obj->count_follow($id);	
	$str='<button class="btn btn-default" id="follow" onClick="addfollow('.$id.')"><p>FOLLOW('.$count.')</p></button>';
	echo $str;
	}
?>