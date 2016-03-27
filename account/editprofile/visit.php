<?php
session_start();
$currid=$_SESSION['id'];
include('../../lib/connect.php');	
	$obj=new connect();
if(isset($_GET['id']))
			{
			$id=$_GET['id'];
			$id=$obj->decr($id);
			$pic=$obj->get_ppic($id);
			$val=$obj->display_all11($id);
			$arr=mysql_fetch_row($val);
			$name=$arr[1];
			$post=$obj->mypostt($id);
			$ver=$obj->verify($currid);
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
                  <h5><a href="../my_post/mypost.php"><i class="glyphicon glyphicon-user"></i> MY POSTS</a></h5>
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
                  
                  
                          <div class="col-md-7">
                             <h2>ABOUT <?php echo $name ?>:  </h2><h4 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif"><?php echo $arr[8]; ?></h4>
                          </div>
                          <div class="col-md-7">
                          <h2>INTRESTS:  </h2><h3 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif"><?php echo $arr[9]; ?></h3>
                          </div>
                          <div class="col-md-7">
                           <h2>BORN ON :</h2>  <h3><?php echo $arr[10]; ?></h3>
                          </div>
                          <div class="col-md-7">
                          <h2>PHONE NUMBER : </h2> <h3 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif"><?php echo $arr[12]; ?></h3>
                          </div>
                          <div class="col-md-7">
                          <h2>EMAIL :</h2><h3 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif"><?php echo $arr[2];?><span>
							<?php if($currid==$id){ if($ver==0){?>
                                <a href="verify.php" onClick="email_verification()">verify</a>
                            <?php }else{?>
                                <a >verified</a>
                            <?php }}?></h3>
                          </div>	 
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
        <div class="col-md-12 text-center" id="content">
            	<div class="panel">
    			<div class="panel-heading" style="background-color:#111;color:#fff;">
                <?php if($currid==$id){ ?>
                	YOUR POSTS
                <?php }else{ ?>
                	POSTS OF <?php echo $obj->get_name($id) ?> 
                <?php } ?>
                </div>   
              	<div class="panel-body">
                  
                  	<div class="row">
                  
                  	     <?php while($arr=mysql_fetch_row($post)){ ?>
                	<div class="col-md-12 text-center">
                    	<a href="../seemore.php?pid=<?php echo $obj->encr($arr[0]) ?>" style="text-decoration:none"><h3><u><?php echo $arr[2]; ?></u></h3></a>
                        <?php $string = strip_tags($arr[3]);
								if (strlen($string)>500) {
									$x=$obj->encr($arr[0]);
									$stringCut = substr($string, 0, 500);
									$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href='."../seemore.php?pid=$x".'>Read More</a>'; 
								}?>
                                <p ><?php echo $string?></p>
           				
                    	<h3>
							<?php echo $arr[4]; ?><img src="images/fb-like-icon-small.png">
                            &nbsp&nbsp&nbsp&nbsp
                            <?php echo $arr[6]; ?><img src="images/120px-WMF-Agora-Reply-000000.svg.png">
                        </h3>
                        <hr>
                        </h3>
                	</div>
                    <hr>
                <?php } ?> 	 
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