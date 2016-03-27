<?php
		 class connect{
				private $db_name="chat";
				private $db_host='localhost';
				private $db_username='root';
				private $db_password='';
				protected $con;
				private $db;
		function __construct()
				{
					$this->con=@mysql_connect($this->db_host,$this->db_username,$this->db_password) or die ('unable to connect to the server');
						
					$this->db=mysql_select_db($this->db_name,$this->con) or die('Unable to connect to the database');									
						
				}
				
		function add_new_rec($name,$email,$username,$pass)
				{
					$query="insert into info (name,email,username,password) values ('$name','$email','$username','$pass')";
					$val=mysql_query($query);
					return $val;
				}
		function check($val)
				{	
					
					$query="select user_id, password from info where username='$val'";
					$val=@mysql_query($query) ;
					
					return $val;
				}
				
		function logged_in($id)
			{
				$query="update info set login=1 where user_id='$id'";
				$val=@mysql_query($query) ;
					
			}
		function mac_update($id)
			{
				ob_start();
				system('ipconfig /all');
				$mycom=ob_get_contents();
				ob_clean();
				$findme = "Physical";
				$pmac = strpos($mycom, $findme);
				$mac=substr($mycom,($pmac+36),17);
				$query="update info set mac='$mac' where user_id='$id'";
				$val=mysql_query($query) ;	
			}
		function get_name($id)
			{
				$query="select name from info where user_id='$id'";
					$val=@mysql_query($query) ;
					$name=mysql_fetch_row($val);
					return $name[0];
			}
		function get_email($id)
			{
				$query="select email from info where user_id='$id'";
					$val=@mysql_query($query) ;
					$name=mysql_fetch_row($val);
					return $name[0];
			}
		function logged_out($id)
			{
				$query="update info set login=0 where user_id='$id'";
					$val=@mysql_query($query) ;
				$query="update info set mac=0 where user_id='$id'";	
				$val=@mysql_query($query) ;
			}
			function login_check_name($name)
			{
				$query="select login from info where name='$name'";
				$val=@mysql_query($query) ;
				$val1=mysql_fetch_row($val);
				return $val1[0];
			}
		function login_check($id)
			{
				$query="select login from info where user_id='$id'";
				$val=@mysql_query($query) ;
				$val1=mysql_fetch_row($val);
				return $val1[0];
			}
		function login_check1($mac)
			{
				$query="select login from info where mac='$mac'";
				$val=@mysql_query($query) ;
				$val1=mysql_fetch_row($val);
				return $val1[0];
			}
		function get_id_mac($mac)
			{
				$query="select user_id from info where mac='$mac'";
				$val=@mysql_query($query) ;
				$val1=mysql_fetch_row($val);
				return $val1[0];
			}
		function username($email)
			{
			
				$query="select email from info where email='$email'";
				$val=@mysql_query($query) ;
				return $val;
			
			}
		function email_check($uname)
			{
			
				$query="select password from info where email='$uname'";
				$val=@mysql_query($query) ;
				$val1=mysql_fetch_row($val);
				return $val1[0];
			
			}
		function update_pass($uname,$np1)
			{
			
				$query="update info set password='$np1' where username='$uname'";
				$val=@mysql_query($query) ;
				return $val;
			
			}	
		function display_all()
				{	
					
					$query="select * from info";
					
					$val=mysql_query($query) or die(mysql_error());
					
					return $val;
				}
		function deletee($id){
					$query="delete from chat where Msg_id='$id'";
					
					$val=mysql_query($query) or die(mysql_error());
					
					return $val; 
				}	
		function delete($id)
				{	
					
					$query="delete from info where user_id='$id'";
					
					$val=mysql_query($query) or die(mysql_error());
					
					return $val;
				}
		function delete_post($id)
				{	
					
					$query="delete from post where p_id='$id'";
					
					$val=mysql_query($query) or die(mysql_error());
					
					return $val;
				}
		function get_data($id)
				{
					$query="select name,email,username,password from info where user_id='$id'";
					$val=mysql_query($query) or die(mysql_error());
					return $val;
				}	
		function edit($id,$name,$username,$email,$password)
				{
					$query="update info set name='$name',username='$username',email='$email',password='$password' where user_id='$id'";
					$val=mysql_query($query) or die(mysql_error());
					return $val;
				}
		
	function get_ppic($id)
		{
			$query="select Pic from info where user_id='$id'";
					$val=mysql_query($query) or die(mysql_error());
					$val1=mysql_fetch_row($val);
					return $val1[0];
		}
	function change_pic($dest,$id)
		{
					$query="update info set Pic='$dest' where user_id='$id'";
					$val=mysql_query($query) or die(mysql_error());
					//$val1=mysql_fetch_row($val);
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

function randomgen()
{
	$val=chr(rand(65,90)).chr(rand(97,122)).(rand(1,100)).chr(rand(65,90)).chr(rand(65,90)).chr(rand(97,122));
	return $val;
}

function check_question($q)
{
	$query="select * from poll where question='$q'";
					$val=mysql_query($query) or die(mysql_error());
					$val1=mysql_fetch_row($val);
					return $val1;
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


function yespoll($q,$val)
			{
				$query="update poll set yes='$val' where question='$q'";
				$val=@mysql_query($query) ;			
			}
function nopoll($q,$val)
			{
				$query="update poll set no='$val' where question='$q'";
				$val=@mysql_query($query) ;			
			}
function insert_question($question)
			{
				$query="insert into poll (question,yes,no) values ('$question','1','0')";
					$val=mysql_query($query);
			}
function insert_question_1($question)
			{
				$query="insert into poll (question,yes,no) values ('$question','0','1')";
					$val=mysql_query($query);
			}
function insert_comment($name,$email,$comment)			
		{
				$query="insert into comment (name,email,comment) values ('$name','$email','$comment')";
					$val=mysql_query($query);
					return $val;
		}
		
function showall_comment()
	{
		$query="select * from comment";
		$val=mysql_query($query);
		return $val;
	}
function update_like($id,$val)
	{	
		$query="update comment set clike='$val' where c_id='$id'";
				$val=@mysql_query($query) ;		
		
	}
function update_dlike($id,$val)
	{	
		$query="update comment set dlike='$val' where c_id='$id'";
				$val=@mysql_query($query) ;		
		
	}
		
function count_update()		
	{
		$v=time();
		$query="insert into count (time) values ('$v')";	
		$val=mysql_query($query);
		$query="select * from count";
		$val=mysql_query($query);
		$c=mysql_num_rows($val);
		return $c;
	}
		
function get_comment($id)		
	{
		$query="select * from comment where c_id='$id'";
		$val=mysql_query($query);
		$arr=mysql_fetch_row($val);
		return $arr[3];	
	}
function showall_reply($id)
	{
		$query="select * from reply where c_id='$id'";
		$val=mysql_query($query);
		return $val;
	}	
function insert_reply($id,$name,$comment)			
		{
				$query="insert into reply (c_id,name,reply) values ('$id','$name','$comment')";
					$val=mysql_query($query);
				$query="select * from reply where c_id='$id'";
					$val=mysql_query($query);
					$arr=mysql_num_rows($val);
				$query="update comment set reply='$arr' where c_id='$id'";
					$val=mysql_query($query);
		}
function add_new_postt($id,$name,$head,$post,$t)
				{
					$query="insert into post (user_id,name,head,post,postime) values ('$id','$name','$head','$post','$t')";
					$val=mysql_query($query);
					return $val;
				}	
function get_all_posts(){
				$query="SELECT * FROM `post` ORDER BY `p_id` desc";
				$val=mysql_query($query);
				return $val;
					}
function post_count()
					{
				$query="SELECT * FROM `post`";
				$val=mysql_query($query);
				$val=mysql_num_rows($val);
				return $val;
					}
function mypost($name){
				$query="SELECT * FROM `post` WHERE name='$name'";
				$val=mysql_query($query);
				return $val;
					}
function like_name($id,$user_id)
				{
				$query="SELECT name FROM `postlike` WHERE p_id='$id' AND user_id='$user_id'";
				$val=mysql_query($query);
				return $val;
				}

function like_count($id)
				{
				$query="SELECT plike FROM `post` WHERE p_id='$id'";
				$val=mysql_query($query);
				$val=mysql_fetch_row($val);
				return $val[0];
				}
function like_count1($id)
				{
				$query="SELECT * FROM `postlike` WHERE p_id='$id'";
				$val=mysql_query($query);
				$val=mysql_num_rows($val);
				return $val;
				}
function update_like_count($id,$val)
				{
				$query="update post set plike='$val' where p_id='$id'";
				$val=mysql_query($query);
				}
function update_like_name($id,$user_id)
				{
				$query="insert into postlike (p_id,user_id) values ('$id','$user_id')";
				$val=mysql_query($query);
				}
function delete_like_name($id,$user_id)
				{
				$query="delete from postlike where p_id='$id' and user_id='$user_id'";
				$val=mysql_query($query);
				}
function getlike_name($id)
				{
				$query="SELECT user_id FROM postlike WHERE p_id='$id'";
				$val=mysql_query($query);
				return $val;
				}
				
function get_postcomments($id)
				{
					$query="SELECT * FROM postcomment WHERE p_id='$id'";
					$val=mysql_query($query);
					return $val;
				}
function insert_replypost($id,$name,$comment,$user_id)
				{
				$query="insert into postcomment (p_id,name,replies,user_id) values ('$id','$name','$comment','$user_id')";
				$val=mysql_query($query);
				}
function replypostcountincr($id)
				{
					$query="SELECT reply FROM post WHERE p_id='$id'";
					$val=mysql_query($query)or ($val=0);
					if($val!=0)
					{
					$val=mysql_fetch_row($val);$val=$val[0];
					$val+=1;
					$query="update post set reply='$val' where p_id='$id'";
					$val=mysql_query($query);
					}
				}
function getpostpart($id)
				{
					$query="SELECT * FROM post WHERE p_id='$id'";
					$val=mysql_query($query);
					return $val;
				}
function get_pic($id)
				{
					$query="SELECT Pic FROM info WHERE user_id='$id'";
					$val=mysql_query($query);
					$val=mysql_fetch_row($val);
					return $val[0];
				}
function update_info($id,$name,$me,$interest,$dob,$city,$phone,$address)
				{	
					$query="update info set name='$name',me='$me',interest='$interest',dob='$dob',city='$city',phone='$phone',address='$address' where user_id='$id'";
					$val=@mysql_query($query);
				}
function display_all11($id)
				{	
					
					$query="select * from info where user_id='$id'";
					$val=mysql_query($query) or die(mysql_error());
					return $val;
				}	
function display_all1()
				{	
					
					$query="select Msg_id,Sender,Message from chat";
					$val=mysql_query($query) or die(mysql_error());
					return $val;
				}
function display_all_post()
				{
					$query="select * from post";
					$val=mysql_query($query) or die(mysql_error());
					return $val;
				}
function mypostt($id)
				{
				$query="SELECT * FROM `post` WHERE user_id='$id'";
				$val=mysql_query($query);
				return $val;
					}
function getpost_details($id)
	{
		$query="SELECT * FROM `post` WHERE p_id='$id'";
				$val=mysql_query($query);
				return $val;
	}
function getuseridfrompid($pid)
	{
			$query="SELECT user_id FROM `post` WHERE p_id='$pid'";
				$val=mysql_query($query);
				$val=mysql_fetch_row($val);
				return $val[0];
	}
function gethead($id)
	{
		$query="SELECT head FROM `post` WHERE p_id='$id'";
				$val=mysql_query($query);
				$val=mysql_fetch_row($val);
				return $val[0];
	}
function updatenotification($userid,$notification)
	{
		$query="INSERT INTO `notification` (user_id,notification) VALUES ('$userid','$notification')";
				$val=mysql_query($query);
				return $val;
	}
function getallnot($id)
	{
			$query="select notification from notification where user_id='$id' order by `n_id` desc";
				$val=mysql_query($query);
				return $val;
	}
function getnotcount($id)
	{
		$query="select notification from notification where user_id='$id' and seen=0";
				$val=mysql_query($query);
				$val=mysql_num_rows($val);
				return $val;	
	}
function updateseennot($id)
	{
		$query="update notification set seen=1 where user_id='$id'";
		$val=mysql_query($query);
	}
function remove_pic($id)
	{
		$query="update info set Pic='../../uploads/u.gif' where user_id='$id'";
		$val=mysql_query($query);	
	}
function getusername($id)
	{
		$query="select username from info where user_id='$id'";
		$val=mysql_query($query);	
		$val=mysql_fetch_row($val);
		return $val[0];
	}
function getusername_fromemail($email)
	{
		$query="select username from info where email='$email'";
		$val=mysql_query($query);	
		$val=mysql_fetch_row($val);
		return $val[0];
	}
function createtable($username)
	{
		$query="CREATE TABLE $username (id INT(6) AUTO_INCREMENT PRIMARY KEY,loc VARCHAR(100),type INT(6),name VARCHAR(100))";
		$val=mysql_query($query);
		return $val;
	}
function droptable($username)
	{
		$query="DROP TABLE IF EXISTS $username";
		$val=mysql_query($query);
		return $val;
	}
function uploadimage($username,$target_path,$type,$name)
	{
		$query="INSERT INTO `$username` (loc,type,name) VALUES ('$target_path','$type','$name')";
				$val=mysql_query($query);
				return $val;
	}
function getallimage($username)
	{
		$query="select loc,type,name from $username ";
				$val=mysql_query($query);
				return $val;	
	}

function updateimagee($lastpostid,$loc,$type,$name)
	{
		$query="INSERT INTO image (p_id,loc,type,name) VALUES ('$lastpostid','$loc','$type','$name')";
				$val=mysql_query($query);
				return $val;
	}
function getallimage1($p_id)
	{
		$query="select loc,name from image where p_id='$p_id' and type=0";
				$val=mysql_query($query);
				return $val;	
	}
function getallfile1($p_id)
	{
		$query="select loc,name from image where p_id='$p_id' and type=1";
				$val=mysql_query($query);
				return $val;	
	}
function getallfiles($username,$type)
	{
		$query="select loc,name from $username where type ='$type'";
				$val=mysql_query($query);
				return $val;
	}
function get_id_fromusername($username)
	{
		$query="select user_id from info where username ='$username'";
				$val=mysql_query($query);
				$val=mysql_fetch_row($val);
				return $val[0];
	}
function verify($id)
	{
		$query="select verify from info where user_id ='$id'";
				$val=mysql_query($query);
				$val=mysql_fetch_row($val);
				return $val[0];
	}
function verify_id($id)
	{
		$query="update info set verify=1 where user_id ='$id'";
				$val=mysql_query($query);
	}
function email_check1($email)
	{
		$query="select email from info where email='$email'";
				$val=mysql_query($query);
		$val=mysql_num_rows($val);
		return $val;
	}
function getcomment_count($id)
	{
		$query="select name from postcomment where p_id='$id'";
		$val=mysql_query($query);
		$val=mysql_num_rows($val);
		return $val;
	}
function check_follow($curr_id,$id)
	{
		$query="select * from follow where user_id='$curr_id' and f_id='$id'";
		$val=mysql_query($query);
		$val=mysql_num_rows($val);
		return $val;
	}
	function count_follow($curr_id)
	{
		$query="select * from follow where user_id='$curr_id'";
		$val=mysql_query($query);
		$val=mysql_num_rows($val);
		return $val;
	}
	function count_follow1($curr_id)
	{
		$query="select * from follow where user_id='$curr_id'";
		$val=mysql_query($query);
		return $val;
	}
	function insert_follow($id,$curr_id)
	{
		$query="INSERT INTO follow (user_id,f_id) VALUES ('$id','$curr_id')";
		$val=mysql_query($query);
	}
	function delete_follow($id,$curr_id)
	{
		$query="delete from follow where user_id='$id' and f_id='$curr_id'";
		$val=mysql_query($query);
	}
	function update_like_post($pid,$like)
	{
		$query="update post set plike='$like' where p_id='$pid'";
		$val=mysql_query($query);
	}
	function get_trending_like()
	{
		$query="SELECT * FROM `post` having plike=(SELECT MAX(plike) FROM `post`)";
		$val=mysql_query($query);
		return $val;
	}
	function get_trending_comment()
	{
		$query="SELECT * FROM `post` having reply=(SELECT MAX(reply) FROM `post`)";
		$val=mysql_query($query);
		return $val;
	}
}