(function($){
	$(document).ready(function(){
		
		// GET request, populate products
		$('select#your-industry').change(function(){
			var url = window.location.href+'get-api.php?key=my-api&get_photos=true&industry='+$(this).val();	
				
			$.get(url, function(data){
				$('p.error').remove();
				
				if(typeof data == 'string') data = JSON.parse(data);
				
				// Not successful
				if(data.success === false){
					if(data.msg) $('select#your-industry').after('<p class="error">'+data.msg+'</p>');
					else $('select#your-industry').after('<p class="error">Error - please try again.</p>');
					return;
				}
				
				// Did we get the data we were expecting?
				if(!data.images) {
					alert('Images not defined.');
					return;
				}
				
				// Yes, we got the images array - add it to the page
				$('#products').html(''); // blank it
				
				for(var i = 0; i < data.images.length; i++){	
					var html = '<div class="col-sm-4"><img src="https://source.unsplash.com/'+
						data.images[i]+'/300x168" class="imgscale" /><div class="form-group">'+
						'<label><input type="checkbox" name="images[]" value="'+data.images[i]+
						'" /> Buy This Image for $1</label></div></div>';
					
					$('#products').append(html).closest('form').fadeIn();
				}
				
			});
		});
	
		// POST request, send the order
		$('form').submit(function(e){
			e.preventDefault();
			
			// Prepare our variables to send
			var post_vars = {
				crsf_token:	$('input[name="crsf_token"]').val(), 
				items: 		[], 
				ajax_order: true
			};
			
			$.each($("input[name='images[]']:checked"), function(){            
				post_vars.items.push($(this).val()); // Add all checked images
			});
			
			$.ajax({
				type: 	"POST",
				url: 	window.location.href+'post-handler.php',
				data: 	post_vars,
				success: function(data){
					if(typeof data == 'string') data = JSON.parse(data); 
					
					if(data.success === false){
						if(data.msg) alert(data.msg);
						else alert('Something went wrong.');
						return;
					}
					
					// Show receipt
					if(!data.msg) data.msg = 'RECEIPT GOES HERE';
					$('form').hide().after(data.msg);
					$('select').hide();
				}
			}).fail(function(){
				alert('Ouch, failed'); // the endpoint could not be reached
			});
		});
		
	});
})(jQuery);	
