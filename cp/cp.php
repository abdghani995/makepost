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
			<form  name="pass" action="cp1.php" method="post">
			  <table width="496" border="1" rules="none" frame="void" >
				  <tr>
					<td width="262" align="center">&nbsp;</td>
					<td width="218" align="center">&nbsp;</td>
				  </tr>
				   <tr>
					<td width="262" align="center">&nbsp;</td>
					<td width="218" align="center">&nbsp;</td>
				  </tr>
				  <tr>
					<td align="center">ENTER YOUR USERNAME </td>
					<td align="center"><input name="uname" type="text" id="uname"></td>
				  </tr>
				   <tr>
					<td width="262" align="center">&nbsp;</td>
					<td width="218" align="center">&nbsp;</td>
				  </tr>
				  
				 <tr>
					<td width="262" align="center">&nbsp;</td>
					<td width="218" align="center">&nbsp;</td>
				  </tr>
				  <tr>
				    <td align="center">ENTER OLD PASSWORD </td>
				    <td align="center"><label>
				      <input type="password" name="op">
				    </label></td>
			    </tr>
				 <tr>
					<td width="262" align="center">&nbsp;</td>
					<td width="218" align="center">&nbsp;</td>
				  </tr>
				  <tr>
				    <td align="center">&nbsp;</td>
				    <td align="center">&nbsp;</td>
			    </tr>
				  <tr>
				    <td align="center">ENTER NEW PASSWORD </td>
				    <td align="center"><input name="np1" type="password" id="np1"></td>
			    </tr>
				  <tr>
				    <td align="center">&nbsp;</td>
				    <td align="center">&nbsp;</td>
			    </tr>
				 <tr>
					<td width="262" align="center">&nbsp;</td>
					<td width="218" align="center">&nbsp;</td>
				  </tr>
				  <tr>
				    <td align="center">RETYPE PASSWORD </td>
				    <td align="center"><input name="np2" type="password" id="np2"></td>
			    </tr>
				
				 <tr>
				    <td align="center">&nbsp;</td>
				    <td align="center">&nbsp;</td>
			    </tr> <tr>
				    <td colspan="2" align="center"><input type="submit" value="CHANGE"></td>
				    </tr>
			  </table>

			</form>
</div>
	
	<?php for($f=0;$f<25;$f++){?>
	<br>
	<?php }?>
<div id="footer">
	@silveruser
</div>


</body>
</html>
