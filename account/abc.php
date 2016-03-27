<?php
session_start();
include('../lib/connect.php');	
	$obj=new connect();
$val=$obj->getallnot(1);
while($arr=mysql_fetch_row($val))
	{
		echo $arr[0];
	}
?>