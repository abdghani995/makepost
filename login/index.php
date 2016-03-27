<?php 
session_start();	
include('../lib/connect.php');	
	$obj=new connect();
if(isset($_SESSION['id']))	
{
	header('location:../account');
}
	if(isset($_POST['username']))
	{
		
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$res1=$obj->check($username);
			if(isset($res1))
			{
				$arr=mysql_fetch_row($res1);
				if($arr[1]==$password)
					{	
						$id=$arr[0];
						$obj->logged_in($id);
						$_SESSION['id']=$id;
						header('location:../account');
					}
				else
					{
						header('location:index.php?error=1');
					}
			}
			
	}

	
	
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>login</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
        <script>
		function showhide()
		{
			var a=document.getElementById('p').type;
			if(a=='password')
			{
				document.getElementById('p').type="text";
			}
			else
			{
				document.getElementById('p').type="password";
			}
		}
		</script>
	</head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <a href="../"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
          <h1 class="text-center">Login</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" action="index.php" method="post" name="register" id="register">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Username" name="username" >
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Password" name="password"  id="p">
            </div>
           		<input type="checkbox" name="pass" onChange="showhide()"></h6>SHOW</h6><br><br>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Sign In</button>
              <span class="pull-right"><a href="register.php">Register</a></span><span><a href="../fp/fp.php">Forgot Password?</a></span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true"><a href="../">Cancel</a></button>
	  </div>	
      </div>
	  <?php 
		if(isset($_GET['error'])){ ?>
					  <div class="modal-footer">
					  <div class="col-md-12">
					  <h3>INVALID USERNAME OR PASSWORD</h3>
					  </div>	
					  </div>
	   <?php }?>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>