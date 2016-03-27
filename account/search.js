var obj;
if(window.XMLHttpRequest)
{
	obj=new XMLHttpRequest();
	
}
else
{
		obj=new ActiveXObject("Microsoft.XMLHttpRequest");
}
function get_data(val)
{

	if(obj)
	{
		var url="a.php?value="+val;
	
		obj.open("get",url,true);
		obj.onreadystatechange=function()
			{
			if(obj.readyState==4 && obj.status== 200)
				{
					
					document.getElementById("show_search").innerHTML=obj.responseText;
				
				}
			}
			obj.send(null);
	}
}
function get_data1(val,val1)
{
	if(obj)
	{
		var url="b.php?value="+val;
	
		obj.open("get",url,true);
		obj.onreadystatechange=function()
			{
			if(obj.readyState==4 && obj.status== 200)
				{
					
				document.getElementById("counttt").innerHTML=obj.responseText;
				if(val1==1)
				get_data2(val);
				}
			}
			obj.send(null);
	}
}
function get_data2(val)
{
	if(obj)
	{
		var url="c.php?value="+val;
	
		obj.open("get",url,true);
		obj.onreadystatechange=function()
			{
			if(obj.readyState==4 && obj.status== 200)
				{
				document.getElementById("notification").innerHTML=obj.responseText;
				
				}
			}
			obj.send(null);
	}
}
function lkcount(val)
 {
		if(obj)
	{
		var url="likepost.php?value="+val;
	
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