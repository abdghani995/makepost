<?php 
include('../lib/connect.php');	
	$obj=new connect();
	$id=$_GET['value'];
	$val=$obj->getallnot($id);
	$obj->updateseennot($id);
	$ans="";
	$i=0;
	while($arr=mysql_fetch_row($val))
		{$i++;
			echo $arr[0].'<hr>';
			if($i==10)
			break;
		}
?>