<?php
  $uname=$_POST['uname'];
  $op=$_POST['op'];
  $np1=$_POST['np1'];
 $np2=$_POST['np2'];
require('../lib/connect.php');
$obj=new connect();

	$val=-74;
		{
		$uname_check=$obj->username($uname);
		if($uname==$uname_check[0])
			{
				$pass_check=$obj->email_check($uname);
				if($pass_check[1]==$op)
					{
						if(($np1==$np2) && ($np1!='') && ($np2!=''))
							{
								$val1=$obj->update_pass($uname,$np1);
								
							}
						else
							{
							$val=-3;
							}
					}
				else
					{
					$val=-2;	
					}
			}
		else
			{
			$val=-1;
			}
		
	}
 
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>CHANGE PASSWORD</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>


<div id="header">
	<h1>CHANGE PASSWORD</h1>
	<p> Make Things Happen</p>
</div>
<br><br><br>
	<div id="pass">
			
			<?php if($val==0){?>
					<h1>ERROR CHANGING DUETO INTERNAL FAILURE.SORRY FOR THE INCONVINENCE</h1>
			<?php }if($val==-1) {?>
				<h2>INCORRECT USERNAME </h2>
				<a href="cp.php"><input type="button" value="GO BACK"></a>
			<?php }if($val==-2){?>
				<h2>INCORRECT OLD PASSWORD </h2>
				<a href="cp.php"><input type="button" value="GO BACK"></a>
			<?php }if($val==-3){?>
				<h2>NEW PASSWORDS DIDNT MATCH </h2>
				<a href="cp.php"><input type="button" value="GO BACK"></a>
			<?php } if(isset($val1)){if($val1==1){?>
				<h2>PASSWORD SUCCESSFULY CHANGED </h2>
				<a href="../login.php"><input type="button" value="LOGIN NOW"></a>
			<?php }}?>
	</div>
	
	<?php for($f=0;$f<25;$f++){?>
	<br>
	<?php }?>
<div id="footer">
	@silveruser
</div>


</body>
</html>
