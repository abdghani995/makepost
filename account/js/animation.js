// JavaScript Document
function animatee(val){ 
               $("#img"+val).animate({  
                  width: "600px", 
				  height: "500px",
                  opacity: 1.0,  
                  borderWidth: "1px" 
               },1000,function(){
			 
			    $("#img"+val).animate(
				{ 
                  width: "300px", 
				  height: "200px",
				});
               }).delay(5000);
            }
