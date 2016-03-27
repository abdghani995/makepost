
<?php
include('lib/connect.php');	
	$obj=new connect();
if(isset($_GET['id']))
			{
			$id=$_GET['id'];
			$id=$obj->decr($id);
			$name=$obj->get_name($id);
			$pic=$obj->get_ppic($id);
			$val=$obj->encr($id);
			echo $pic;
			}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="anoceanofsky.css" />
<title>An Ocean of Sky by Bryant Smith</title>
</head>

<body>
    <div id="page">
		<div class="topNaviagationLink"><?php if(!isset($name)){ ?><a href="register.php">REGISTER NOW</a><?php }else{?><a href="about.html">ABOUT US</a><?php }?></div>
<div class="topNaviagationLink"><a href="chat.php?id=<?php if(isset($id)){$id=$obj->encr($id); echo ($id);}
															else {echo encr(-1);}?>
															">CHAT</a></div>

		<div class="topNaviagationLink"><?php if(isset($name)){?><a href="logout.php?id=<?php {$id=$obj->encr($id); echo ($id);}?>">LOGOUT</a><?php }else { ?><a href="login.php">LOGIN</a><?php }?></div>
	</div>
    <div id="mainPicture">
    	<div class="picture">
        	<div id="headerTitle">WELCOME TO NEW CREATION </div>
            <div id="headerSubtext">MAKE THINGS HAPPEN </div>
            <br><br>
        </div>
    </div>
<div class="contentBox1">
    				<?php if(isset($name)){ ?>
				<div class="contentTitle" id="account_title">
				  <h2>Hello &nbsp;<?php echo $name; ?> &nbsp;!!</h2>
				  <p>&nbsp;</p>
		 </div>
				
						  		<div id="pic"><?php if(($pic=='0')){ ?> <img src="../../uploads/u.gif" width="219" height="245"> <?php } else{?>
									<img src="../../<?php echo $pic ?>" width="229" height="245">
									<?php } ?>
								</div>
	  							<div id="change"><a href="ppic/index.php?id=<?php echo $val ?>">
	  							  <input name="button" type="button" value="CHANGE PROFILE PIC" />
	  							</a></div>
			   
			<?php }?>
</div>	
		<?php for($f=0;$f<100;$f++){?>
	<br>
	<?php }?>  
		<div id="acc">
		<h1>YOUR ACCOUNT WILL BE DISPLAYED HERE  .....</h1>
</div>
       </div> 	
    <?php for($f=0;$f<10;$f++){?>
	<br>
	<?php }?>    
<div id="footer">@silveruser</div>
</body>
</html>
