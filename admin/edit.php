<?php 

if(isset($_GET['id'])){
$id=$_GET['id'];

include('../lib/connect.php');	
	$obj=new connect();
	$id=$obj->decr($id);
	$res=$obj->get_data($id);
	$arr=mysql_fetch_row($res);
}
else
{
header('location:index.php');
}
session_start();
$pid=$_SESSION['id'];
if(!($pid==1 || $pid==10))
				{
					header('location:index.php');
				}
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Simple Green by Free CSS Templates</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<div id="admin_logout">
<a href="../index.php"><input type="button" value="LOGOUT"></a></div> 
<div id="header">
	<h1>ADMIN</h1>
	<p>WELCOME TO THE ADMIN PAGE </p>
</div>

	<div id="page">
		<div class="bgtop">
			<div class="bgbtm">
				
				<div id="content">
					<div class="post">
						<h1 class="title">edit</h1>
						<p class="byline"></p>
						<div class="entry">
						<form action="edit1.php" method="post">
							<table width="473" border="1" frame="void" rules="none">
							  <tr>
								<td colspan="2">EDIT ACCOUNT OF <?php echo $arr[0]; ?></td>
							  </tr><tr>
								<td colspan="2">&nbsp;</td>
							  </tr><tr>
								<td colspan="2">&nbsp;</td>
							  </tr>
							  <tr>
								<td width="253"><u>ATTRIBUTES</u></td>
								<td width="204"><u>VALUES</u></td>
							  </tr>
							  <tr>
								<td colspan="2">&nbsp;</td>
							  </tr><tr>
								<td colspan="2">&nbsp;</td>
							  </tr>
							 <tr>
							 	<td>NAME</td>
								<td><input type="text" name="name" placeholder="<?php echo $arr[0] ?>"></td>
							 </tr>
							 <tr>
								<td colspan="2">&nbsp;</td>
							  </tr>
							 <tr>
							 	<td>EMAIL</td>
								<td><input type="email" name="email" placeholder="<?php echo $arr[1] ?>"></td>
							 </tr>
							 <tr>
								<td colspan="2">&nbsp;</td>
							  </tr>
							  <tr>
							 	<td>USERNAME</td>
								<td><input type="text" name="uname" placeholder="<?php echo $arr[2] ?>"></td>
							 </tr>
							 <tr>
								<td colspan="2">&nbsp;</td>
							  </tr>
							  <tr>
							 	<td>PASSWORD</td>
								<td><input type="text" name="pass" placeholder="<?php echo $arr[3] ?>"></td>
							 </tr>
							 <tr>
								<td colspan="2">&nbsp;</td>
							  </tr>
							 <tr>
								<td colspan="2">&nbsp;</td>
							  </tr><tr>
								<td colspan="2">&nbsp;</td>
							  </tr>
							   <input type="hidden" name="id" value="<?php echo $id ?>">
							  <tr>
								<td colspan="2"><input type="submit" value="PROCEED"></td>
							  </tr>
						  </table>
						 
					</form>
					</div>
					
				</div>
				
		</div>
	</div>
	
	<?php for($f=0;$f<20;$f++){?>
	<br>
	<?php }?>
<div id="footer">
	@silveruser
</div>


</body>
</html>
