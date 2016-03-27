<?php 
session_start();
$id=$_SESSION['id'];
include('../../lib/connect.php');	
$obj=new connect();
$email=$obj->get_email($id);
$from="email_verification@silveruser.co.in";
$subject="email verification for makepost";
$message="www.silveruser.co.in/verification.php?id=".$obj->encr($id);					
mail($email,$subject,$message,"From:".$from);
header('Location:visit.php?id='.$obj->encr($id));
?>