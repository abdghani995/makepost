<?php
include("../lib/connect.php");
$obj=new connect();
	if(isset($_GET['err']))
	{
	$err_code=$_GET['err'];
	$name=$_GET['name'];
	$username=$_GET['username'];
	$email=$_GET['email'];
	}
$random=$obj->randomgen();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
    	<script>
			function enable()
			{
				var a =document.getElementById('terms').checked;
				a=a.toString();
				if(a=='true')
					{
						document.getElementById('registerr').disabled=false;
						
					}
				if(a=="false")
					{
						document.getElementById('registerr').disabled=true;
						
					}
			}
			function abc(val)
				{
					window.open(val,outerHeight="50px",outerWidth="50px");
				}
		</script>
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
          <h1 class="text-center">REGISTER</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" action="plain.php" method="post" name="register" id="register">
            <div class="form-group">
             <input name="name" class="form-control input-lg" type="text" id="name"  value="<?php if(isset($name)){echo $name;}?>"required placeholder="name"/>    </div>
            <div class="form-group">
             <td><input class="form-control input-lg" name="email" placeholder="email" type="email" required id="email" value="<?php if(isset($email)){echo $email;}?>" size="40"/></td>
            </div>
            <div class="form-group">
              <td><input class="form-control input-lg" name="username" type="text" id="username" value="<?php if(isset($username)){echo $username;}?>"required placeholder="username"/></td>
            </div>
            <div class="form-group">
              <input class="form-control input-lg" name="password" type="password" id="password" placeholder="password" required/>
            </div>
			 <div class="form-group">	
            <input class="form-control input-lg"  type="text" style="width:120px"  value=<?php echo $random ?> disabled/><span id="wrong"></span>
            </div>
            <div class="form-group">		
            <input class="form-control input-lg" name="c2" type="text" id="c2" placeholder="Enter above captcha" required />		
            </div>
           	 <input id="terms" type="checkbox" name="pass" onchange="enable()"></h6>I AGREE </h6>
             <a href="#" onClick="abc('terms.html')"  style="font-size:14px;color:#6628CB">TERMS AND CONDITION</a>
             
             <br><br>
            <div class="form-group"  >
              <button  class="btn btn-primary btn-lg btn-block" id="registerr" disabled \>REGISTER</button>
              <span class="pull-right"><a href="index.php">LOGIN</a></span><span>
              <a href="#" onClick="abc('needhelp.html')"  style="font-size:14px;color:#6628CB">Need Help?</a>
              </span>
            </div>
           <input type="text" hidden="hidden" name="c1" value="<?php echo $random ?>">
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true"><a href="../">Cancel</a></button>
		  </div>	
      </div>
	  <?php 
			 
					if(isset($err_code))
					{
						if($err_code==1) {?>
						<h5>USERNAME AND NAME ARE SAME</h5>
                        <?php }elseif($err_code==2){?>
						<h5>USERNAME ALREADY EXISTS. TRY DIFFERENT USRERNAME</h5>
						<?php }elseif($err_code==3){?>
						<h5>PASSSWORD MUST BE 8 CHARACTER LONG AND SHOULD CONTAIN AN UPPERCASE ,A LOWER CASE ,A NUMBER AND SPECIAL SYMBOL</h5>		<?php }elseif($err_code==4) {?>
                        <h5>THE EMAIL ID ALREADY EXISTS</h5>
                        <?php }elseif($err_code==5) { ?>
                        <script>document.getElementById("wrong").innerHTML="<h4>INVALID CAPTCHA</h4>"</script>
						<?php }if($err_code==0)
						{
							$from="email_verificatio@silveruser.co.in";
							$subject="email verification for makepost";
							$id=$obj->get_id_fromusername($username);
							$message="www.silveruser.co.in/verification.php?id=".$obj->encr($id);					
							mail($email,$subject,$message,"From:".$from);
							header('Location:index.php?msg=sent');
						}
					}
		?>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>