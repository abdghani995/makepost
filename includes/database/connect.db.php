<?php
$host_name='182.50.133.84:3306';
$username='chat';
$password='qwerty123';
$dbname='chat';
$con=@mysql_connect($host_name,$username,$password) or die ('unable to connect to the server');
mysql_select_db($dbname,$con) or die('unable to connect to  the database'); 
function login_check_name($name)
			{
				$query="select login from info where name='$name'";
				$val=@mysql_query($query) ;
				$val1=mysql_fetch_row($val);
				echo $val1[0];
			}
function display_all1()
				{	
					
					$query="select Msg_id,Sender,Message from chat";
					$val=mysql_query($query) or die(mysql_error());
					return $val;
				}
function deletee($id)
				{
					$query="delete from chat where Msg_id='$id'";
					
					$val=mysql_query($query) or die(mysql_error());
					
					return $val; 
				}
	function encr($id)
{
	$len=strlen($id);
		$rev=strrev($id);
		$val=time().rand(100,999);
		//echo $id;
		for($i=0;$i<$len;$i++)
			{	
				 $val.=rand(0,9);
				 $val.=substr($rev,$i,1);
				 $val.=chr(rand(65,96));
								
			}
		$val.=chr(rand(65,96)).rand(10000,99999).chr(rand(65,96)).chr(rand(65,96)).rand(0,9).$len.rand(10,99).rand(10000,99999);
		return $val;
}

function decr($id)
	{
		
		$val='';
		echo '<br>';
		$len=substr($id,-8,-7);
		for($i=14;$i<12+(3*$len);$i=$i+3)
			{
				$val.=substr($id,$i,1);
			}
		$val1=strrev($val);
		return $val1;
	}
?>