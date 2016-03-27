<!-- main index-->

<?php
session_start();
$polled=0;
$com=0;$val=0;
include('lib/connect.php');	
	$obj=new connect();
$c=$obj->count_update();

if(isset($_SESSION['id']))
			{
			$id=$_SESSION['id'];
			$name=$obj->get_name($id);
			$em=$obj->get_email($id);
			}

if(isset($_GET['polled'])){
	$polled=$_GET['polled'];
	$ress=$obj->check_question($_GET['question']);
	$yes=$ress[2];
	$no=$ress[3];
	}
if(isset($_GET['comm']))
	{
		$com=$_GET['comm'];
		$com=$obj->decr($com);
	}

?>


<!DOCTYPE html>
<html lang="en">

<head>
<style>
	#comment{
	position: absolute;
	
	}
	#time_section{
	position: absolute;
	font-size: 18px;
	left: -150px;
	top: 560px;
	width: 200px;
	height: 70px;
	background-color:#BBF7DC;
	color:#200ADE;
	}
</style>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;
    key=ABQIAAAAcl" type="text/javascript"></script>
<script type="text/javascript">

var myVar=setInterval(function (){myTimer()}, 1000);
	function myTimer() 
	{
		var d = new Date();
		document.getElementById("tim").innerHTML = d.toLocaleTimeString();
		document.getElementById("dt").innerHTML = d.toLocaleDateString();
	}
 </script>




    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>makepost.co.in</title>

    
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/stylish-portfolio.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css"></head>

