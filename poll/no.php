<?php
	$question=$_GET['ques'];
	include('../lib/connect.php');
	$obj=new connect();
	$id=$_GET['id'];
	$res1=$obj->check_question($question);
	if ($res1[1]==$question){
	$obj->nopoll($question,($res1[3])+1);
	}
	
	else
	{
		$res1=$obj->insert_question_1($question);	
	}
	header('Location:../index.php?polled=1&question='.$question.'&id='.$id.'#poll');
?>