

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>comment</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/stylish-portfolio.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
		#commments{
		position:absolute;
		left:-200px;
		width:800px;
		background-color:#FBF7F7;
		}
</style>

</head>
<body>

  <div id="templatemo_header">
    
   	<div id="site_logo"></div>
        
		<div id="templatemo_menu">
      		<div id="templatemo_menu_left"></div>
            <h1>COMMENTS</h1>   	
		</div>
    
    </div> 
</div> 



<div id="templatemo_content_wrapper" >
	<div id="templatemo_content">
    
    	<div id="column_w530">
        	
           
   <a href="../index.php?id=<?php echo $id; ?>" style="text-decoration:none ;color:#764CC4"><h1 ><img src="images/Custom-Icon-Design-Mono-General-1-Back.bmp">HOME</h1></a>        
<div class="col-lg-10 col-lg-offset-1 text-center">      
       <table id="commments"  border="5px">
           <tr>
           		<td align="center" width="500px"><h2>NAME</h2></td><td width="50px"></td>
                <td align="center" width="1000px"><h2>COMMENTS</h2></td><td></td>
                <td align="center"><h2>REPLIES</h2></td><td></td><td></td>
                <td align="center"><h2>LIKESS</h2></td><td></td><td></td>
                <td align="center"><h2>DISLIKE</h2></td><td></td><td></td>
           </tr>
           <?php 
include('../lib/connect.php');	
$obj=new connect();
$val=$obj->showall_comment();
$rows=mysql_num_rows($val);
$val=$obj->showall_comment();
for($i=0;$i<$rows;$i++)
	{ $arr=mysql_fetch_row($val);
	?>
     <tr>
           		<td><h3><?php echo $arr[1] ?></h3></td><td></td>
 <td ><h3><?php echo $arr[3] ?></h3></td><td></td>
 
 
 				<td align="center" width="100px"><a href="reply.php?id=<?php echo $obj->encr($arr[0]); ?>" style="text-decoration:none;" ><h3><?php echo $arr[6];?><span><img src="images/120px-WMF-Agora-Reply-000000.svg.png"></span></h3></a></td><td></td><td></td>
                
                
                
                <td align="center" width="100px"><a href="comment1.php?id=<?php echo $obj->encr($arr[0]);?>&lk=<?php echo $obj->encr($arr[4]);?>"style="text-decoration:none;"><h3><?php echo $arr[4] ?><img src="images/fb-like-icon-small.png"></h3></a></h3></td><td></td><td></td>
                
                
                
                <td align="center" width="100px"><a href="comment2.php?id=<?php echo $obj->encr($arr[0]);?>&lk=<?php echo $obj->encr($arr[5]);?>"style="text-decoration:none;"><h3><?php echo $arr[5] ?><img src="images/dislike_icon.png"></h3></a></h3></td><td></td><td></td>
                
                
     </tr>
	
<?php
}
?> 
          
   <table>             
              
  </div> 
  <?php for($i=0;$i<10;$i++){?>
  		<br>
  <?php } ?>    
    </div>
  
  
</div>
 
</body>

</html>