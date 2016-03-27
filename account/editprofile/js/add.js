var obj;
if(window.XMLHttpRequest)
{
	obj=new XMLHttpRequest();
	
}
else
{
		obj=new ActiveXObject("Microsoft.XMLHttpRequest");
}
function addfollow(val)
{
	
	if(obj)
	{
		var url="add.php?value="+val;
	
		obj.open("get",url,true);
		obj.onreadystatechange=function()
			{
			if(obj.readyState==4 && obj.status== 200)
				{
					
					document.getElementById("add").innerHTML=obj.responseText;
				
				}
			
			
			}
			obj.send(null);
	}

}
