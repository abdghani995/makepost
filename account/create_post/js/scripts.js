
$(document).ready(function(){$('#sidebar').affix({
      offset: {
        top: 230,
        bottom: 100
      }
});	
$('#midCol').affix({
      offset: {
        top: 230,
        bottom: 100
      }
});	
});

$('#link').click(function(){
	
	$('#linkpart').toggle('fast');
});
$('#link1').click(function(){
	
	$('#linkpart').toggle('fast');
});

$('#link_submit').click(function(){
	var text=$('input[name="url_text"]').val();
	var url=$('input[name="url"]').val();
	var str='<a href="'+url+'">'+text+'</a>';
	var c=document.getElementById("content1").value;
	document.getElementById("content1").value=c+" "+str;
	$('input[name="url"]').attr('value','');
	$('input[name="url_text"]').attr('value','');
});