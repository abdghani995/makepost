<?php 
session_start();
include('../../lib/connect.php');	
	$obj=new connect();
if($_SESSION['id'])
			{
			$id=$_SESSION['id'];
			$username=$obj->getusername($id);
			}
$type=$_GET['value'];
$val=$obj->getallfiles($username,$type);
$i=0;
$str="";
if($type==0){
	
			while($arr=mysql_fetch_row($val))
				{
				$str.='<img src="'.$arr[0].'" height="650px" width="700px" >';
				$i++;
				$str.='<br><br>';	
				}
			}
elseif($type==1)
	{
		while($arr=mysql_fetch_row($val))
				{
				$str.='<a href="'.$arr[0].'" style="font-size::20px;">'.$arr[1].'</a>';
				$i++;
				$str.='<br>';	
				}
	}

echo $str;
?>