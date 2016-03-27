<?php
session_start();
include('../lib/connect.php');	
	$obj=new connect();
$pid=$_GET['value'];

$lk=$obj->like_count1($pid);
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
			$comm=$obj->getcomment_count($pid);
			$str.=$st;
			$str.='"><button class="btn btn-default" >like('.$lk.')</a></button>&nbsp&nbsp&nbsp<button class="btn btn-default" onClick="show_comment('.$pid.')><a href="postcomment.php?pid='.$pid.'">comment('.$comm.')</button></a>';
			echo $str;	
?>