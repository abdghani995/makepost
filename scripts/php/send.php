<?php
include('../../lib/connect.php');	
$obj=new connect();
$stat=$_GET['stat'];

if($stat==1)
{
$name=$_GET['name'];
}
		
			
			
include('../../includes/database/connect.db.php');
include('../../includes/functions/chat.func.php');
		if(isset($name)&&!empty($name) && $stat==1)
		{	
			
			$sender=$name;
				if(isset($_GET['message'])&&!empty($_GET['message']))
				{
				$message=$_GET['message'];
				
					if(send_msg($sender,$message))
						{
								echo 'Message sent'.$stat;
						}
					else
						{
						echo 'THE MESSAGE WASNT SENT';
						}
				}
				else
				{
				echo 'No Message was entered';
				}
		}else
		{
			echo 'No Name Was Entered'.$stat;
		}
?>