<?php 
include('../lib/connect.php');	
$name=($_POST['name']);
$comment=($_POST['comment']);
$obj=new connect();
$id=($_GET['id']);
$id=$obj->decr($id);
$obj->insert_reply($id,$name,$comment);
$id=$obj->encr($id);
header('Location:reply.php?id='.$id);
?>