<body>

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top"  onclick = $("#menu-close").click(); >MENU</a>
            </li>
            <li>
                <a href="#top" onclick = $("#menu-close").click(); >Home</a>
            </li>
            <?php if(isset($name)) {?>
            	<li>
               <a href="account/index.php" onclick = $("#menu-close").click();>
               HELLO &nbsp<?php echo $name;?></a>
            	</li>
            <?php }else{ ?>
            <li>
                <a href="login" onclick = $("#menu-close").click(); >LOGIN</a>
            </li>
			<?php } ?>
            <li>
                <a href="#portfolio" onclick = $("#menu-close").click(); >RECENT POST</a>
            </li>
            <li>
                <a href="#poll" onclick = $("#menu-close").click(); >POLL</a>
            </li>
             <li>
                <a href="#comment" onclick = $("#menu-close").click(); >COMMENT</a>
            </li>
            <li>
                <a href="#lower_foot" onclick = $("#menu-close").click(); >PRIVACY</a>
            </li>
            <li>
                <a href="map1.php" onclick = $("#menu-close").click(); >MAP</a>
            </li>
             
        </ul>
    </nav>

    <!-- Header -->
    <header id="top1" class="header">
        <div >
              <h1 style="color:grey">MAKEPOST</h1>
        </div>
        <div class="text-vertical-center">
           <?php for ($i=0;$i<25;$i++){ ?>
           <br>
          <?php }?> 
          <a href="#about" class="btn btn-dark btn-lg">Get Fascinated</a>
        </div>
    </header>

    <!-- About -->
    <section id="about" class="about" style="background-color:#D8CACA">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                  
                    <p class="lead">Do Visit My Blog At <a href="../blog" style="text-decoration:none">silveruser blogs</a>.</p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    
   
    <!-- Portfolio -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h2>RECENT POST</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portfolio-item" >
                                <a href="docs/tor.html">
                                    <img class="img-portfolio img-responsive" src="images/original.png"  >
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                    <a href="https://www.google.co.in/imghp?hl=en&tab=wi&ei=ELq3VY3GBIG50gSt-YGYDQ&ved=0CBIQqi4oAQ" class="btn btn-dark">View More Items</a>
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    
 <?php if($polled==0)
 { 
 ?>   
    <header id="poll">
        <aside class="call-to-action bg-primary">
            
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3>POLL TIME</h3>
                        <?php $question="IS INDIA INDEPENDENT TRULY?"; ?>
                        <h3><?php echo $question;?></h3>
                        <a href='poll/yes.php?ques=<?php echo $question;?><?php if(isset($id)){echo '&id='.$obj->encr($id);} ?>' class="btn btn-lg btn-default"><img src="images/1442683101_Black_ThumbsUp.png"></a>
                        <a href='poll/no.php?ques=<?php echo $question;?><?php if(isset($id)){echo '&id='.$obj->encr($id);} ?>' class="btn btn-lg btn-default"><img src="images/1442683170_hand_contra.png"></a>
                    </div>
                </div>
            
    </header>
    <?php }else{ ?>
    	 <header id="poll">
        <aside class="call-to-action bg-primary">
            
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3>THANKS FOR VOTING</h3>
                        <?php $question="Is the End Near for Printed Books?"; ?>
                        <h3></h3>
                        <h4>RESULT</h4>
                        <br>
                        <a href='#poll' class="btn btn-lg btn-default"><?php echo $yes;?> <img src="images/1442683101_Black_ThumbsUp.png"></a>
                        <a href='#poll' class="btn btn-lg btn-default"><?php echo $no;?> <img src="images/1442683170_hand_contra.png"></a>
                    </div>
          </div>
            
    </header>
    
    <?php } ?>
    
    <?php if($com==1){$val=1; ?>
    			 <div id="comment" class="col-lg-10 col-lg-offset-1 text-center">
                 <h1>THANKS FOR COMMENTING <?php if(isset($name)){echo $name;}?></h1>
                 <a href="comment"><h2>SEE ALL COMMENTS</h2></a>
                 </div>
    <?php }else{$val=20; ?>
    
                    <div id="comment" class="col-lg-10 col-lg-offset-1 text-center">
                    	<form id="f1" action="comment/comment.php" method="post">
                        	<table width="200" border="1" class="col-lg-10 col-lg-offset-1 text-center" cellpadding="10" cellspacing="0" rules="none" frame="void">
                              <tbody>
                               <tr>
                                  <td >&nbsp;</td>
                                </tr>
                                <tr>
                                  <td ><h1>LEAVE A COMMENT</h1></td>
                                </tr>
                                <tr>
                                  <td ><input type="text" placeholder="NAME" align="middle" size="50px" name="name" required   value="<?php if(isset($name)){echo $name;}?>" <?php if(isset($name)){?> hidden="hidden" <?php }?>></td>
                                </tr>
                                <tr>
                                  <td >&nbsp;</td>
                                </tr>
                                <tr>
                                  <td><input type="email" placeholder="EMAIL" align="middle" size="50px" name="email"required   value="<?php if(isset($em)){echo $em;}?>" <?php if(isset($em)){?> hidden="hidden" <?php }?> ></td>
                                </tr>
                                <tr>
                                  <td >&nbsp;</td>
                                </tr>
                                <tr>
                                  <td height="200px"><textarea name="comment <?php if(isset($name)){?> echo $name <?php }?>" form="f1" rows="10" name="comment" cols="50px" placeholder="COMMENT" required style="resize: none; overflow-y: scroll; "></textarea></td>
                                </tr>
                                <tr>
                                  <td ><input type="submit" value="COMMENT"></td>
                                </tr>
                               <?php if(isset($id)){?> <input type="hidden" value="<?php echo $obj->encr($id);?>" name="id">
                               <?php }?>
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td><a href="comment/index.php<?php if(isset($id)){echo ('?id='.$obj->encr($id));} ?>"><h4>SEE ALL COMMENTS</h4></a></td>
                                </tr>
                              </tbody>
							</table>
							
                        </form>
                        
                    </div>
    
<?php }?>
 </aside>
<?php for($i=0;$i<$val;$i++){?>
<br>
<?php } ?>

   
<!-- Footer -->
    <footer>
        <div class="container" >
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>SILVERUSER</strong>
                    </h4>
                    <p>&nbsp;</p>
                    <ul class="list-unstyled">abdullah.ghani3@gmail.com</a>
                      </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                        <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                        <h4>TOTAL VIEWS: </h4><?php echo $c; ?>  
                        </li>
                    </ul>
                  <p class="text-muted">Copyright &copy;silveruser.co.in</p>
            
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname)  {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>
 <div id="lower_foot" class="col-lg-12 text-center" style="background-color:#136FED">
             	<div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <h4>
                                   <a href="#" style="text-decoration:none ;color:#EBDBDC"><strong>ABOUT</strong></a>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <div class="service-item">
                                
                                <h4>
                                <a href="#" style="text-decoration:none;color:#EBDBDC"><strong>PRIVACY POLICY</strong></a>
                               </h4>
							   </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <div class="service-item">
                                
                                <h4>
                                    <a href="#" style="text-decoration:none;color:#EBDBDC";><strong>GALLERY</strong></a>
                               </h4>
							   </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <div class="service-item">
                                
                                <h4>
                                    <a href="#" style="text-decoration:none;color:#EBDBDC"><strong>TERMS AND CONDITIONS </strong></a>
                               </h4>
							   </div>
                        </div>
                        
                    </div>  
 </div>


</body>

</html>
