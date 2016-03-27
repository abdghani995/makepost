<?php
	$question=$_GET['ques'];
	include('../lib/connect.php');
	$obj=new connect();
	$res1=$obj->check_question($question);
	if ($res1[1]==$question){
	$obj->yespoll($question,($res1[2])+1);
	$id=$_GET['id'];
	}
	else
	{
		$res1=$obj->insert_question($question);	
	}
	header('Location:../index.php?polled=1&question='.$question.'&id='.$id.'#poll');
?>