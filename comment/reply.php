<?php
include('../lib/connect.php');	
$obj=new connect();
$id=($_GET['id']);
$id=$obj->decr($id);
$comment_Stat=$obj->get_comment($id);	
$res=$obj->showall_reply($id);
$rows=mysql_num_rows($res);
$val=$obj->showall_reply($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/stylish-portfolio.css" rel="stylesheet">
 <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>comment</title>
<meta name="keywords" content="free templates, website templates, CSS, XHTML" />
<meta name="description" content="Simple Gray - Professional free XHTML/CSS template provided by templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<style>
	
	
	
	#goback{
	position: absolute;
	width: 271px;
	left: 85px;
	top: 376px;
	}
</style>
</head>
<body>
 <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Replies of : <?php echo $comment_Stat; ?></h2>
                   
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

        
		<div id="templatemo_menu">
      		<div id="templatemo_menu_left"></div>
            <a href="index.php" style="text-decoration:none"><h1><img src="images/Custom-Icon-Design-Mono-General-1-Back.bmp">BACK</h1></a>   	
		</div>      
<div id="replies"  class="col-lg-10 col-lg-offset-1 text-center">
	<table width="683" height="50" border="5" align="center">
  <tbody>
    <tr>
      <td height="52" align="center"> REPLIES </td>
    </tr>
  	<?php if($rows==0){?>
    		<td><h4>No one commented yet. Be the first one to comment</h4></td> 
    <?php } ?>
    <?php for($i=0;$i<$rows;$i++){
		$arr=mysql_fetch_row($val);
		?>
    <tr>
    	<td><h3><?php echo $arr[1];?>&nbsp replied &nbsp<?php echo $arr[2];?></h3></td>   
    </tr>
   	<?php }?> 
  </tbody> 
</table>

<form id="f1" action="reply1.php?id=<?php echo $obj->encr($id)?>" method="post" >
  <table width="200" border="1px" cellpadding="10" cellspacing="0"  align="center" frame="void" rules="none">
                              
                             <tr><h2 align="center">REPLY NOW</h2></tr><tr></tr>
                                <tr height="20px">
                                  <td align="right"><input type="text" placeholder="NAME" align="middle" size="30px" name="name" required style="height:30px;font-size:24px"></td>
                                </tr>
                            <tr height="30px"></tr>
                                
                                <tr>
                                  <td height="200px" align="right"><textarea name="comment" form="f1" rows="10" name="comment" cols="50px" placeholder="COMMENT" required  style="resize: none; overflow-y: scroll; " ></textarea></td>
                                </tr>
                                <tr height="10px"></tr><tr height="20px"></tr>
                                <tr>
                                  <td align="center"><input type="submit" value="REPLY"></td>
                                </tr>
                               
	</table>
							
  </form>
</div>
 <?php for($i=0;$i<10;$i++){?>
  		<br>
  <?php } ?> 
 <footer>
        <div class="container">
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
                        
                    </ul>
                  <p class="text-muted">Copyright &copy;silveruser.co.in</p>
            
        </div>
    </footer>

</body>
</html>