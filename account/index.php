<!--account index-->

<?php
session_start();
include('../lib/connect.php');	
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
    <style>
		#messages{
				width:170px;
				height:300px;
				padding:5px;
				border:0.45px solid;
				overflow:auto;
				background-color:#E4DADA;
				color:#CCCCCC
				}
    </style>
    	<script language="javascript" src="search.js"></script>
        <script language="javascript" src="js/min.js"></script>
        <script language="javascript" src="js/animation.js"></script>
        <script language="javascript" src="js/comment.js"></script>
        
		<script>
			function abc(val)
				{
					window.open(val);
				}
			function show_comment(val)
				{
					
					$('#cm'+val).toggle('fast');
				
				}
			function submitc(val)
				{	
					var a=$('#prcm'+val).val();
					if(a=='')
					alert("PLEASE ENTER SOMETHING");
					else
					submit_comment(a,val);
				}
		</script>
		
		<script src="js/jquery.js" type="text/javascript"></script>
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
        <script language="javascript" src="like.js"></script>
	</head>
	<body onLoad="get_data1(<?php echo $id ?>,0)">
<nav class="navbar navbar-fixed-top" >
   <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index.php" ><b>HOME</b></a>
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="glyphicon glyphicon-chevron-down"><img src="images/ico.png"></span>
      </a>
    </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">  
          <li><a href="../chat.php">CHAT</a></li>
          <li><a href="editprofile/visit.php?id=<?php echo $obj->encr($id);?>">VIEW PROFILE</a></li>
          <li><a href="../logout.php">LOGOUT</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">ABOUT</a>
          </li>
           <?php if($id==1 || $id==10) {?>
            <li class="dropdown">
            <a href="../admin/admin.php" class="dropdown-toggle" data-toggle="dropdown">ADMIN</a>
          	</li>
           <?php } ?>
        </ul>
       
        
        <ul class="nav navbar-right navbar-nav">
          <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">SEARCH</a>
            <ul class="dropdown-menu" style="padding:12px;">
                <form class="form-inline">
     				<input type="text" class="form-control pull-left" placeholder="Search people,post" onKeyUp="get_data(this.value)" style="background: #fff url(images/icn_search.png) no-repeat;
background-position: 10px 6px; text-indent: 30px;">
                    <br>
                    <div id="show_search" style="color:#000000"></div>
                     
                </form>
            </ul>
          </li>
          <li class="dropdown">
     <a href="#" class="dropdown-toggle" onclick="get_data1(<?php echo $id ?>,1)" data-toggle="dropdown"><div id="counttt" align="center"></div></a>
            <ul class="dropdown-menu" style="padding:12px; background-color:#FFFFFF">
                <?php $not=$obj->getallnot($id) ?>
                    <div id="notification" style="color:#000000">
                    </div>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    </nav><!-- /.navbar -->
