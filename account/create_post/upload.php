<?php
session_start();
include('../../lib/connect.php');	
$obj=new connect();
$id=$_SESSION['id'];
$username=$obj->getusername($id);
   $name=$_FILES['myfile']['name'];
   $size=$_FILES['myfile']['size'];
   $size=$size/(1024*1024);
   for($i=strlen($name);$i>=0;$i--)
   {
	   if($name[$i]=='.')
	   {
		   break;
	   }
   }
   $ext=substr($name,$i+1);
   $ext=strtolower($ext);
   $destination_path = '../../../postupload/';
   $result = 0;
   $target_path = $destination_path .time().'.'.$ext;
   if($ext=="jpeg"||$ext=="gif"||$ext=="jpg"||$ext=="png"||$ext=="bmp"||$ext=="JPG"||$ext=="JPEG"||$ext=="BMP")
   {
	 if($size<5) 
	   {
		if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) 
	    {
        $result = 1;
		$obj->uploadimage($username,$target_path,0,$name);
   		}
		else
		{
		$result=0;
		}
	   }
	   else
	   {
		   $result=3;
	   }
		
   }
   else if($ext=="pdf"||$ext=="docx"||$ext=="doc"||$ext=="txt"||$ext=="pps"||$ext=="csv"||$ext=="zip"||$ext=="rar"||$ext=="ppt"||$ext=="ppsx"||$ext=="apk")
   {
	 if($size<100) 
	   {
		if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) 
	    {
        $result = 11;
		$obj->uploadimage($username,$target_path,1,$name);
   		}
		else
		{
		$result=0;
		}
	   }
	   else
	   {
		   $result=3;
	   }
		
   }
   else
   {
	   $result=2;
   }
   sleep(1);
?>

<script language="javascript" type="text/javascript">window.top.window.stopUpload(<?php echo $result;?>);</script>
<script language="javascript" type="text/javascript">if((<?php echo $result?>)==0){}}</script>   
