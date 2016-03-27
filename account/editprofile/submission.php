<?php
session_start();

include('../../lib/connect.php');	
	$obj=new connect();
if($_SESSION['id'])
			{
			$id=$_SESSION['id'];
			if($obj->login_check($id)==0)
				{
					header('Location:../login');
				}
			$name=$_POST['name'];
			$me=$_POST['me'];
			$interest=$_POST['interest'];
			$dob=$_POST['dob'];
			$city=$_POST['city'];
			$phone=$_POST['phone'];
			$address=$_POST['address'];
			$obj->update_info($id,$name,$me,$interest,$dob,$city,$phone,$address);
			echo '<script>alert("updated successfully")</script>';
			header('Location:../');
			}
else
{
	header('Location:../login');
}

?>