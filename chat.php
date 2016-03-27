<?php
session_start();
		require('includes/core.php');
		include('lib/connect.php');	
		
		$obj=new connect();
		if(isset($_POST['num']))
		{
		$num=$_POST['num'];
		}
		
		if(isset($_SESSION['id']))
			{
			$id=$_SESSION['id'];
			$name=$obj->get_name($id);
			$username=$obj->getusername($id);
			$obj->droptable($username);
			}
		else
			{
				header('Location:login');
			}
			$val=$obj->login_check($id);	
			if($val==0)
			{
			 header('location:login');
			}
		
?>

<!DOCTYPE html>
<html lang="en">
	<head>
    
			<title>CHAT APPLICATION</title>
			<link type="text/css" rel="stylesheet" href="public/css/main.css" />
			<link rel="stylesheet" type="text/css" href="anoceanofsky.css" />
	        <style type="text/css">
<!--
.style1 {font-size: 36px}
-->
            </style>
</head>
	<body>
	<div id="input">
	 
		
	<div id="feedback"></div>
		<form action="#" method="get" id="form_input">
<label><h3 id="send_name">HELLO &nbsp;&nbsp;&nbsp;<?php echo $name ?> </h3>	
</label>
<p>
  <input type="hidden" name="sender" id="id" value="<?php echo $name ?>" / >
  <input type="hidden" name="stat" id="stat" value="<?php echo $val ?>" / >
  
  <label>
</p>
<br><br>
<h3 >ENTER MESSAGE:</h3><br>
			<textarea name="textarea" cols="40" rows="7" id="message" ></textarea>
		  </label>
			  <br>
			  <br><br>
			 
			    <input type="submit" name="send" value="Send" id="send" />
		</form>
	</div>
	<div id="chathead">
		<h1 class="style1">MAKE THINGS HAPPEN </h1>
	</div>
	    	<div id="mar"><marquee >@silveruser</marquee></div>
	
	<div id="messages">	</div>
		<script type="text/javascript" src="scripts/js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="scripts/js/auto_chat.js"></script>
		<script type="text/javascript" src="scripts/js/send.js"></script>
        <div id="page">
          <div class="topNaviagationLink"><a href="account">ACCOUNT</a></div>
		  <div class="topNaviagationLink"><a href="#">ABOUT US</a></div>
		  <div class="topNaviagationLink"><a href="#">GALLERY</a></div>
          <div class="topNaviagationLink"><a href="logout.php?id=<?php echo $id ?>">
            <input name="button" type="button" id="logout" value="LOGOUT">
            LOGOUT</a>
		  </div>
		 	
        </div>
	</body>
</html>