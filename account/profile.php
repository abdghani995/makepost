<?php
include('../lib/connect.php');	
	$obj=new connect();
if(isset($_GET['id']))
			{
			$id=$_GET['id'];
			$id=$obj->decr($id);
			$name=$obj->get_name($id);
			$pic=$obj->get_ppic($id);
			
			}
else{
	header('Location:../');
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
<nav class="navbar navbar-fixed-top">
   <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php" ><b>BACK</b></a>
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="glyphicon glyphicon-chevron-down"><img src="images/ico.png"></span>
      </a>
    </div>
      
    </div>
</nav><!-- /.navbar -->
<br><br><br><br><br>
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
  		<!-- right content column-->
      		<div class="col-md-7" id="content">
            	<div class="panel">
    			<div class="panel-heading" style="background-color:#111;color:#fff;"><?php echo $name ?></div>   
              	<div class="panel-body">
                  
                  <div class="row">
                  
                  
                          <div class="col-md-8">
                              <div id="pic"><?php if(($pic=='0')){ ?> <img src="../../uploads/u.gif" width="350" height="400"> <?php } else{?>
                                        <img src="<?php echo $pic ?>" alt="no profile pic available" width="350" height="400">
                                        <?php } ?>
                                    </div>
                                    
                                
                                
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