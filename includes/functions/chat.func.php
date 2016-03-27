<?php 
	function get_msg()
	{
	$query="select Sender,Message from chat order by Msg_id desc";
	$run=mysql_query($query);
	$messages=array();
	while($message=mysql_fetch_assoc($run))
		{
			$messages[]=array('sender'=>$message['Sender'],     
							 'message'=>$message['Message']);
		}
		return $messages;
	}
	
	
	function send_msg($sender,$message)
	{
		if(!empty($sender) &&!empty($message)){
			
			$sender= mysql_real_escape_string($sender);
			$message= mysql_real_escape_string($message);
			$query="insert into chat values (null,'$sender','$message')";
				if($run=mysql_query($query))
						{
							return true;
						}
				else
						{
							return false;
						}
			
		}else{
			return false;
		}
		
	}
?>