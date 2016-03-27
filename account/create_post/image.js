var obj;
if(window.XMLHttpRequest)
{
	obj=new XMLHttpRequest();
	
}
else
{
		obj=new ActiveXObject("Microsoft.XMLHttpRequest");
}
function showimage()
{

	if(obj)
	{
		var url="image.php?value=0";
	
		obj.open("get",url,true);
		obj.onreadystatechange=function()
			{
			if(obj.readyState==4 && obj.status== 200)
				{
					
					document.getElementById("images").innerHTML=obj.responseText;
				
				}
			}
			obj.send(null);
	}
}
function showfile()
{

	if(obj)
	{
		var url="image.php?value=1";
	
		obj.open("get",url,true);
		obj.onreadystatechange=function()
			{
			if(obj.readyState==4 && obj.status== 200)
				{
					
					document.getElementById("files").innerHTML=obj.responseText;
				
				}
			}
			obj.send(null);
	}
}