<?php 


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
		


	$page=1;$num=10;
	
	$res1=$obj->display_all();
	$rows=mysql_num_rows($res1);
	
	if(isset($_POST['num']))
		$num=$_POST['num'];
	
	if(isset($_POST['page']))
		$page=$_POST['page'];
	
	$res2=$obj->display_all()
	
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
	<p>WELCOME TO THE ADMIN PAGE </p>
</div>

	
		
					<div class="post">
						<h3 class="title"  >ADMIN CONTROL PANEL </h3>
						<p class="byline"></p>
						
						<div class="entry">
							<form action="admin.php" method="post" name="f1" >
  <table width="876" height="80" border="1" align="center" cellspacing="0" cellpadding="5">
    <tr>
		<td colspan="6" align="center"><h3>NUMBER OF RECORDS PER PAGE :-- </h3></td>
	  <td width="246"><input type="text" name="num" onChange="javascript:submit()" value=<?php if(isset($num))echo $num; ?>></td>
	</tr>
	<tr>
      <td width="152" align="center"><h2>ID</h2></td>
      <td width="213" align="center"><h2>NAME </h2></td>
      <td width="215" align="center"><h2>EMAIL ID </h2></td>
      <td align="center"><h2>USERNAME </h2></td>
	  <td align="center"><h2>PASSWORD </h2></td>
	  <td align="center"><h2>DELETE </h2></td>
	  <td align="center"><h2>EDIT </h2></td>
    </tr>
    <tr>
		<?php 
			if(isset($num) && isset($page)){
			$temp1=($page-1)*$num;
			$temp2=$temp1+$num;
			for($i=1;$i<=$temp1;$i++)
			{
				$arr=mysql_fetch_row($res2);
			}
			for(;$i<=$temp2;$i++)
			{$arr=mysql_fetch_row($res2);
				if($i>$rows)
				break;
			
		?>
      <td height="29" align="center"><?php echo $arr[0];?></td>
      <td align="center"><?php echo $arr[1];?></td>
      <td align="center"><?php echo $arr[2];?></td>
      <td align="center"><?php echo $arr[3];?></td>
	   <td align="center"><?php echo $arr[4];?></td>
	  <td align="center"><a href="del.php?id=<?php echo $arr[0]; ?>"><img src="images/T_Delete_Lg_D.png"></a></td>
	   <td align="center"><a href="edit.php?id=<?php echo $arr[0]; ?>"><img src="images/b_edit.png"></a></td>
    </tr>
	<?php }}?>
	<tr>
	  <td colspan="7" align="right"><h3>PAGE
	      <select name="page" onChange="javascript:submit()" >
            <?php 
			if(isset($num))
				{
					$count=$rows/$num;
					$count+=1;
					for($j=1;$j<$count;$j++)
						{
				
	?>
	          <option  value=<?php echo $j; ?> <?php if($j==$page) echo "selected='selected'";?> ><?php echo $j ?></option>
            <?php }}?>
              </select>
	  </h3></td></tr>
	<tr>
		<td colspan="7" align="right"><h4>SHOWING <?php echo $temp1+1; ?> TO <?php echo $i-1; ?> OF <?php echo $rows; ?></h4></td>
	</tr>
  </table>
  	<input type="hidden" name="uname" value=<?php echo $uname ?>>
	<input type="hidden" name="pass" value=<?php echo $pass ?>>
	
	</form>
	<form action="msgs.php" method="post">
		<input type="hidden" name="uname" value=<?php echo $uname ?>>
	<input type="hidden" name="pass" value=<?php echo $pass ?>>
	<h1 align="right"><input type="submit" value="see all msgs"></h1>
	</form>
				
		
	
	<?php for($f=0;$f<20;$f++){?>
	<br>
	<?php }?>

<div id="admin_logout">
<a href="../index.php"><input type="button" value="LOGOUT"></a></div> 

</body>
</html>
