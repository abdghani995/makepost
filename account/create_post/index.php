<!--create post-->
<?php
session_start();
include('../../lib/connect.php');	
	$obj=new connect();
if($_SESSION['id'])
			{
			$id=$_SESSION['id'];
			$name=$obj->get_name($id);
			$username=$obj->getusername($id);
			$vvv=$obj->createtable($username);
			$pic=$obj->get_ppic($id);
			}
else{
	header('Location:../');
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <link href="style/style.css" rel="stylesheet" type="text/css" />
    <script language="javascript" src="image.js"></script>
     
    <script language="javascript" type="text/javascript">
	<!--
	function startUpload(){
		  document.getElementById('f1_upload_process').style.visibility = 'visible';
		  document.getElementById('f1_upload_form').style.visibility = 'hidden';
		  return true;
	}
	
	function uploadChange()
	{
        $('input[name="submitBtn"]').click();
    }
	function uploadcall()
	{
        $('input[name="myfile"]').click();
    }
	function stopUpload(success){
		  var result = '';
		  if (success == 1){
			 showimage();
		  }
		   if (success == 11){
			 showfile();
		  }
		  else if(success==0) {
			 alert("There was an error during file upload!");
		  }
		  else if(success==3) {
			 alert("UPLOAD WITHIN LIMIT \nMAX image size is 2mb \n Max file size is 10mb");
		  }
		  else if(success==2) {
			 alert("INVALID FORMAT \n IMAGE: .jpg .bmp .png \n FILES : .pdf .doc .txt .csv");
		  }
		  document.getElementById('f1_upload_process').style.visibility = 'hidden';
		  document.getElementById('f1_upload_form').innerHTML = '<label>File: <input name="myfile" type="file" size="30" style="visibility:hidden" onChange="uploadChange()"/><\/label><label><input type="submit" name="submitBtn" class="sbtn" value="Upload" style="visibility:hidden"/><\/label>';
		  
		  return true; 
	}
	//-->
		function loader()
		{
			showimage();
	
		}
		function makebold()
		{
			var a=document.getElementById("content1").style.fontStyle;
			if(a!="italic")
				document.getElementById("content1").style.fontStyle="italic";
			else
				document.getElementById("content1").style.fontStyle="normal";
			
		}
		
		
</script>   


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
	<body onLoad="loader()">
<nav class="navbar navbar-fixed-top">
   <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index.php?id=<?php echo ($obj->encr($id)); ?>" ><b>HOME</b></a>
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
       <span class="glyphicon glyphicon-chevron-down"><img src="../images/ico.png"></span>
      </a>
    </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">  
          <li><a href="#">CHAT</a></li>
          <li><a href="../../logout.php">LOGOUT</a></li>
          
        </ul>
   
      </div>
    </div>
</nav><!-- /.navbar -->
<br><br><br><br><br>
<header class="masthead">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1><a href="#" title="Scroll down for your viewing pleasure"> MAKEPOST</a>
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
      		<div class="col-md-12 text-center" id="content">
            	<div class="panel">
    			<div class="panel-heading" style="background-color:#111;color:#fff;">CREATE POST</div>   
              	<div class="panel-body">
                <div class="col-md-3">
                  <div class="well">
                           <div id="pic"><?php if(($pic=='0')){ ?> <img src="../../../uploads/u.gif" width="219" height="245"> <?php } else{?>
									<img src="../<?php echo $pic ?>" width="229" height="245">
									<?php } ?>
								</div>
	  							<div id="change">
                                <br>
                                &nbsp
                                <a href="../../ppic/index.php"><input name="button" type="button" value="CHANGE" class="btn btn-default"/></a>
                                
                                <a href="../../ppic/remove.php"><input name="button" type="button" value="REMOVE" class="btn btn-default"/></a>
                                </div> 
                  </div>
                  <hr>
                            
                  <h5><a href="../"><i class="glyphicon glyphicon-user"></i> HOME</a></h5>
                  <h5><a href="../create_post"><i class="glyphicon glyphicon-user"></i> CREATE NEW POST</a></h5>
                  <h5><a href="../editprofile"><i class="glyphicon glyphicon-user"></i> EDIT PROFILE</a></h5>
                  <h5><a href="../../cp/cp.php"><i class="glyphicon glyphicon-user"></i> CHANGE PASSWORD</a></h5>
                
                  <hr> 
                </div>
                  <div class="row">
                  <div class="col-md-8 text-center">
                  <div id="images"></div>
      			  <div id="files"></div>
           
                  <form action="upload.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
                     <p id="f1_upload_process">Loading...<br/><img src="loader.gif" /><br/></p>
                     <p id="f1_upload_form" align="center"><br/>
                         <input name="myfile" type="file" size="30" onChange="uploadChange()" style="visibility:hidden"/>
                         <input type="submit" name="submitBtn" class="sbtn" value="Upload" style="visibility:hidden"/>
                      </p>
                  	
                     
                     <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                 	</form>
            
         
                       	<form id="f1" action="createpost.php" method="post" class="col-md-13 text-center">
                        	<table width="100%" class="col-md-18 text-center"  cellpadding="10" cellspacing="0" rules="none" frame="void" >
                              
                               <tr>
                                  <td >&nbsp;</td>
                                </tr>
                               
                                <tr>
                                  <td class="col-md-7 text-center" colspan="2"><input type="text" placeholder="HEADING" align="middle" size="%" name="head" required   style="border-radius:10px;height:50px;font-size:30px">
                                  </td>
                                </tr>
                                <tr>
                                  <td >&nbsp;</td>
                                </tr>
                                <tr>
                                  <td ><!--<input type="button" value="B" onclick="makebold()">--></td>
                                </tr>
                                
                                <tr>
                                  <td colspan="2" height="300px"><textarea class="col-md-10 text-center" name="post" form="f1" rows="12" name="comment"  placeholder="CONTENT" required style="resize: none; overflow-y: scroll; border-radius:20px;font-size:25px;" id="content1" ></textarea>
                                  </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                	<td><img src="images/1444439875_icon-98-folder-upload.png" onClick="uploadcall()" title="upload an image or a file" height="20px" width="20px">&nbsp
                                    <img src="images/link.png" value="l" id="link">
                                    </td>
                                </tr>
                                
                                <tr>  
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td colspan="2"><input type="submit" value="POST" style="border-radius:10px;width:100px"></td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                                
                          
							</table>
							<input type="hidden" name="name" value="<?php echo $name;?>">
                        </form>
                        <div id="linkpart" style="display:none" class="well">
                                	
                                    TEXT:<input type="text" placeholder="enter the text you want" name="url_text" required>
                                    URL: <input type="url" placeholder="enter the URL " name="url" required>
                                    <input type="button" value="OK" class="btn btn-default" id="link_submit">
                                    <input type="button" value="CANCEL" class="btn btn-default" id="link1">
                                    
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