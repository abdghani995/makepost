<?php
session_start();
if($_SESSION['id'])
			{
			$id=$_SESSION['id'];
			}
else
	{
		header('../../login');
	}
$name=$_POST['name'];
$head=$_POST['head'];
$post=$_POST['post'];
$post=str_replace("'","\'",$post);
$head=str_replace("'","\'",$head);
include('../../lib/connect.php');	
	$obj=new connect();
$tim=' on '.date("D M jS ").' at '.date("H:i:s",time());
$obj->add_new_postt($id,$name,$head,$post,$tim);
$temp=$obj->get_all_posts();
$arr=mysql_fetch_row($temp);
$lastpostid=$arr[0];
$username=$obj->getusername($id);
$val=$obj->getallimage($username);
	while($arr=mysql_fetch_row($val))
	{
			$a=$obj->updateimagee($lastpostid,$arr[0],$arr[1],$arr[2]);
	}
$vall=$obj->count_follow1($id);
$notify='<img src="'.$obj->get_pic($id).'" height="40px" width="40px"><a href="seemore.php?pid='.$obj->encr($lastpostid).'" style=text-decoration:none>'.$name." posted ".'<strong>'.$head.'</strong></a>';	
while($arr=mysql_fetch_row($vall))
	{
		$obj->updatenotification($arr[2],$notify);
		
	}
header('Location:../index.php');
?>