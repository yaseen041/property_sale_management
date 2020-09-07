			function increment_last(v) {
				return v.replace(/[0-9]+(?!.*[0-9])/, function(match) {
					return parseInt(match, 10)+1;
				});
			}
			
			function addEnt() {
				
				var last_ent_box = jQuery('.ent_option_box').parent().last();
				alert(last_ent_box);
				var ent_box = jQuery(last_ent_box).clone();
				
				jQuery(ent_box).find('input, select, textarea').each(function(){
					var name = jQuery(this).attr('name');
					var newName = increment_last(name);
					jQuery(this).attr('name', newName);
					jQuery(this).val("");		
				});
				
				jQuery(ent_box).find('.sig_container, textarea, .emptyme').empty();
				jQuery(ent_box).find('.ent_status').val("pending");
				jQuery(ent_box).find('.ent_option_box').css("border","3px #38B1CC solid");
				jQuery(ent_box).find('.hide_on_add').css("display","none");
				
				jQuery(ent_box).insertAfter(last_ent_box);
				
				jQuery('.ent_option_box').each(function(){
					jQuery(this).find('.delEnt_button').remove();
				});
				
				jQuery('.ent_option_box').find('.button_container').append('<button class="button-primary delEnt_button" type="button" onclick="delEnt(this)">Remove Entertainer</button>');	
				
				jQuery('.add-booking-sheet-content').masonry('reloadItems');
				jQuery('.add-booking-sheet-content').masonry('layout');
				
			}
			
			function delEnt(button) {
				jQuery(button).parent().parent().parent().remove();
				jQuery('.ent_option_box').each(function(){
					jQuery(this).find('.delEnt_button').remove();
				});
				if (jQuery('.ent_option_box').length > 1) {
					jQuery('.ent_option_box').find('.button_container').append('<button class="button-primary delEnt_button" type="button" onclick="delEnt(this)">Remove Entertainer</button>');	
				}
				jQuery('.add-booking-sheet-content').masonry('reloadItems');
				jQuery('.add-booking-sheet-content').masonry('layout');
			}
			
			
			