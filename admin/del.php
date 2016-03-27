
<?php 
include('../lib/connect.php');	
$obj=new connect();
 $page=$_GET['page'];
if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$id=$obj->decr($id);
		$val=$obj->delete($id);
		if($val==1)
			header('location:admin.php?page='.$page);
	}
?>