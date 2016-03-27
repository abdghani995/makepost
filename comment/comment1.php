<?php 
include('../lib/connect.php');	
$obj=new connect();
$val=$obj->showall_comment();
$id=($_GET['id']);	
$id=$obj->decr($id);
$like=($_GET['lk']);	
$like=$obj->decr($like);	
$obj->update_like($id,($like)+1);
header('Location:index.php#commments');

?>