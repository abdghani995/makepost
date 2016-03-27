<?php
session_start();
include('../lib/connect.php');	
	$obj=new connect();
if($_SESSION['id'])
			{	
			$id=$_SESSION['id'];
			$name=$obj->get_name($id);
			$pid=$_GET['pid'];
			$pid=$obj->decr($pid);
			$val=$obj->get_postcomments($pid);
			$rows=mysql_num_rows($val);	
		    $val1=$obj->get_postcomments($pid);
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
<nav class="navbar navbar-static">
   <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><b>HOME</b></a>
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="glyphicon glyphicon-chevron-down"></span>
      </a>
    </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">  
          <li><a href="#">CHAT</a></li>
          <li><a href="../logout.php">LOGOUT</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Channels</a>
            <ul class="dropdown-menu">
              <li><a href="#">Sub-link</a></li>
              <li><a href="#">Sub-link</a></li>
              <li><a href="#">Sub-link</a></li>
              <li><a href="#">Sub-link</a></li>
              
            </ul>
          </li>
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
			
      		<!-- right content column-->
      		<div class="col-md-7" id="content">
            	<div class="panel">
    			<div class="panel-heading" style="background-color:#111;color:#fff;">hello <?php echo $name; ?></div>   
              	<div class="panel-body">
                  
                  <div class="row">
                  		<div class="col-md-8">
                        	<h1>COMMENTS</h1>    
                        </div>
                  	  <?php if($rows==0){ ?>
                      		<div class="col-md-8">
                             <h3>no comments yet</h3>
                            </div>
                      <?php }else{ 
					  for($i=0;$i<$rows;$i++){
					  $arr=mysql_fetch_row($val1);
					  ?>
                          <div class="col-md-8">
                           <span><h4><?php echo $arr[1]; ?> :</h4></span><?php echo $arr[2]; ?>
                           <hr><hr>
                          </div> 
                       <?php }}
					   ?>
                       <?php {?>
                       <form method="post" action="commentupdate.php?id=<?php echo $id?>&pname=<?php echo $name;?>" id="f1">
                       		<div class="col-md-8">
                             <h3><input type="hidden" value="<?php echo $name;?>" name="name"></h3>
                            </div>
                            <div class="col-md-8">
                            <textarea name="comment" form="f1" rows="10" name="comment" cols="50px" placeholder="COMMENT" required style="resize: none; overflow-y: scroll; "></textarea>
                            </div>
                            <input type="hidden" name="pid" value="<?php echo $pid;?>">
                            <div class="col-md-8">
                             <h3><input type="submit" value="COMMENT"></h3>
                            </div>
                       </form>
                       <?php }?>
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