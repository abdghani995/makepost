<?php
session_start();
include('../lib/connect.php');	
	$obj=new connect();
if($_SESSION['id'])
			{
				if(isset($_GET['pid'])==0)
				{
					header('Location:index.php');
				}
			$id=$_SESSION['id'];
			$name=$obj->get_name($id);
			$pid=$_GET['pid'];
			$pid=$obj->decr($pid);
			$v=$obj->getpost_details($pid);
			$arr=mysql_fetch_row($v);
			$pic=$obj->get_ppic($id);
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
					submit_comment(a,val);
				}
	</script>
    <script language="javascript" src="js/comment.js"></script>
    <script language="javascript" src="search.js"></script>
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
      <a class="navbar-brand" href="index.php" ><b>HOME</b></a>
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="glyphicon glyphicon-chevron-down"><img src="images/ico.png"></span>
      </a>
    </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">  
          <li><a href="../chat.php">CHAT</a></li>
          <li><a href="editprofile/visit.php?id=<?php echo $obj->encr($id);?>">VIEWPROFILE</a></li>
          <li><a href="../logout.php">LOGOUT</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">ABOUT</a>
            
          </li>
        </ul>
       
        
        <ul class="nav navbar-right navbar-nav">
          <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">SEARCH</a>
            <ul class="dropdown-menu" style="padding:12px;">
                <form class="form-inline">
     				<input type="text" class="form-control pull-left" placeholder="Search people,post" onKeyUp="get_data(this.value)">
                    <br>
                    <div id="show_search" style="color:#000000"></div>
                     
                </form>
            </ul>
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
                  <h5><a href="my_post/mypost.php"><i class="glyphicon glyphicon-user"></i> MY POSTS</a></h5>
                  <h5><a href="editprofile"><i class="glyphicon glyphicon-user"></i> EDIT PROFILE</a></h5>
                  <h5><a href="cp/cp.php"><i class="glyphicon glyphicon-user"></i> CHANGE PASSWORD</a></h5>
                
                  <hr> 
                  
                  
               </div> 
               </div><!--/panel-->
      		</div><!--/end mid column-->
      		
			
			
			
      		<!-- right content column-->
      		<div class="col-md-7 text-center" id="content">
            	<div class="panel">
    			<div class="panel-heading" style="background-color:#111;color:#fff;">POST</div>   
              	<div class="panel-body">
                  
                  <div class="row">
                  
                  
                         <div class="col-md-10 text-center">
                          <?php $vall=$obj->get_pic($arr[8]); 
						  $naam=$obj->get_name($arr[8]);
						  	if(strcmp($vall,'0')==0)
								$src="../../uploads/u.gif";
							else
								$src=$vall;
						  ?>
<a href="editprofile/visit.php?id=<?php echo $obj->encr($arr[8]) ?>"><img src="<?php echo $src ?>" height="40px" width="40px"><span><h5><?php echo $naam;?></a> posted
                                <?php for($k=0;$k<1;$k++){ ?>&nbsp<?php }?>
                                <?php if(isset($arr[7])){echo $arr[7];}?>
                                </h5></span>
                            	<h3><?php echo $arr[2]?></h3>
                                <?php 
								$imgg=$obj->getallimage1($arr[0]);
								while($putimage=mysql_fetch_row($imgg)){
									$putimage=substr($putimage[0],3,strlen($putimage[0]));
								?>
                                	<a href="<?php echo $putimage ?>"><img src="<?php echo $putimage; ?>" height="350px" width="100%"></a>
                                <?php } ?>
                                <?php 
								$files=$obj->getallfile1($arr[0]);
								while($filepost=mysql_fetch_row($files)){
									$filesrc=substr($filepost[0],3,strlen($filepost[0]));
								?>
                                	<a href="<?php echo $filesrc ?>" style="font-size:14px;color:#6628CB"><?php echo $filepost[1] ?></a><br>
                                <?php } ?>
                                <br><br>
                                <p ><?php echo $arr[3]?></p>
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
    	
        <div style="display:none" id="cm<?php echo $arr[0] ?>" class="well" style="background-color:#000000">
        		<div id="pacm<?php echo $arr[0] ?>">
				<?php $comments=$obj->get_postcomments($arr[0]);
						while($comment=mysql_fetch_row($comments)){
				 ?>	
          <h3><img src="<?php echo $obj->get_pic($comment[3]) ?>" width="40px" height="40px">&nbsp&nbsp<span><?php echo $obj->get_name($comment[3]) ?></span></h3>
                    <h5>
					<?php 
					for($x=1;$x<=strlen($comment[2]);$x++){
		  				echo $comment[2][$x-1];
						if($x%55==0)
							echo "<br>";
					}
					?>
                    </h5>
                    <hr width="50%" style="opacity:0.1">
                 <?php } ?>
                 
                 	<img src="<?php echo $obj->get_pic($id) ?>" width="40px" height="40px">&nbsp&nbsp
                    <input type="text" id="prcm<?php echo $arr[0]?>" placeholder="comment" size="50px" >
                    <input type="button" class="btn btn-default" onClick="submitc(<?php echo $arr[0]?>);" value="comment" >	</div>
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