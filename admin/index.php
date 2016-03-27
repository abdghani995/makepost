<?php 
 
 function encr($id)
		{
		$len=strlen($id);
		$val=time().rand(100,999).time().chr(rand(65,96)).rand(1,9).chr(rand(65,96)).rand(1,9).$id.time().chr(rand(97,122)).'?='.chr(rand(65,96)).chr(rand(65,96)).chr(rand(65,96)).chr(rand(65,96)).chr(rand(65,96)).rand(10,99).$len;
		return $val;
		}
 
 
include('../lib/connect.php');	
	$obj=new connect();
session_start();
include('../lib/connect.php');	
	$obj=new connect();
if($_SESSION['id'] )
			{	
			$id=$_SESSION['id'];
			if($id!=1)
				{
					header('location:index.php');
				}
			}
else
	{
		header('location:index.php');
	}
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>admin</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>


<div id="header">
	<h1>ADMIN</h1>
	<p> MAKE THINGS HAPPEN</p>
</div>

	<div id="page">
		
				
			
					<div class="post">
						<h3 >ENTER THE ADMIN USERNAME AND PASSWORD </h3>
						<p class="byline"></p>
						<div class="entry"><form action="admin.php" method="post" name="admin">
							<table width="473" border="1" frame="void" rules="none">
							  <tr>
								<td colspan="2">&nbsp;</td>
							  </tr>
							   <tr>
								<td colspan="2">&nbsp;</td>
							  </tr>
							   <tr>
								<td colspan="2">&nbsp;</td>
							  </tr>
							  <tr>
								<td width="253">ENTER USERNAME</td>
								<td width="204"><input type="text" name="uname" placeholder="USERNAME"></td>
							  </tr>
							  <tr>
								<td colspan="2">&nbsp;</td>
							  </tr>
							  <tr>
								<td width="253">ENTER PASSWORD</td>
								<td width="204"><input type="password" name="pass" placeholder="PASSWORD"></td>
							  </tr>
							  <tr>
								<td colspan="2">&nbsp;</td>
							  </tr>
							  <tr>
								
								<td colspan="2"><input type="submit" name="LOGIN" value="LOGIN"></td>
							  </tr>
						  </table></form>
							<?php if(isset($val)){if($val==1)
							{ ?>
							<h2>INCORRECT USERNAME OR PASSWORD</h2>
							<?php }}?>
				
	</div>
	
	<?php for($f=0;$f<20;$f++){?>
	<br>
	<?php }?>


</body>
</html>
