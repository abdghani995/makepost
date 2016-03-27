<?php
session_start();
include('../../lib/connect.php');	
	$obj=new connect();
if($_SESSION['id'])
			{
			$id=$_SESSION['id'];
			$name=$obj->get_name($id);
			$posts=$obj->mypostt($id);
			$ros=$obj->mypostt($id);
			$ros=mysql_num_rows($ros);
			}

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
      <a class="navbar-brand" href="../index.php" ><b>HOME</b></a>
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="glyphicon glyphicon-chevron-down"><img src="../images/ico.png"></span>
      </a>
    </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">  
          <li><a href="../../chat.php>">CHAT</a></li>
          <li><a href="../logout.php">LOGOUT</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Channels</a>
          
          </li>
        </ul>
        <!--
       
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
          
        </div>
      </div>
    </div>
  </div>
</header>

<div class="container">
	<div class="no-gutter row">
      		
  			
      			
      		
      		
			
			
			
      		
      		<div class="col-md-7" id="content">
            	<div class="panel">
    			<div class="panel-heading" style="background-color:#111;color:#fff;">MY POSTS</div>   
              	<div class="panel-body">
                  
                  <div class="row">
                  
                  
                       <?php if($ros!=0){for($i=0;$i<$ros;$i++){
						$arr=mysql_fetch_row($posts);
						?>
                          <div class="col-md-8" style="background-color:#320C0C">
                              	<h3><?php echo $arr[2]?></h3>
                                <p><?php echo $arr[3]?></p>
                                <hr color="#464343"><hr color="#464343">
                          </div>
                          
                         <?php }}else{ ?>
                         <div class="col-md-8" style="background-color:#320C0C">
                              	<h3>YOU HAVENT POSTED YET</h3>
                          </div>
                		<?php }?>
                
                	</div>
             
                  
                  
             	
                  </div><!--/panel-body-->
                </div><!--/panel-->
              	<!--/end right column-->
      	</div> 
  	</div>
</div>
<?php for($i=0;$i<10;$i++){?>
<br>
<?php }?>
<footer>
  <div class="container">
  	<div class="row">
      <div class="col-md-12 text-right"><h5>©silveruser</h5></div>
    </div>
  </div>
</footer>


	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>