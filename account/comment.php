<?php
session_start();
$comment=$_GET['value1'];
$pid=$_GET['value2'];
$id=$_SESSION['id'];
$comment=str_replace("'","\'",$comment);
include('../lib/connect.php');	
	$obj=new connect();
	$name=$obj->get_name($id);
	$head=$obj->gethead($pid);
	$head=str_replace("'","\'",$head);
$obj->insert_replypost($pid,$name,$comment,$id);
$obj->replypostcountincr($pid);
$userid=$obj->getuseridfrompid($pid);
$notify='<a style="float:right" href="seemore.php?pid='.$obj->encr($pid).'" style=text-decoration:none><img src="'.$obj->get_pic($id).'" height="40px" width="40px" style="float:left">'.$name." commented on your post ".'<strong>'.$head.'</strong></a>';
			if($userid!=$id)
			$v=$obj->updatenotification($userid,$notify);
$str="";

$counter1=(mysql_num_rows($obj->get_postcomments($pid)));
	if($counter1>5)
	$str.=' <h5>viewing top 5 comments.<a href="seemore.php?pid='.$obj->encr($pid).'">see all comments</a></h5>';
$comments=$obj->get_postcomments($pid);
if($counter1>5)
						{
							for($j=0;$j<$counter1-5;$j++)
								mysql_fetch_row($comments);
						}
while($comment=mysql_fetch_row($comments))
	{	
	$str.='<a href="editprofile/visit.php?id='.$obj->encr($comment[3]).'"><h4><img src="'.$obj->get_pic($comment[3]).'" width="40px" height="40px">&nbsp&nbsp<div>'.$obj->get_name($comment[3]).'</a></h4>:&nbsp';
    $str.='<p>';
				for($x=1;$x<=strlen($comment[2]);$x++)
					{
		  				$str.=$comment[2][$x-1];
						if($x%55==0)
							$str.= "<br>";
					}
		
	$str.='</p><hr width="50%" style="opacity:0.1">';
	}
	$str.='<img src="'.$obj->get_pic($id).'" width="40px" height="40px">&nbsp&nbsp';
	$str.='<input type="text" id="'.$pid.'" placeholder="comment">&nbsp';
	$str.='<input type="button" class="btn btn-default" onClick="submitc('.$pid.');" value="comment">';
	echo $str;
?>