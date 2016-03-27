<?php 
 $name=$_POST['name'];
 $username=$_POST['uname'];
 $password=$_POST['pass'];
 $email=$_POST['email'];
 $id=$_POST['id'];
 include('../lib/connect.php');	
 $obj=new connect();
 $val=$obj->edit($id,$name,$username,$email,$password);
 if($val==1)
 	{
		header('location:admin.php');
	}
?>