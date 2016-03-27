$('#form_input').submit(function(){
	
	
	
	var message=$('#message').val();
	var stat=$('#stat').val()
	var name=$('#id').val();
	
	$.ajax({
		   
		   url:'scripts/php/send.php',
		   data:{message:message,name:name,stat:stat},
		   success:function(data){
		   			$('#feedback').html(data);
						$('#feedback').fadeIn('slow',function()
								{
								$('#feedback').fadeOut(6000);
								});
						$('#message').val('');
				}
		   });
	return false;

	
});