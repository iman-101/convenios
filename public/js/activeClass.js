
 $(document).ready(function(){
	
    $('.myDiv a').each(function(){
	
	   var path=window.location.href ;
	   
		  if(this.href === path){
			
			   $('.myDiv a').removeClass('active');
			    $(this).addClass('active');
			
		}
	
     });

		
 });