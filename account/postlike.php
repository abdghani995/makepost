<?php
session_start();
include('../lib/connect.php');	
	$obj=new connect();
$id=$_SESSION['id'];
$pid=$_GET['pid'];
$pid=$obj->decr($pid);

$head=$obj->gethead($pid);
	$head=str_replace("'","\'",$head);
$val1=$obj->like_name($pid,$id);
$val1=mysql_num_rows($val1);
if($val1==0){
			$v=$obj->like_count($pid);
			$v+=1;
			$obj->update_like_count($pid,$v);
			$obj->update_like_name($pid,$id);
			$userid=$obj->getuseridfrompid($pid);
			$notify='<img src="'.$obj->get_pic($id).'" height="40px" width="40px"><a href="seemore.php?pid='.$obj->encr($pid).'" style=text-decoration:none>'.$name." liked your post ".'<strong>'.$head.'</strong></a>';
			if($userid!=$id)
			$v=$obj->updatenotification($userid,$notify);
			header('Location:index.php#p'.$pid);
			}
else
	{
		header('Location:index.php#'.$pid);
	}
	
?>