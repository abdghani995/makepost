var obj;
if(window.XMLHttpRequest)
{
	obj=new XMLHttpRequest();
	
}
else
{
		obj=new ActiveXObject("Microsoft.XMLHttpRequest");
}
function submit_comment(val1,val2)
{
	
	if(obj)
	{
		var url="comment.php?value1="+val1+"&value2="+val2;
	
		obj.open("get",url,true);
		obj.onreadystatechange=function()
			{
			if(obj.readyState==4 && obj.status== 200)
				{
					
					document.getElementById("pacm"+val2).innerHTML=obj.responseText;
				
				}
			
			}
			obj.send(null);
	}
//update_comment(val2);
}
function update_comment(val)
{
	
	if(obj)
	{
		var url="commentupdate.php?value="+val;
	
		obj.open("get",url,true);
		obj.onreadystatechange=function()
			{
			if(obj.readyState==4 && obj.status== 200)
				{
					
					document.getElementById("lk"+val).innerHTML=obj.responseText;
				
				}
			
			}
			obj.send(null);
	}
}