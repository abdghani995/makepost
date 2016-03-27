<?php 
if(isset($_POST['email']))
	{
	$email=$_POST['email'];
	}
else
	{
		header('Location:../');
	}
include('../lib/connect.php');
$obj=new connect();
	{
		$uname_check=$obj->username($email);
		if(mysql_num_rows($uname_check)==1)
		{
			
			$uname_check=$obj->username($email);
			$em=mysql_fetch_row($uname_check);
			if($em[0]==$email)
				{
				$err=0;
				$username=$obj->getusername_fromemail($email);
				$from="noreply@silveruser.co.in";
				$subject="PASSWORD RECOVERY";
				$password=$obj->email_check($email);
				$message='
					There was a password request for your account \n
								Username:'.$username.'
								Password:'.$password.'
						
						';
		
				mail($email,$subject,$message,"From:".$from);
				header('Location:fp.php?err='.$obj->encr($err));
				}
			else
				{
				
				$uname_check=$obj->username($email);
				$email=mysql_fetch_row($uname_check);
				$err=1;
				echo $email[0];
				header('Location:fp.php?err='.$obj->encr($err));
				}
		}
		else
		{
			$err=11;
				$uname_check=$obj->username($email);
				$email=mysql_fetch_row($uname_check);
				echo $email[0];
				header('Location:fp.php?err='.$obj->encr($err));
		}
	}

?>

