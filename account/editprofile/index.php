<?php
session_start();

include('../../lib/connect.php');	
	$obj=new connect();
if($_SESSION['id'])
			{
			$id=$_SESSION['id'];
			$currid=$_SESSION['id'];
			$name=$obj->get_name($id);
			$pic=$obj->get_ppic($id);
			if($obj->login_check($id)==0)
				{
					header('Location:../login');
				}
			$val=$obj->display_all11($id);
			$arr=mysql_fetch_row($val);
			}
else
{
	header('Location:../login');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    	 <script language="javascript" src="js/add.js"></script>
          <script>
		 	
			function show_follow()
			{
				$('#follows').toggle('fast');
			}

		 </script>
    	<style>
			#follow{
			background-image:url(images/follow.png) ;
			background-repeat:no-repeat;
			background-position:left;
			width:120px;
			height:30px;
			
			}
		</style>
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
      <a class="navbar-brand" href="../" ><b>HOME</b></a>
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="glyphicon glyphicon-chevron-down"><img src="../images/ico.png"></span>
      </a>
    </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">  
          <li><a href="../../chat.php">CHAT</a></li>
          <li><a href="../../logout.php">LOGOUT</a></li>
          <li class="dropdown">
          </li>
        </ul>
      </div>
    </div>
</nav><!-- /.navbar -->
<br><br><br><br><br>
<header class="masthead">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1><a href="#" title="Scroll down for your viewing pleasure">MAKEPOST</a>
          <p class="lead">THINK...POST...</p></h1>
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
      		
  			
      			
      		
      		<div class="col-md-3 text-center">
              
                <div class="panel-heading" style="background-color:#555;color:#eee;">PHOTO</div> 
                <div class="panel-body">
                  
                  
                  <div class="well">
                         <div id="pic"><?php if(($pic=='0')){ ?> <img src="../../../uploads/u.gif" width="219" height="245"> <?php } else{?>
									<img src="../<?php echo $pic ?>" width="229" height="245">
									<?php } ?>
								</div>
	  							<div id="change">
                                <br>
                                &nbsp
                                <?php if($currid==$id) {?>
                                <button class="btn btn-default" onClick="show_follow()">
                                	<h5>followers(<?php echo $obj->count_follow($currid) ?>)</h5>
                                </button>
                                								<?php } else{?>
                                <div id="add"><button class="btn btn-default" id="follow" onClick="addfollow(<?php echo $id ?>)" ><p>FOLLOW(<?php echo $obj->count_follow($id) ?>)</p></button>
                                </div>
                                <?php } ?>	
                                </div> 
                          
                          
                  </div>
                  
                  <hr>
                  
                  <h3>PROFILE</h3>
                  
                  <h5><a href="../index.php"><i class="glyphicon glyphicon-user"></i> HOME</a></h5>
                  <h5><a href="../create_post"><i class="glyphicon glyphicon-user"></i> CREATE NEW POST</a></h5>
                  <h5><a href="#"><i class="glyphicon glyphicon-user"></i> PROFILE</a></h5>
                  <h5><a href="../../cp/cp.php"><i class="glyphicon glyphicon-user"></i> CHANGE PASSWORD</a></h5>
                  <hr> 
              
               </div><!--/panel-->
      		</div><!--/end mid column-->
      		
			
			
			
      		<!-- right content column-->
      		<div class="col-md-7 text-center" id="content">
            	<div class="panel">
    			<div class="panel-heading" style="background-color:#111;color:#fff;">
                <?php if($currid==$id){ ?>
                	YOUR PROFILE
                <?php }else{ ?>
                	PROFILE OF <?php echo $obj->get_name($id) ?>
                <?php } ?>
                </div>
              	<div class="panel-body">
                  
                  	<div class="row">
                  		 <form role="form" action="submission.php" method="post">
                  		   <div class="col-md-7 text-left">
                           		<label for="name">NAME</label>
                                <input type="text" class="form-control"  name="name" value="<?php echo $name ?>" value=<?php echo $arr[1]; ?>>
                          </div>
                          <div class="col-md-7 text-left">
                          		<label for="me">ABOUT ME</label>
                                <input type="text" class="form-control"  name="me" placeholder="FEW LINES ABOUT ME" value=<?php echo $arr[8]; ?>>
                          </div>
                          <div class="col-md-7 text-left">
                          		<label for="interest">INTERESTS</label>
                             	<input type="text" class="form-control"  name="interest" placeholder="INTERESTS" value=<?php echo $arr[9]; ?>>
                          </div>
                          <div class="col-md-7 text-left">
                          		<label for="dob">DATE OF BIRTH</label>
                                <input type="text" class="form-control"  name="dob" placeholder="DD/MM/YYYY" value=<?php echo $arr[10]; ?>>
                          </div>
                          <div class="col-md-7 text-left">
                          		<label for="city">CITY</label>
                                <input type="text" class="form-control"  name="city" placeholder="CITY" value=<?php echo $arr[11]; ?>>
                          </div>
                          <div class="col-md-7 text-left">
                          		<label for="phone">PHONE NUMBER</label>
                                 <input type="text" class="form-control"  name="phone" placeholder="PHONE NUMBER" value=<?php echo $arr[12]; ?>>
                          </div>
                          
                          <div class="col-md-7 text-center">
                          <br>
                           <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-center">
                          </div>	
                         </form> 
                	</div>
   			       </div><!--/panel-body-->
                </div><!--/panel-->
              	<!--/end right column-->
      	</div> 
        <div class="col-md-2 text-left" id="follows" style="display:none">
        	<div class="panel-heading" style="background-color:#555;color:#eee;">Followers</div> 
            <div class="panel-body">
            	<?php $names=$obj->count_follow1($currid); 
					$count_names=$obj->count_follow($currid);
					$k=1;
					if($count_names==0)
					{ ?>
					<h3>No one's following you</h3>
                    <?php	
					}else{
					while($arr=mysql_fetch_row($names))
					{
				?>
                	<a href="visit.php?id=<?php echo $obj->encr($arr[2]) ?>"><h4><?php echo $k++.'.'.$obj->get_name($arr[2]) ?></h4></a>
                <?php 
					if($count_names>20)
						{ ?> 
                        	<a href="#"> show all names </a>
						<?php
						break;	
						}
				}
					}?>
            </div>
        </div>
        
  	</div>
</div>
<footer>
  <div class="container">
  	<div class="row">
      <div class="col-md-12 text-right"><h5>silveruser.co.in</h5></div>
    </div>
  </div>
</footer>


	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>