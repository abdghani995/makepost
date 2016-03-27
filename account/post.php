<?php
include('../lib/connect.php');	
	$obj=new connect();
session_start();	
if($_SESSION['id'])
			{
			$id=$_SESSION['id'];
			$name=$obj->get_name($id);
			}
else{
	header('Location:../');
}
$pid=$obj->decr($_GET['pid']);
$val=$obj->getpostpart($pid);
$arr=mysql_fetch_row($val);
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
      <a class="navbar-brand" href="index.php" ><b>HOME</b></a>
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="glyphicon glyphicon-chevron-down"><img src="images/ico.png"></span>
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
        <h1><a href="#" title="Scroll down for your viewing pleasure">MAKE...POST...</a>
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
                <div class="panel-heading" style="background-color:#555;color:#eee;">HELLO <?php echo $name; ?></div> 
                <div class="panel-body">
                  
                  
                  <div class="well">
                          <!--<img src="profilepic" class="img-responsive">-->
                          <!--<h3><a href="HELLO NAME">Bootstrap 3 is Here.</a></h3>-->
                          
                          
                  </div>
                  
                  <hr>
                  
                  <h3>POST</h3>
                  
                  <h5><a href="index.php"><i class="glyphicon glyphicon-user"></i> HOME</a></h5>
                  <h5><a href="create_post"><i class="glyphicon glyphicon-user"></i> CREATE NEW POST</a></h5>
                  <h5><a href="my_post/mypost.php"><i class="glyphicon glyphicon-user"></i> MY POSTS</a></h5>
                  <h5><a href="#"><i class="glyphicon glyphicon-user"></i> PROFILE</a></h5>
                  <h5><a href="#"><i class="glyphicon glyphicon-user"></i> CHANGE PASSWORD</a></h5>
                
                  <hr> 
               </div> 
               </div><!--/panel-->
      		</div><!--/end mid column-->
      		
			
			
			
      		<!-- right content column-->
      		<div class="col-md-7" id="content">
            	<div class="panel">
    			<div class="panel-heading" style="background-color:#111;color:#fff;">POST</div>   
              	<div class="panel-body">
                  
                  <div class="row">
                  
                  
                          <div class="col-md-8">
                            	<h5><?php echo $arr[1];?> posted
                                <?php for($k=0;$k<5;$k++){ ?>&nbsp<?php }?>
                                <?php if(isset($arr[7])){echo $arr[7];}?>
                                </h5>
                            	<h3><?php echo $arr[2]?></h3>
                                <p><?php echo $arr[3]?></p>
  <a  title="<?php
              $nacount=$obj->getlike_name($arr[0]);
              $nacount=mysql_num_rows($nacount);
              $namelist=$obj->getlike_name($arr[0]);
                for($j=0;$j<$nacount;$j++)
				{
					$nn=mysql_fetch_row($namelist);
					echo $nn[0];
					echo ("\n");
				}
                
              ?>" href="postlike.php?pid=<?php echo $arr[0];?>&name=<?php echo $name;?>&id=<?php echo $id;?>">like(<?php echo $arr[4];?>)</a>
              
              
              &nbsp&nbsp&nbsp
              
              
              <span><a href="postcomment.php?pid=<?php echo $arr[0]; ?>">comment(<?php echo $arr[6] ?>)</a></span>
                                <hr color="#464343"><hr color="#464343">
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
      <div class="col-md-12 text-right"><h5>©Company 2014</h5></div>
    </div>
  </div>
</footer>


	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>