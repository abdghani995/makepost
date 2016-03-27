<?php 
include('../lib/connect.php');	
	$obj=new connect();

$con=mysql_connect('182.50.133.84:3306','chat','qwerty123') or die("Error in Connection");
mysql_select_db('chat',$con) or die("Error in db");
$value=$_GET['value'];
if($value==""){
echo "";
}
else{
$sql="select p_id,head,name from post where head like '%$value%' order by p_id";
$res=mysql_query($sql) or die(mysql_error());
$sql="select user_id,name,Pic from info where name like '$value%' order by user_id";
$res1=mysql_query($sql) or die(mysql_error());
echo "<table align='center' width='400px';";
$i=1;
$ans="";
$ans.="<tr height='25px'></tr>";
while($arr=mysql_fetch_row($res1))
{
		$ans.="<tr ></tr>";
		$ans.="<th align='center' height='15px' >";
		$ans.="<a href='editprofile/visit.php?id=".$obj->encr($arr[0])."'>".$i++." . ".$arr[1]."</a>";
		$ans.="</th>";
		$ans.="</a>";
}
while($arr=mysql_fetch_row($res))
{		
		
		$ans.="<tr ></tr>";
		$ans.="<th align='center' height='15px' >";
		$ans.="<a href='seemore.php?pid=".$obj->encr($arr[0])."'>".$i++." . ".$arr[1]."</a>";
		$ans.="</th>";
		$ans.="</a>";

}

if($i>1)
{$i--;
	$ans.="<tr height='10px'></tr>";
		$ans.="<tr align='right'>";
		$ans.="<td align='right'><h6>".$i." RESULTS FOUND</h6></td>";
		$ans.="</tr>";
		$ans.="</a>";
}
else
{
		$ans.="<tr height='10px'></tr>";
		$ans.="<tr align='right'>";
		$ans.="<td>NO RESULTS</td>";
		$ans.="</tr>";
		$ans.="</a>";
}

$ans.="</table>";
echo $ans;}
?>