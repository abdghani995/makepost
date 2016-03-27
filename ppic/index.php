<?php
session_start();
include('../lib/connect.php');	
	$obj=new connect();
if(isset($_SESSION['id']))
			{
			$id=$_SESSION['id'];
			$currname=$obj->get_name($id);
			$nameper=$obj->get_name($id);
			$username=$obj->get_data($id);
			$username=mysql_fetch_row($username);
			$username=$username[2];			
			}
	else
		{
		header('location:../login');
		}
if(isset($_FILES['pic']['name']))
	{
	$name=$_FILES['pic']['name'];
	$tmp_name=$_FILES['pic']['tmp_name'];
	$type=$_FILES['pic']['type'];
	$size=$_FILES['pic']['size'];
	$size=$size/(1024*1024);
   	$ext=substr($name,strpos($name,'.')+1);
	}
	
	if(isset($tmp_name)){
	if(!empty($tmp_name))
		{		
				if($ext=='jpg'||$ext=='jpeg'||$ext=='JPG'||$ext=='JPEG')
				{if($size<=3)
						{
						$dest='../../uploads/';
						if(move_uploaded_file($tmp_name,$dest.$username.'.jpeg'))
							{
								
								$value=$obj->change_pic($dest.$username.'.jpeg',$id);
								if($value!=1)
									{
									$msg= 'ERROR UPDATING';
									}
							}
						}
				 else{
				 		$msg= 'SIZE EXCEEDS 3MB';
				 		}
				}
				else
				{
				$msg= 'PLEASE SELECT A JPG IMAGE ';
				}
				
		}
	else
		{
			$msg= 'PLEASE SELECT SOMETHING';
		}		
	}

if(isset($nameper))
{
$pic=$obj->get_ppic($id);
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <script>
		function uploadChange()
		{
        $('input[id="picsubmit"]').click();
    	}
		function uploadChange1()
		{
        $('input[name="pic"]').click();
    	}
	</script>
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
      <a class="navbar-brand" href="../account/index.php" ><b>HOME</b></a>
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="glyphicon glyphicon-chevron-down"></span>
      </a>
    </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">  
          <li><a href="../chat.php">CHAT</a></li>
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
      		
  			
      			
      		
      		<div class="col-md-3">
              <div class="panel" id="midCol">
                <div class="panel-heading" style="background-color:#555;color:#eee;">HELLO <?php echo $currname ?></div> 
                <div class="panel-body">
                  
                  
                  <div class="well">
                          <!--<img src="profilepic" class="img-responsive">-->
                          <!--<h3><a href="HELLO NAME">Bootstrap 3 is Here.</a></h3>-->
                          
                          
                  </div>
                  
                  <hr>
                  
                  <h3>POST</h3>
                  
                  <h5><a href="../index.php?id=<?php echo ($obj->encr($id)); ?>"><i class="glyphicon glyphicon-user"></i> HOME</a></h5>
                  <h5><a href="../account/create_post"><i class="glyphicon glyphicon-user"></i> CREATE NEW POST</a></h5>
                  <h5><a href="../account/mypost/mypost.php"><i class="glyphicon glyphicon-user"></i> MY POSTS</a></h5>
                  <h5><a href="../account/editprofile"><i class="glyphicon glyphicon-user"></i> PROFILE</a></h5>
                  <h5><a href="../cp/cp.php"><i class="glyphicon glyphicon-user"></i> CHANGE PASSWORD</a></h5>
                
                  <hr> 
               </div> 
               </div><!--/panel-->
      		</div><!--/end mid column-->
      		
			
			
			
      		<!-- right content column-->
      		<div class="col-md-7" id="content">
            	<div class="panel">
    			<div class="panel-heading" style="background-color:#111;color:#fff;">PROFILE PICTURE(click to change)</div>   
              	<div class="panel-body">
                  
                  <div class="row">
                  
                  
                          <div class="col-md-8">
                           
                    <div id="ppic">
					<div id="pic" onClick="uploadChange1()">
						<?php if(($pic=='0')){ ?> 
                    		<img src="../../uploads/u.gif" width="533" height="471">
                    	<?php } else{?>
							<img src=<?php echo $pic ?> width="533" height="471">
						<?php } ?>
					</div>
					</div>
<form action="index.php" method="post" enctype="multipart/form-data" name="f1" id="f1">
				<input name="pic" type="file" size="40"  id="choose" onChange="uploadChange()" style="visibility:hidden"/><br><br>
				<input type="submit" value="CHANGE" id="picsubmit" style="visibility:hidden" name="pics">
</form>	
                           
                          </div> 
             <div class="col-md-8">
             	<?php if(isset($msg)){ ?>
                	<h4><?php echo $msg; ?></h4>
                <?php }?>
             </div>
                </div>
             
                  
                  
             	
                  </div><!--/panel-body-->
                </div><!--/panel-->
              	<!--/end right column-->
      	</div> 
  	</div>
</div>
<footer>
  <div class="container">
  	<div class="row">
      <div class="col-md-12 text-right"><h5>©silveruser.co.in</h5></div>
    </div>
  </div>
</footer>


	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>