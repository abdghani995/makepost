<?php 
include('../lib/connect.php');
$obj=new connect();
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
      
	</head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <a href="../"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
          <h2 class="text-center">FORGOT PASSWORD</h2>
          <?php if(isset($_GET['err'])){
			  $err=$_GET['err'];
			  $err=$obj->decr($err);
			  if($err==0){
		   ?>
		  	<h3>Password has been sent to your registered email-id<h3>
		  <?php }else{?>
          	<h3>Invalid email-id<h3>
          <?php }}?>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" action="fp1.php" method="post" name="register" id="register">
            <?php {?>
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Enter Your Registered email" name="email" >
            </div>       
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" type="submit">PROCEED</button>
              <span class="pull-right"><a href="../login/register.php">Register</a></span><span><a href="../login">Login</a></span>	<?php }?>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true"><a href="../">Cancel</a></button>
	  </div>	
      </div>
	  
	   
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>