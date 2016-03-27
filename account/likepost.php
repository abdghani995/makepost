<?php
session_start();
include('../lib/connect.php');	
	$obj=new connect();
$id=$_SESSION['id'];
$pid=$_GET['value'];
$head=$obj->gethead($pid);
$head=str_replace("'","\'",$head);
$val1=$obj->like_name($pid,$id);
$val1=mysql_num_rows($val1);
$comm=$obj->getcomment_count($pid);
if($val1==0){
			
			$name=$obj->get_name($id);
			$obj->update_like_name($pid,$id);
			$userid=$obj->getuseridfrompid($pid);
			$notify='<a style="float:right" href="seemore.php?pid='.$obj->encr($pid).'" style=text-decoration:none><img src="'.$obj->get_pic($id).'" height="40px" width="40px" style="float:left">'.$name." liked your post ".'<strong>'.$head.'</strong></a>';
			if($userid!=$id)
			
			$v=$obj->updatenotification($userid,$notify);
			$lk=$obj->like_count1($pid);
			$lkname=$obj->getlike_name($pid);
			$str='<a href="#lk1'.$pid.'"';
			$str.='onClick="lkcount('.$pid.')"';
			$str.='title="';
			$nacount=$obj->getlike_name($pid);
            $nacount=mysql_num_rows($nacount);
            $namelist=$obj->getlike_name($pid);
			$obj->update_like_post($pid,$lk);
			$st="";
			if($nacount==0)
			{
				$st.="be the first one to like";
			}
			else{
			for($j=0;$j<$nacount;$j++)
				{	$names=mysql_fetch_row($namelist);
					$st.=$obj->get_name($names[0]);
					$st.="\n";
				}
				}
			$str.=$st;
			$str.='"><button class="btn btn-default">like('.$lk.')</button></a>&nbsp&nbsp&nbsp<button class="btn btn-default" onClick="show_comment('.$pid.')">comment('.$comm.')</button>';
			echo $str;
			}
else		
			{
			
			$obj->delete_like_name($pid,$id);
			$lk=$obj->like_count1($pid);
			$obj->update_like_post($pid,$lk);
			$lkname=$obj->getlike_name($pid);
			$str='<a href="#lk1'.$pid.'"';
			$str.='onClick="lkcount('.$pid.')"';
			$str.='title="';
			$nacount=$obj->getlike_name($pid);
            $nacount=mysql_num_rows($nacount);
            $namelist=$obj->getlike_name($pid);
			$st="";
			if($nacount==0)
			{
				$st.="be the first one to like";
			}
			else{
			for($j=0;$j<$nacount;$j++)
				{	$names=mysql_fetch_row($namelist);
					$st.=$obj->get_name($names[0]);
					$st.="\n";
				}
				}
			$str.=$st;
			$str.='"><button class="btn btn-default" >like('.$lk.')</button></a>&nbsp&nbsp&nbsp<button class="btn btn-default" onClick="show_comment('.$pid.')">comment('.$comm.')</button>';
			echo $str;
			}
	
?>