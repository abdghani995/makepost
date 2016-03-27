<?php 
session_start();
include('../lib/connect.php');	
	$obj=new connect();
if($_SESSION['id'] )
			{	
			$id=$_SESSION['id'];
			$pic=$obj->get_ppic($id);
			$name=$obj->get_name($id);
			if(!($id==1 || $id==10))
				{
					header('location:../login');
				}
			}
else
	{
		header('location:../login');
	}
		


	$page=1;$num=10;
	
	$res1=$obj->display_all_post();
	$rows=mysql_num_rows($res1);
	
	if(isset($_POST['num']))
		$num=$_POST['num'];
	
	if(isset($_POST['page']))
		$page=$_POST['page'];
	if(isset($_GET['page']))
		$page=$_GET['page'];
	$res2=$obj->display_all_post()
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>account</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<nav class="navbar navbar-static">
   <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="../account" ><b>HOME</b></a>
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="glyphicon glyphicon-chevron-down"></span>
      </a>
    </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">  
          <li><a href="msgs.php">MESSAGES</a></li>
          <li><a href="admin.php">ACCOUNT</a></li>
          <li><a href="../logout.php">LOGOUT</a></li>
        </ul>
      </div>
    </div>
</nav><!-- /.navbar -->

<header class="masthead">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1><a href="#" title="Scroll down for your viewing pleasure">MAKEPOST</a>
          <p class="lead">THINK....POST...</p></h1>
      </div>
      <div class="col-md-6">
        <div class="well pull-right">
          <!--logo<img src="//placehold.it/280x100/E7E7E7"> -->       
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Begin Body #side bar-->
<div class="container">
	<div class="no-gutter row">
      		
  			
      			
      		
      		
			
			
			
      		<!-- right content column-->
      		
            	
                  
                  <div class="row">
                  
                  
                          <div class="col-md-15 text-center">
                           	<form action="posts.php" method="post" name="f1" >
  <table width="1150px" height="80" border="0" align="center" cellspacing="10" cellpadding="10px" class="well">
    <tr>
		<td width="1000px" colspan="6" align="center"><h3>NUMBER OF RECORDS PER PAGE :-- </h3></td>
        <td width="150px"><input type="text" name="num" onChange="javascript:submit()" value=<?php if(isset($num))echo $num; ?>></td>
	</tr>
	<tr>
      <td width="50px" align="center"><h4>PID</h4></td>
      <td width="150px" align="center" ><h4>NAME </h4></td>
      <td width="600px" align="center" colspan="2"><h4>HEAD </h4></td>
      <td width="100" align="center"><h4>LIKES </h4></td>
      <td width="100" align="center"><h4>REPLIES</h4></td>
	  <td align="center"><h4>DELETE </h4></td>
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
      <td align="center"><?php echo $obj->get_name($arr[8]);?></td>
      <td align="center" colspan="2"><a href="../account/seemore.php?pid=<?php echo $obj->encr($arr[0]) ?>"><?php echo $arr[2];?></a></td>
      <td align="center"><?php echo $arr[4];?></td>
	   <td align="center"><?php echo $arr[6];?></td>
	  <td align="center"><a href="delpost.php?pid=<?php echo $obj->encr($arr[0]); ?>&page=<?php echo $page;?>"><img src="images/T_Delete_Lg_D.png"></a></td>
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
  	
	
	</form>
                          </div> 
                </div>
        
              	<!--/end right column-->
      
  	</div>
</div>
<footer>
  <div class="container">
  	<div class="row">
      <div class="col-md-12 text-right"><h5>©silveruser.co.in
      </h5></div>
    </div>
  </div>
</footer>


	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>