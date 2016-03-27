<?php
include('../lib/connect.php');	
	$obj=new connect();
if(isset($_GET['id']))
			{
			$id=$_GET['id'];
			$name=$obj->get_name($id);
			}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
			function hide(m1)
				{	
					var m=document.getElementById(m1);
					m.style.visibility='hidden';
				}
			function show(m1)
				{
					
					var m=document.getElementById(m1);
					m.style.visibility='visible';
				}
	
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>HOMEPAGE</title>


</head>
<style>
					
			#topics{
	position:absolute;
	border:2px solid black;
	height:215px;
	width:215px;
	left: 338px;
	top: 192px;
	box-shadow: 10px 10px 5px #888888;
			}
			#topics ul li{
			text-decoration:none;
			}
</style>
<body onload="hide('topics')">
    <div id="page">
		
        <div id="header">
        	<h1>MAKE THINGS HAPPEN</h1>
            <h2>SHAPE YOUR BELEIF</h2>
            
      </div>
  <div id="bar">
        	<div class="link" id="topic_head" onmouseover="show('topics')" onmouseout="hide('topics')"><a href="#">RECENT TOPICS</a></div>
            <div class="link"><a href="#">GALLERY</a></div>
            <div class="link"><a href="#">BLOG</a></div>
            <div class="link"><?php if(!isset($name)){ ?><a href="../register.php">REGISTER NOW</a><?php }else{?><a href="about.html">ABOUT US</a><?php }?></div>
		<div class="link"><a href="../chat.php?id=<?php if(isset($id))echo $id; else {echo '-1';}?>">CHAT</a></div>
		<div class="link"><?php if(isset($name)){?><a href="../logout.php?id=<?php echo $id ?>">LOGOUT</a><?php }else { ?><a href="../login.php">LOGIN</a><?php }?></div>
	</div>
           

</div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		
		
		
		
		this is my home page...and its yet to be made pretty  ;-)
		
		
		
		
		
		
		 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		
		
		
		
		
		
		
		
		
		
		
		
        
</div>

<div id="topics" onmouseover="show('topics')" onmouseout="hide('topics')">
	<ul>
			<li><a href="tor.html">THE TOR NETWORK</a></li>
			
	<ul>
</div>

        <div id="footer">copyright @silveruser.co.in</div>
</body>
</html>
