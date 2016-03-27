<?php 
include('../lib/connect.php');	
$name=($_POST['name']);
$email=($_POST['email']);
$comment=($_POST['comment']);	
$obj=new connect();
$val=$obj->insert_comment($name,$email,$comment);

if($val==1)
	{
		if(isset($_POST['id']))
		{
			$id=$_POST['id'];
			header('Location:../index.php?comm='.$obj->encr('1').'&id='.$id.'#comment');
		}
	else
		{
			header('Location:../index.php?comm='.$obj->encr('1').'#comment');
		}
		
	}
?>