<br><br><br><br><br>
<header class="masthead" >
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 id="pghead" ><a href="#" title="Scroll down for your viewing pleasure">MAKEPOST</a>
          <p class="lead" id="pg
          subhead" >THINK....POST...</p></h1>
      </div>
      <div class="col-md-6">
        <div class="well pull-right">
           <img src="images/Untitled.png" height="50" width="50">   
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Begin Body #side bar-->
<div class="container" >
	<div class="no-gutter row">
      		<div class="col-md-3">
              <div class="panel" id="midCol">
                <div class="panel-heading" style="background-color:#555;color:#eee;">HELLO <?php echo $name ?></div> 
                <div class="panel-body">
                  
                  
                  <div class="well">
                           <div id="pic"><?php if(($pic=='0')){ ?> <img src="../../uploads/u.gif" width="219" height="245"> <?php } else{?>
									<img src="<?php echo $pic ?>" width="229" height="245">
									<?php } ?>
								</div>
	  							<div id="change">
                                <br>
                                &nbsp
                                <a href="../ppic/index.php"><input name="button" type="button" value="CHANGE" class="btn btn-default"/></a>
                                
                                <a href="../ppic/remove.php"><input name="button" type="button" value="REMOVE" class="btn btn-default"/></a>
                                </div> 
                  </div>
                  
                  <hr>
                  <h5><a href="../"><i class="glyphicon glyphicon-user"></i> HOME</a></h5>
                  <h5><a href="create_post"><i class="glyphicon glyphicon-user"></i> CREATE NEW POST</a></h5>
                  <h5><a href="editprofile"><i class="glyphicon glyphicon-user"></i> EDIT PROFILE</a></h5>
                  <h5><a href="../cp/cp.php"><i class="glyphicon glyphicon-user"></i> CHANGE PASSWORD</a></h5>
                  <hr> 
                  
                  
               </div> 
               </div><!--/panel-->
      		</div><!--/end mid column-->
      		<!-- right content column-->
            
            
       			
      		<div class="col-md-6 text-center" id="content">
            	<div class="panel">
    			<div class="panel-heading" style="background-color:#111;color:#fff;">RECENT POSTS</div>   
              	<div class="panel-body">
                  
                  <div class="row">
                  
                  		<?php for($i=0;$i<$ros;$i++){
						$arr=mysql_fetch_row($posts);
						?>
                 
                        <div class="col-md-12 text-center">
                        <div id="lk1(?php echo $arr[0] ?)"></div>
                          <?php $vall=$obj->get_pic($arr[8]); 
						  $naam=$obj->get_name($arr[8]);
						  	if(strcmp($vall,'0')==0)
								$src="../../uploads/u.gif";
							else
								$src=$vall;
						  ?>
<h5><a href="editprofile/visit.php?id=<?php echo $obj->encr($arr[8]) ?>"><img src="<?php echo $src ?>" height="40px" width="40px">&nbsp&nbsp&nbsp<span><?php echo $naam;?></a>
								 posted
                                <?php for($k=0;$k<1;$k++){ ?>&nbsp<?php }?>
                                <?php if(isset($arr[7])){echo $arr[7];}?>
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                <?php if($arr[8]==$id || $id==1) {?>
                  <a href="delpost.php?pid=<?php echo $obj->encr($arr[0])?>"><img title="delete" src="images/T_Delete_Lg_D.png"></a>
                                <?php }?></h5>
     </span>
                            	<h3><?php echo $arr[2]?></h3>
                                <!--image-->
                                
								<?php 
								$k=mysql_num_rows(($obj->getallimage1($arr[0])));
								$imgg=$obj->getallimage1($arr[0]);
								while($putimage=mysql_fetch_row($imgg)){
		
									$putimage=substr($putimage[0],3,strlen($putimage[0]));
								?>
                                	<img src="<?php echo $putimage; ?>" class="img-responsive pull-left" style="max-height:1000px" id="img<?php echo $arr[0] ?>" onClick="animatee(<?php echo $arr[0] ?>)" title="click on image to enlarge">
                                <?php break;}echo '<br><br>' ?>
                                <?php $file_count=mysql_num_rows($obj->getallfile1($arr[0]));
								if($file_count>0){
								?>
                                <h5><u>Related Files</u>:</h5>
                                <?php } ?>
                               	<?php 
								$files=$obj->getallfile1($arr[0]);
								while($filepost=mysql_fetch_row($files)){
									$filesrc=substr($filepost[0],3,strlen($filepost[0]));
								?>
                              <a href="#lk1<?php echo $arr[0] ?>" onClick="abc('<?php echo $filesrc ?>')"  style="font-size:14px;color:#6628CB"><?php echo $filepost[1] ?></a><br>
                                <?php } ?>
                                
                                <br><br>
                                <?php $string = strip_tags($arr[3]);
								if (strlen($string)>400) {
									$x=$obj->encr($arr[0]);
									$stringCut = substr($string, 0, 400);
									$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href='."seemore.php?pid=$x".'>Read More</a>'; 
								}?>
                                <p ><?php echo $string?></p>
   <div id="lk<?php echo $arr[0]?>">
  <a 		href="#lk1<?php echo $arr[0] ?>"
  			onClick="lkcount(<?php echo $arr[0] ?>)" 
  			title="<?php
              $nacount=$obj->getlike_name($arr[0]);
              $nacount=mysql_num_rows($nacount);
              $namelist=$obj->getlike_name($arr[0]);
			  if($nacount==0)
				{
					echo "be the first one to like";
				}
			else{
                for($j=0;$j<$nacount;$j++)
				{
					$nn=mysql_fetch_row($namelist);
					echo $obj->get_name($nn[0]);
					echo ("\n");
				}
				}
              ?>"
    ><button class="btn btn-default">like(<?php echo ($obj->like_count1($arr[0]));?>)</button></a>&nbsp&nbsp
    <button class="btn btn-default" onClick="show_comment(<?php echo $arr[0] ?>)">        
    comment(<?php echo $arr[6] ?>) </button> </div>
    <br><br><?php if($k>1){ ?>
    				<h5><a href="seemore.php?pid=<?php echo $obj->encr($arr[0]) ?>">click here to see all images of this post</a></h5>
    								<?php }?>
                         
                                 <br>
    </button>
    	
        <div style="display:none" id="cm<?php echo $arr[0] ?>" class="well">
        		<div id="pacm<?php echo $arr[0] ?>" class="well">
                <?php 
					$counter1=(mysql_num_rows($obj->get_postcomments($arr[0])));
					if($counter1>5){
				?>
                <h5>viewing top 5 comments.<a href="seemore.php?pid=<?php echo $obj->encr($arr[0]) ?>">see all comments</a></h5>
                <?php }?>
				<?php $comments=$obj->get_postcomments($arr[0]);
					if($counter1>5)
						{
							for($j=0;$j<$counter1-5;$j++)
								mysql_fetch_row($comments);
						}
						while($comment=mysql_fetch_row($comments)){
							
				 ?>	
          <a href="editprofile/visit.php?id=<?php echo $obj->encr($comment[3]) ?>"><h3><img src="<?php echo $obj->get_pic($comment[3]) ?>" width="30px" height="30px">&nbsp&nbsp<span><?php echo $obj->get_name($comment[3]) ?></a>:</h3>
          <p"><?php for($x=1;$x<=strlen($comment[2]);$x++){
		  				echo $comment[2][$x-1];
						if($x%55==0)
							echo "<br>";
					} ?></p>
                    <hr width="50%" style="opacity:0.1">
                 <?php } ?>
                 
                 	<img src="<?php echo $obj->get_pic($id) ?>" width="40px" height="40px">&nbsp&nbsp
                    <input type="text" id="prcm<?php echo $arr[0]?>" placeholder="comment" >
                    <input type="button" class="btn btn-default" onClick="submitc(<?php echo $arr[0]?>);" value="comment" >	</div>
                    
        	</div>	
        <hr >
    		
                          </div>
              	     
                         <?php  } ?>
                		</div>           	
                  </div><!--/panel-body-->
                </div><!--/panel-->
              	<!--/end right column-->
      	</div> 
        <div class="col-md-3 text-center">
              <div class="panel" id="midCol">
                <div class="panel-heading" style="background-color:#555;color:#eee;">Trending Now</div> 
                <div class="panel-body" id="t_now">
        			<?php $trend=$obj->get_trending_like(); 
						$arr=mysql_fetch_row($trend);
						$check_trend_similarity=$arr[0];
						$string = strip_tags($arr[3]);
								if (strlen($string)>400) {
									$x=$obj->encr($arr[0]);
									$stringCut = substr($string, 0, 400);
									$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href='."seemore.php?pid=$x".'>Read More</a>';}
					?>
                    	<h4><?php echo $arr[2] ?></h4>
                        <h5><?php echo $string ?></h5>
                <hr>
        			<?php $trend=$obj->get_trending_comment(); 
						$arr=mysql_fetch_row($trend);
						if($arr[0]!=$check_trend_similarity){
						$string = strip_tags($arr[3]);
								if (strlen($string)>400) {
									$x=$obj->encr($arr[0]);
									$stringCut = substr($string, 0, 400);
									$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href='."seemore.php?pid=$x".'>Read More</a>';}
					?>
                    	<h4><?php echo $arr[2] ?></h4>
                        <h5><?php echo $string ?></h5>
                     <?php } ?>
                </div> 
              </div><!--/panel-->
      		</div><!--/end mid column-->
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