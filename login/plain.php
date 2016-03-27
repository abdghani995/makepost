<?php 
include('../lib/connect.php');	
	$obj=new connect();
	
	if(isset($_POST['name']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$c1=$_POST['c1'];
		$c2=$_POST['c2'];
		$val=$obj->email_check1($email);
		if($name==$username)
			{
				header('Location:register.php?err=1&name='.$name.'&username='.$username.'&email='.$email);	
			}
		elseif (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $password))
			{
				header('Location:register.php?err=3&name='.$name.'&username='.$username.'&email='.$email);		
			}
		elseif ($val!=0)
			{
				header('Location:register.php?err=4&name='.$name.'&username='.$username.'&email='.$email);		
			}
		else{
			if($c1==$c2)
			{
			$res1=$obj->add_new_rec($name,$email,$username,$password);
				if($res1==0)
				{
						header('Location:register.php?err=2&name='.$name.'&username='.$username.'&email='.$email);	
				}
				else
				{
					
						header('Location:register.php?err=0&name='.$name.'&username='.$username.'&email='.$email);		
				}
			}
			else
			{
				header('Location:register.php?err=5&name='.$name.'&username='.$username.'&email='.$email);		
			}
		}
	}
?>

