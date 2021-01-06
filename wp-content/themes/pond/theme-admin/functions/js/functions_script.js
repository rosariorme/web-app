jQuery(function(jQuery) {  
  	
	
	/*
	ADD IMAGE
	*/
    jQuery(".single-image").on("click", '.add_singleimage', function() {  
		 formfield = jQuery(this).siblings('input[type="text"]');
        preview = jQuery(this).siblings('.preview_image');  
      
				
		var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;
		
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = jQuery(this);
		_custom_media = true;	
		
		wp.media.editor.send.attachment = function(props, attachment){
		  if ( _custom_media ) {
			var newimgurl = [attachment.url.slice(0, -4), '', attachment.url.slice(-4)].join('');
		   	formfield.val(newimgurl);  
			jQuery(preview).find('img').attr('src', newimgurl);
		  } else {
			return _orig_send_attachment.apply( this, [props, attachment] );
		  };
		}
		wp.media.editor.open(button);
       return false;  
    });
	
	
	jQuery("#sortable-elements").on("click", '.add_singleimage', function() {  
		formfield = jQuery(this).siblings('input[type="text"]');
        preview = jQuery(this).siblings('.preview_image');  
        tb_show('', 'media-upload.php?type=image&TB_iframe=true');  
        window.send_to_editor = function(html) { 
            html = '<div>'+html+'</div>';
			imgurl = jQuery('img',html).attr('src');
            classes = jQuery('img', html).attr('class');  
            id = classes.replace(/(.*?)wp-image-/, '');
            formfield.val(imgurl);  
            if (preview) { preview.attr('src', imgurl);  }
            tb_remove(); 
			elementsupdate();
        }  
        return false;  
    });  
		
	
	/*
	Sortable emelents
	*/
	
	jQuery( "#sortable-elements #sortable" ).sortable({
			revert: true,
			stop: function(event, ui) {  
				elementsupdate();				   
			}
		});
	
	jQuery(".add-element").click(function() {
		var name = 	jQuery(this).attr('name');	
		var feature = jQuery(this).siblings(".element-sortable").val();
		var content = jQuery("#hiddenelements ."+feature).html();
		jQuery(this).siblings(".visual-elements").append(content);
		elementsupdate();
		return false;  
    });
	
	jQuery(".visual-elements").on("click", '.edit', function() {
		jQuery(this).siblings('.editcontent').slideToggle(300);	
		elementsupdate();
	});
	
	jQuery(".visual-elements").on("click", '.delete', function() {
		jQuery(this).parent('li').remove();
		elementsupdate();
	});
	
	jQuery(".visual-elements").on("change", 'input, select, textarea', function() {
		elementsupdate();
	});
	
	
	function elementsupdate() {
		var output = '';
		jQuery( "#sortable-elements #sortable" ).find('li').each(function(index){
			var feature = jQuery(this).attr('title');
			valueoutput = '';
			jQuery(this).find('.row').each(function(index){
				var value = jQuery(this).find('label').attr('for');
				value = jQuery(this).find('.'+value).val();
				valueoutput = valueoutput+value+'~~';
			});
			valueoutput = valueoutput.slice(0, -2)
			output = output+feature+'|'+valueoutput+'|||';
		});
		output = output.slice(0, -3);
		jQuery( "#sortable-elements #sortable" ).siblings('textarea').val(output);
	
	}
	
	
	
	
	
	/*
	Medias
	*/
	jQuery( ".sortable-medias #sortable" ).sortable({
			revert: true,
			stop: function(event, ui) {  
				mediaupdate();				   
			}
		});
	
	jQuery('.sortable-medias .add_image').click(function() {
		var area = jQuery(this).parent('.sortable-medias').attr('id');
		
		var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;
		
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = jQuery(this);
		//var id = button.attr('id').replace('_button', '');
		_custom_media = true;	
		
		wp.media.editor.send.attachment = function(props, attachment){
		  if ( _custom_media ) {
			var newimgurl = [attachment.url.slice(0, -4), '-150x150', attachment.url.slice(-4)].join('');
			jQuery('#'+area).find("#sortable").append('<li class="ui-state-default" title="image"><img src="'+newimgurl+'" class="'+attachment.id+'"><div class="delete"><span></span></div></li>');
		  } else {
			return _orig_send_attachment.apply( this, [props, attachment] );
		  };
		  mediaupdate();
		}
		
		wp.media.editor.open(button);
    	return false;

	});
	
	
	jQuery('.sortable-medias .add_video').click(function() {
		var area = jQuery(this).parent('.sortable-medias').attr('id');
		jQuery('#'+area).find("#sortable").append('<li class="ui-state-default" title="video"><div class="move">move</div><textarea name="videovalue"></textarea><div class="delete"><span></span></div></li>');
	    mediaupdate();
		return false;  
	});
	
	jQuery( ".sortable-medias #sortable").on("click", '.delete', function() {
		jQuery(this).parent('li').remove();
		mediaupdate();
	});
	
	jQuery( ".sortable-medias #sortable").on("change", 'textarea', function() {
		mediaupdate();
	});
	
  	function mediaupdate() {
		var area = '';
		/*jQuery( ".sortable-medias #sortable" ).find('li').each(function(index){
			area = jQuery(this).parent('.sortable-medias').attr('id');
			
			var feature = jQuery(this).attr('title');
			if (feature == 'image') {
				output = output+feature+'~~'+jQuery(this).find('img').attr('class')+'|||';
			} else if (feature == 'video') {
				output = output+feature+'~~'+jQuery(this).find('textarea').val()+'|||';
			}
		});*/
		
		jQuery( ".sortable-medias" ).each(function(index){
			var area = jQuery(this).attr('id');
			var output = '';
			jQuery(this).find("#sortable li").each(function(index){
				var feature = jQuery(this).attr('title');
				if (feature == 'image') {
					output = output+feature+'~~'+jQuery(this).find('img').attr('class')+'|||';
				} else if (feature == 'video') {
					output = output+feature+'~~'+jQuery(this).find('textarea').val()+'|||';
				}
			});
			
			output = output.slice(0, -3);
			jQuery('#'+area).find("#sortable").siblings('textarea').val(output);
		});
		
	}
	
	
	
	/*
	Hiding
	*/
	jQuery('.select-hiding select').change(function() {
		var val = jQuery(this).val();
		var name = jQuery(this).attr('id');
		jQuery('.hide'+name).hide();
		jQuery('.'+name+'_'+val).show();
	});
	
	jQuery('.select-hiding select').each(function(index) {
		var val = jQuery(this).val();
		var name = jQuery(this).attr('id');
		jQuery('.hide'+name).hide();
		jQuery('.'+name+'_'+val).show();
	});
	
}); 


jQuery(document).ready(function($){
    $('.sr-color-field').wpColorPicker();
});