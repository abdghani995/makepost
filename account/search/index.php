
<?php
session_start();
include('../../lib/connect.php');	
	$obj=new connect();
if($_SESSION['id'] )
			{	
			$id=$_SESSION['id'];
			$name=$obj->get_name($id);
			$posts=$obj->get_all_posts();
			$ros=$obj->post_count();
			$pic=$obj->get_ppic($id);
			$username=$obj->getusername($id);
			$valll=$obj->droptable($username);
			if($obj->login_check($id)==0)
				{
					header('Location:../login');
				}
			
			}
else
{
	header('Location:../login');
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
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="../css/styles.css" rel="stylesheet">
	</head>
	<body>
<nav class="navbar navbar-static">
   <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="../../index.php" ><b>HOME</b></a>
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="glyphicon glyphicon-chevron-down"></span>
      </a>
    </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">  
          <li><a href="../">CHAT</a></li>
          <li><a href="../../logout.php">LOGOUT</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Channels</a>
          </li>
        </ul>
        
      </div>
    </div>
</nav><!-- /.navbar -->

<header class="masthead">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1><a href="#" title="Scroll down for your viewing pleasure">MAKE POST</a>
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
                <div class="panel-heading" style="background-color:#555;color:#eee;">ACCOUNT</div> 
                <div class="panel-body">
                  
                  
                  <div class="well">
                        
                          
                          
                  </div>
                  
                  <hr>
                  
                  <h3>POST</h3>
                  
                  <h5><a href="../index.php"><i class="glyphicon glyphicon-user"></i> HOME</a></h5>
                  <h5><a href="../create_post"><i class="glyphicon glyphicon-user"></i> CREATE NEW POST</a></h5>
                  <h5><a href="../my_post/mypost.php"><i class="glyphicon glyphicon-user"></i> MY POSTS</a></h5>
                  <h5><a href="../editprofile"><i class="glyphicon glyphicon-user"></i> EDIT PROFILE</a></h5>
                  <h5><a href="../../cp/cp.php"><i class="glyphicon glyphicon-user"></i> CHANGE PASSWORD</a></h5>>
                
                  <hr> 
               </div> 
               </div><!--/panel-->
      		</div><!--/end mid column-->
      		
			
			
			
      		<!-- right content column-->
      		<div class="col-md-7" id="content">
            	<div class="panel">
    			<div class="panel-heading" style="background-color:#111;color:#fff;">Top Stories</div>   
              	<div class="panel-body">
                  
                  <div class="row">
                  
                  
                          <div class="col-md-8">
                            <h2>The Year of Responsive Design.</h2>
                            2013 was marked as the year of Responsive Web Design (RWD). The Web is filled with big brands, galleries and magical examples that media queries demonstrate the glory of responsive design.
                            <br><br>
                            <button class="btn btn-default">More</button>
                          </div> 
                          <!--right side bar<div class="col col-sm-4">
                            <a href="#"><img src="//placehold.it/300x120/77CCDD/66BBCC" class="img-responsive"></a>
                            <div class="text-muted"><small>Aug 15 / John Pierce</small></div>
                            <p>
                            Web design has come a long way since 1999.
                            </p>
                            <hr>
                            <a href="#"><img src="//placehold.it/300x120/77CCDD/66BBCC" class="img-responsive"></a>
                            <div class="text-muted"><small>Aug 15 / Wilson Traiker</small></div>
                            <p>
                            The "flat" look was a big trend this year.
                            </p>
                          </div>--> 
                
                
                
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