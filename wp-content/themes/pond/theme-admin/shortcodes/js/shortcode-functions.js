jQuery(document).ready(function($){
   
    //init Thickbox
    
    ////stop the flash from happening
	$('#TB_window').css('opacity',0);
	
	function calcTB_Pos() {
		$('#TB_window').css({
	   	   'height': ($('#TB_ajaxContent').outerHeight() + 30) + 'px',
	   	   'top' : (($(window).height() + $(window).scrollTop())/2 - (($('#TB_ajaxContent').outerHeight()-$(window).scrollTop()) + 30)/2) + 'px',
	   	   'opacity' : 1
		});
	}
	
	setTimeout(calcTB_Pos,10);
	
	//just incase..
	setTimeout(calcTB_Pos,100);
	
	$(window).resize(calcTB_Pos);
	
	
	
	/*	**********************************
		SHOW FIRST SHORTCODE
	/*	**********************************/
	$('.sc_list li:first-child a').addClass('active');
	
	$('.sc_list li a').click(function() {
		$('.sc_list li a').removeClass('active');
		$(this).addClass('active');
		var showoption = $(this).attr('href');
		$('.sc_option .sc-option-content').hide();
		$('.sc_option #'+showoption).show();
		return (false);
	});
	
	
	
	/*	**********************************
		ICON CLICK
	/*	**********************************/
	$("select#icon-type option").each(function () { 
		var type = jQuery(this).val();
		var checked = jQuery(this).attr('selected');
		if (checked == 'selected') {
			$("select#icon-type").siblings('.iconfonts').hide();
			$("select#icon-type").siblings('.'+type).show();
		}
	});
	
	$("select#icon-type").click(function () {
	  	var type = $(this).val();
		$(this).siblings('.iconfonts').hide();
		$(this).siblings('.'+type).show();
	});
	
	$('.iconcheck').click(function() { 
		value = $(this).siblings('input').val();
		parent = $(this).parent();
		
		$(parent).siblings('li').removeClass('iconactive');
		$(parent).addClass('iconactive');
		
		$(parent).siblings('li').find("input").removeAttr("checked");
		$(this).siblings('input').attr("checked", "checked");
		
		var form = $(parent).parents('form').attr('id');
	});	
	
	
	/*	**********************************
		ADD SINGLE IMAGE
	/*	**********************************/
  	$('.upload-sc-image').on('click',function( event ) {	 
		
		var preview = jQuery(this).siblings('.preview-image').find('img');
		var value = jQuery(this).siblings('input');
		var uploadbutton = jQuery(this);
		var removebutton = jQuery(this).siblings('.remove-sc-image');
		
		mediaframe = wp.media.frames.customHeader = wp.media({
			title: 'Choose Image',
			library: { type: 'image' },
			button: { text: 'Select Image' }
		});
		mediaframe.on( "select", function() {
				// Grab the selected attachment.
				var imagefile = mediaframe.state().get("selection").first();
				var imagesrc = imagefile.attributes.url;

				$(preview).attr('src',imagesrc);
				$(value).val(imagesrc);
				$(removebutton).css({'display':'inline-block'});
				$(uploadbutton).css({'display':'none'});
				
		});
	    mediaframe.open();
		
		return false;
	});	
	
	/* Remove Image */
  	$('.remove-sc-image').on('click',function( event ) {	 
		
		var preview = jQuery(this).siblings('.preview-image').find('img');
		var value = jQuery(this).siblings('input');
		var uploadbutton = jQuery(this).siblings('.upload-sc-image');
				
		$(preview).attr('src','');
		$(value).val('');
		$(uploadbutton).css({'display':'inline-block'});
		$(this).css({'display':'none'});
		
		return false;
	});	
	
	
	/*	**********************************
		ADD IMAGE FOR MEDIAS
	/*	**********************************/
	jQuery('.sortable-medias-shortcode .add_image').click(function() {
		
		var area = jQuery(this).parent('.sortable-medias-shortcode').attr('id');
		
		mediaframe = wp.media.frames.customHeader = wp.media({
			title: 'Choose Image',
			library: { type: 'image' },
			multiple: true,
			button: { text: 'Insert selected Images' }
		});
		mediaframe.on( "select", function() {
			
			// Grab the selected attachments.
			var selection = mediaframe.state().get("selection");
			selection.map( function( attachment ) {
				attachment = attachment.toJSON();
				var imageId = attachment.id;
				if (attachment.sizes.full.height < 150 || attachment.sizes.full.width < 150) {
					var imageThumb = attachment.sizes.full.url;
				} else {
					var imageThumb = attachment.sizes.thumbnail.url;
				}
				jQuery('#'+area).find("#sortable").append('<li class="ui-state-default" title="image"><img src="'+imageThumb+'" class="'+imageId+'"><div class="delete"><span></span></div></li>');
				// http://stackoverflow.com/questions/20101909/wordpress-media-uploader-with-size-select
			}); 
			mediaupdate();
		});
	    mediaframe.open();
	    return false;
	});
	
	jQuery( ".sortable-medias-shortcode #sortable").on("click", '.delete', function() {
		jQuery(this).parent('li').remove();
		mediaupdate();
	});
	
	function mediaupdate() {
				
		jQuery( ".sortable-medias-shortcode" ).each(function(index){
			var area = jQuery(this);
			output ='';
			jQuery(this).find("#sortable li").each(function(index){
				output = output+'[sr_gitem id="'+jQuery(this).find('img').attr('class')+'"]';
			});
			area.find("#sortable").siblings('textarea').val(output);
		});
		
	}
	
	// sortable
	jQuery( ".sortable-medias-shortcode #sortable" ).sortable({
		revert: true,
		stop: function(event, ui) {  
			mediaupdate();	   
		}
	});
	
  
  
  	$('.sr-color-field').wpColorPicker();
  
  
  	/*	**********************************
		CUSTOM RADIO
	/*	**********************************/
	$('.customradio').click(function() { 
		
		value = $(this).attr('href');
		parent = $(this).parent();
		
		$(parent).find(".customradio").removeClass('active');
		$(this).addClass('active');
		
		$(parent).find("input").removeAttr("checked");
		$(parent).find("#"+value).attr("checked", "checked");
		
		var form = $(parent).parents('form').attr('id');
		
		
		
		/* custom columns show/hide */
		if (form == 'form_columns') {
			$(parent).parents(".sc-option-content").find('#sc_group_column_one').hide();
			$(parent).parents(".sc-option-content").find('#sc_group_column_two').hide();
			$(parent).parents(".sc-option-content").find('#sc_group_column_three').hide();
			$(parent).parents(".sc-option-content").find('#sc_group_column_four').hide();
			$(parent).parents(".sc-option-content").find('#sc_group_column_five').hide();
			
			if (value == 'layout_onehalf-onehalf' || value == 'layout_onethird-twothird' || value == 'layout_twothird-onethird') {
				$(parent).parents(".sc-option-content").find('#sc_group_column_one').show();
				$(parent).parents(".sc-option-content").find('#sc_group_column_two').show();
			} else if (value == 'layout_onethird-onethird-onethird' || value == 'layout_onehalf-onefourth-onefourth') {
				$(parent).parents(".sc-option-content").find('#sc_group_column_one').show();
				$(parent).parents(".sc-option-content").find('#sc_group_column_two').show();
				$(parent).parents(".sc-option-content").find('#sc_group_column_three').show();
			} else if (value == 'layout_onefourth-onefourth-onefourth-onefourth') {
				$(parent).parents(".sc-option-content").find('#sc_group_column_one').show();
				$(parent).parents(".sc-option-content").find('#sc_group_column_two').show();
				$(parent).parents(".sc-option-content").find('#sc_group_column_three').show();
				$(parent).parents(".sc-option-content").find('#sc_group_column_four').show();
			} else if (value == 'layout_onefifth-onefifth-onefifth-onefifth-onefifth') {
				$(parent).parents(".sc-option-content").find('#sc_group_column_one').show();
				$(parent).parents(".sc-option-content").find('#sc_group_column_two').show();
				$(parent).parents(".sc-option-content").find('#sc_group_column_three').show();
				$(parent).parents(".sc-option-content").find('#sc_group_column_four').show();
				$(parent).parents(".sc-option-content").find('#sc_group_column_five').show();
			}
		}

		
		/* team member show/hide */
		if (form == 'form_team') {
			$(parent).parents(".sc-option-content").find('#sc_teamgroup_one').hide();
			$(parent).parents(".sc-option-content").find('#sc_teamgroup_two').hide();
			$(parent).parents(".sc-option-content").find('#sc_teamgroup_three').hide();
			$(parent).parents(".sc-option-content").find('#sc_teamgroup_four').hide();
			
			if (value == 'layout_onehalf-onehalf') {
				$(parent).parents(".sc-option-content").find('#sc_teamgroup_one').show();
				$(parent).parents(".sc-option-content").find('#sc_teamgroup_two').show();
			} else if (value == 'layout_onethird-onethird-onethird') {
				$(parent).parents(".sc-option-content").find('#sc_teamgroup_one').show();
				$(parent).parents(".sc-option-content").find('#sc_teamgroup_two').show();
				$(parent).parents(".sc-option-content").find('#sc_teamgroup_three').show();
			} else if (value == 'layout_onefourth-onefourth-onefourth-onefourth') {
				$(parent).parents(".sc-option-content").find('#sc_teamgroup_one').show();
				$(parent).parents(".sc-option-content").find('#sc_teamgroup_two').show();
				$(parent).parents(".sc-option-content").find('#sc_teamgroup_three').show();
				$(parent).parents(".sc-option-content").find('#sc_teamgroup_four').show();
			}
		}
		
		
		/* pricing table show/hide */
		if (form == 'form_pricing') {
			$(parent).parents(".sc-option-content").find('#sc_pricinggroup_one').hide();
			$(parent).parents(".sc-option-content").find('#sc_pricinggroup_two').hide();
			$(parent).parents(".sc-option-content").find('#sc_pricinggroup_three').hide();
			$(parent).parents(".sc-option-content").find('#sc_pricinggroup_four').hide();
			
			if (value == 'layout_onehalf-onehalf') {
				$(parent).parents(".sc-option-content").find('#sc_pricinggroup_one').show();
				$(parent).parents(".sc-option-content").find('#sc_pricinggroup_two').show();
			} else if (value == 'layout_onethird-onethird-onethird') {
				$(parent).parents(".sc-option-content").find('#sc_pricinggroup_one').show();
				$(parent).parents(".sc-option-content").find('#sc_pricinggroup_two').show();
				$(parent).parents(".sc-option-content").find('#sc_pricinggroup_three').show();
			} else if (value == 'layout_onefourth-onefourth-onefourth-onefourth') {
				$(parent).parents(".sc-option-content").find('#sc_pricinggroup_one').show();
				$(parent).parents(".sc-option-content").find('#sc_pricinggroup_two').show();
				$(parent).parents(".sc-option-content").find('#sc_pricinggroup_three').show();
				$(parent).parents(".sc-option-content").find('#sc_pricinggroup_four').show();
			}
		}
		
		
		return false;
	});
	
	
	$( "#sc_teamcount" ).click(function() {
		var value = $( "#sc_teamcount option:selected" ).attr('value');
		
		$('#sc_teamgroup_one').hide();
		$('#sc_teamgroup_two').hide();
		$('#sc_teamgroup_three').hide();
		$('#sc_teamgroup_four').hide();
		
		if (value == '1') {
			$('#sc_teamgroup_one').show();
		} else if (value == '2') {
			$('#sc_teamgroup_one').show();
			$('#sc_teamgroup_two').show();
		} else if (value == '3') {
			$('#sc_teamgroup_one').show();
			$('#sc_teamgroup_two').show();
			$('#sc_teamgroup_three').show();
		} else if (value == '4') {
			$('#sc_teamgroup_one').show();
			$('#sc_teamgroup_two').show();
			$('#sc_teamgroup_three').show();
			$('#sc_teamgroup_four').show();
		}
	});
	
	
	/*	**********************************
		DUPLICATE GROUP
	/*	**********************************/
	$('.groupduplicater').click(function() {
		
		var group = $(this).attr('href');
		var parent = $(this).parent('form');
		var groupcontent = $(this).parent('form').find('.group:first').html();
		
		$(this).before('<div id="'+group+'" class="group">'+groupcontent+'</div>');
		
		return false;
	});
	
	
	
	/*	**********************************
		HIDING
	/*	**********************************/
	jQuery('.select-hiding select').change(function() {
		var val = jQuery(this).val();
		var name = jQuery(this).attr('id');
		//alert(name);
		jQuery('.hide'+name).hide();
		jQuery('.'+name+'_'+val).show();
	});
	
	
	jQuery('.select-hiding select').each(function(index) {
		var val = jQuery(this).val();
		var name = jQuery(this).attr('id');
		jQuery('.hide'+name).hide();
		jQuery('.'+name+'_'+val).show();
	});
	
	
	
	
	/*	**********************************
		CLICK INSERT SHORTCODE
	/*	**********************************/
	$('.submit').click(function() {
		var check = true;
		
		// ---------------------- CONTROL COLUMNS
		if ($(this).attr('id') == 'insert_columns') {
			var layout = $(this).parent('form').find('input[name="sc_columnlayout"]:checked').val();
			if (layout) {   } else { alert('Please Choose a column layout'); check = false; } 
		}
		// ---------------------- CONTROL COLUMNS
		
		
		// ---------------------- CONTROL TEAM
		if ($(this).attr('id') == 'insert_team') {
			var type = $(this).parent('form').find('select#sc_teamtype option:selected').attr('value');
			var layout = $(this).parent('form').find('input[name="sc_teamlayout"]:checked').val();
			var count = $(this).parent('form').find('select#sc_teamcount option:selected').attr('value');
			if (type == 'column' && !layout) { alert('Please Choose a Column layout'); check = false; } 
			else if (type == 'list' && !count) { alert('Please Choose a Team Number'); check = false; } 
		}
		// ---------------------- CONTROL TEAM
		
		
		// ---------------------- CONTROL PRICING
		if ($(this).attr('id') == 'insert_pricing') {
			var layout = $(this).parent('form').find('input[name="sc_pricinglayout"]:checked').val();
			if (layout) {   } else { alert('Please Choose a Pricing layout'); check = false; } 
		}
		// ---------------------- CONTROL PRICING
		
			
		// ---------------------- CONTROL CONTACT
		if ($(this).attr('id') == 'insert_contact') {
			var mail = $(this).parent('form').find('input#sc_contactsendto').val();
			if (mail) {   } else { alert('Please enter a recipient email'); check = false; } 
		}
		// ---------------------- CONTROL CONTACT
		
		
		var theShortcode = getshortcode($(this).attr('id'));
		var ed = tinyMCE.activeEditor;
		ed.selection.setContent(theShortcode);
		tb_remove();
		
		return false;
	});
	
	
	
	
	/*	**********************************
		FUNCTION TO GET THE RIGHT SHORTCODE
	/*	**********************************/
	function getshortcode(id) {
		
		var outputbefore = ''; 
		var output = ''; 
		
		// ---------------------- COLUMNS
		if (id == 'insert_columns') {
			
			var layout = $('#'+id).parent('form').find('input[name="sc_columnlayout"]:checked').val();
			var text_one = $('#'+id).parent('form').find('textarea#sc_column_one').val();
			var text_two = $('#'+id).parent('form').find('textarea#sc_column_two').val();
			var text_three = $('#'+id).parent('form').find('textarea#sc_column_three').val();
			var text_four = $('#'+id).parent('form').find('textarea#sc_column_four').val();
			var text_five = $('#'+id).parent('form').find('textarea#sc_column_five').val();
						
			if (layout == 'layout_onehalf-onehalf') {
				output = '[one_half]'+text_one+'[/one_half]';	
				output += '[one_half_last]'+text_two+'[/one_half_last]';	
			} else if (layout == 'layout_twothird-onethird') {
				output = '[two_third]'+text_one+'[/two_third]';	
				output += '[one_third_last]'+text_two+'[/one_third_last]';	
			} else if (layout == 'layout_onethird-twothird') {
				output = '[one_third]'+text_one+'[/one_third]';	
				output += '[two_third_last]'+text_two+'[/two_third_last]';	
			} else if (layout == 'layout_onethird-onethird-onethird') {
				output = '[one_third]'+text_one+'[/one_third]';	
				output += '[one_third]'+text_two+'[/one_third]';	
				output += '[one_third_last]'+text_three+'[/one_third_last]';	
			} else if (layout == 'layout_onehalf-onefourth-onefourth') {
				output = '[one_half]'+text_one+'[/one_half]';	
				output += '[one_fourth]'+text_two+'[/one_fourth]';	
				output += '[one_fourth_last]'+text_three+'[/one_fourth_last]';	
			} else if (layout == 'layout_onefourth-onefourth-onefourth-onefourth') {
				output = '[one_fourth]'+text_one+'[/one_fourth]';	
				output += '[one_fourth]'+text_two+'[/one_fourth]';	
				output += '[one_fourth]'+text_three+'[/one_fourth]';	
				output += '[one_fourth_last]'+text_four+'[/one_fourth_last]';	
			} else if (layout == 'layout_onefifth-onefifth-onefifth-onefifth-onefifth') {
				output = '[one_fifth]'+text_one+'[/one_fifth]';	
				output += '[one_fifth]'+text_two+'[/one_fifth]';	
				output += '[one_fifth]'+text_three+'[/one_fifth]';	
				output += '[one_fifth]'+text_four+'[/one_fifth]';	
				output += '[one_fifth_last]'+text_five+'[/one_fifth_last]';	
			}
			
			output = '[column_row]'+output+'[/column_row]';
			
		}
		// ---------------------- COLUMNS
		
		
		
		
		// ---------------------- SKILLS
		if (id == 'insert_skills') {
			
			$('#'+id).parent('form').find('.group').each(function(index) {					
					var skill_percent = jQuery(this).find('input#sc_skillpercent').val();
					var skill_name = jQuery(this).find('input#sc_skillname').val();
					var skill_color = jQuery(this).find('input#sc_skillcolor').val();
					output += '[skill amount="'+skill_percent+'" name="'+skill_name+'" color="'+skill_color+'"]';
			});
			
		}
		// ---------------------- SKILLS
		
		
		
		// ---------------------- SELHOSTEDT AUDIO
		if (id == 'insert_selhostedaudio') {
			
			var mp3 = $('#'+id).parent('form').find('input#sc_selhostedaudiomp3').val();
			var oga = $('#'+id).parent('form').find('input#sc_selhostedaudiooga').val();
			var pic = $('#'+id).parent('form').find('input#sc_selhostedaudiopic').val();
			var id = $('#'+id).parent('form').find('input#sc_selhostedaudioid').val();
			output += '[selhostedtaudio mp3="'+mp3+'" oga="'+oga+'" pic="'+pic+'" id="'+id+'"]';
	
		}
		// ---------------------- SELHOSTEDT AUDIO
		
		
		
		// ---------------------- SELHOSTEDT VIDEO
		if (id == 'insert_selhostedvideo') {
			
			var m4v = $('#'+id).parent('form').find('input#sc_selhostedvideom4v').val();
			var oga = $('#'+id).parent('form').find('input#sc_selhostedvideooga').val();
			var webmv = $('#'+id).parent('form').find('input#sc_selhostedvideowebmv').val();
			var pic = $('#'+id).parent('form').find('input#sc_selhostedvideopic').val();
			var id = $('#'+id).parent('form').find('input#sc_selhostedvideoid').val();
			output += '[selhostedtvideo m4v="'+m4v+'" oga="'+oga+'" webmv="'+webmv+'" pic="'+pic+'" id="'+id+'"]';
	
		}
		// ---------------------- SELHOSTEDT VIDEO
		
		
		
		
		// ---------------------- CONTACT
		if (id == 'insert_contact') {
			
			var fields = '';
			
			$('#'+id).parent('form').find('.group').each(function(index) {					
					
					var fieldtype = $(this).find('select#sc_contacttype').val();
					var fieldname = $(this).find('input#sc_contactname').val();
					var slugname = $(this).find('input#sc_contactslug').val();
					if (slugname == '') { slugname = fieldname.toLowerCase(); slugname = slugname.replace(' ',''); } 
					var required = $(this).find('select#sc_contactreq').val();
					
					output += '[field type='+fieldtype+' name="'+fieldname+'" slug='+slugname+' required='+required+']';
					if (fieldtype !== 'submitbutton') { fields += slugname+','; }
					
			});
			
			var email =  $('#'+id).parent('form').find('input#sc_contactsendto').val();
			var subject =  $('#'+id).parent('form').find('input#sc_contactsubject').val();
			var submitname = $('#'+id).parent('form').find('input#sc_contactsubmit').val();
			
			output = '[contactgroup fields='+fields+' email='+email+' subject="'+subject+'" submit="'+submitname+'"]'+output+'[/contactgroup]';
		}
		// ---------------------- CONTACT
		
		
		
		// ---------------------- BUTTONS
		if (id == 'insert_buttons') {
			
			var color = $('#'+id).parent('form').find('select#sc_buttoncolor').val();
			var size = $('#'+id).parent('form').find('select#sc_buttonsize').val();
			var text = $('#'+id).parent('form').find('input#sc_buttontext').val();
						
			var goto = $('#'+id).parent('form').find('select#sc_buttongoto').val();
			if (goto == 'url') {
				var url = $('#'+id).parent('form').find('input#sc_button_url_url').val();
				var target = $('#'+id).parent('form').find('select#sc_button_url_target').val();
				var sc_options = 'url="'+url+'" target="'+target+'"';
			} else if (goto == 'scrollto') {
				var scrollto = $('#'+id).parent('form').find('select#sc_button_scroll_section').val();
				var sc_options = 'scrollto="'+scrollto+'"';
			} else if (goto == 'video') {
				var video = $('#'+id).parent('form').find('input#sc_button_video_video').val();
				var sc_options = 'video="'+video+'"';
			}
			
			output = '[button color='+color+' size="'+size+'" '+sc_options+']'+text+'[/button]';
			
		}
		// ---------------------- BUTTONS
		
		
		
		
		// ---------------------- ICONS
		if (id == 'insert_icon') {
			
			var type = $('#'+id).parent('form').find('input[name="sc_iconfont"]:checked').val();
			var size = $('#'+id).parent('form').find('select#sc_iconsize').val();
			var color = $('#'+id).parent('form').find('input#sc_iconcolor').val();
			
			output = '[iconfont type="'+type+'" size="'+size+'" color="'+color+'"]';
			
		}
		// ---------------------- ICONS
		
		
		
		// ---------------------- ICONBOX
		if (id == 'insert_iconbox') {
			
			var type = $('#'+id).parent('form').find('input[name="sc_iconboxfont"]:checked').val();
			var color = $('#'+id).parent('form').find('input#sc_iconboxcolor').val();
			var position = $('#'+id).parent('form').find('select#sc_iconboxposition').val();
			var headline = $('#'+id).parent('form').find('input#sc_iconboxheadline').val();
			var text = $('#'+id).parent('form').find('textarea#sc_iconboxtext').val();
			
			var animation = $('#'+id).parent('form').find('select#sc_iconboxanimation').val();
			
			animationoption = '';
			if (animation !== 'false') {
				var animtype = $('#'+id).parent('form').find('select#sc_iconboxanimation').val();
				var delay = $('#'+id).parent('form').find('input#sc_iconboxanimationdelay').val();
				animationoption = 'animation="'+animtype+'" delay="'+delay+'"';
			} 
			
			output = '[iconbox icon="'+type+'" color="'+color+'" position="'+position+'" '+animationoption+']<h5><strong>'+headline+'</strong></h5><p>'+text+'</p>[/iconbox]';
			
		}
		// ---------------------- ICONBOX
		
		
		
		
		// ---------------------- TOGGLE
		if (id == 'insert_toggle') {
			
			var title = $('#'+id).parent('form').find('input#sc_toggletitle').val();
			var size = $('#'+id).parent('form').find('select#sc_togglesize').val();
			var aopen = $('#'+id).parent('form').find('select#sc_toggleopen').val();
			var text = $('#'+id).parent('form').find('textarea#sc_toggletext').val();
			output = '[toggle title="'+title+'" size='+size+' open='+aopen+']'+text+'[/toggle]';
			
		}
		// ---------------------- TOGGLE
		
		
		
		// ---------------------- COUNTER
		if (id == 'insert_counter') {
			
			var from = $('#'+id).parent('form').find('input#sc_countfrom').val();
			var to = $('#'+id).parent('form').find('input#sc_countto').val();
			var speed = $('#'+id).parent('form').find('input#sc_countspeed').val();
			var name = $('#'+id).parent('form').find('input#sc_countsub').val();
			output = '[counter from="'+from+'" to='+to+' speed='+speed+' sub="'+name+'"]';
			
		}
		// ---------------------- COUNTER
		
		
		
		// ---------------------- TABS
		if (id == 'insert_tab') {
			
			$('#'+id).parent('form').find('.group').each(function(index) {					
					var tab_name = jQuery(this).find('input#sc_tabname').val();
					var tab_text = jQuery(this).find('textarea#sc_tabtext').val();
					outputbefore += tab_name+',';
					output += '[tab id="'+(index+1)+'"]'+tab_text+'[/tab]';
			});
			
			output = '[tabs title="'+outputbefore+'"]'+output+'[/tabs]';
		}
		// ---------------------- TABS
		
		
		
		// ---------------------- QUOTE SLIDER
		if (id == 'insert_quote') {
			
			$('#'+id).parent('form').find('.group').each(function(index) {					
					var quote_name = jQuery(this).find('input#sc_quotename').val();
					var quote_sub = jQuery(this).find('input#sc_quotesub').val();
					var quote_text = jQuery(this).find('textarea#sc_quotetext').val();
					output += '[quote name="'+quote_name+'" sub="'+quote_sub+'"]'+quote_text+'[/quote]';
			});
			
			output = '[quoteslider]'+output+'[/quoteslider]';
		}
		// ---------------------- QUOTE SLIDER
		
		
		// ---------------------- ACCORDION
		if (id == 'insert_accordion') {
			
			$('#'+id).parent('form').find('.group').each(function(index) {					
					var accordion_open = jQuery(this).find('select#sc_accordionopen').val();
					var accordion_name = jQuery(this).find('input#sc_accordiontitle').val();
					var accordion_text = jQuery(this).find('textarea#sc_accordiontext').val();
					output += '[accordion title="'+accordion_name+'" open="'+accordion_open+'"]'+accordion_text+'[/accordion]';
			});
			
			output = '[accordiongroup]'+output+'[/accordiongroup]';
		}
		// ---------------------- ACCORDION
		
		
		
		// ---------------------- GALLERY
		if (id == 'insert_gallery') {
			
			var type = $('#'+id).parent('form').find('select#sc_gallerytype').val();
			var cols = $('#'+id).parent('form').find('select#sc_gallerycolumns').val();
			var fullw = $('#'+id).parent('form').find('select#sc_galleryfullwidth').val();
			
			var bulletsS = $('#'+id).parent('form').find('select#sc_sliderbullets').val();
			var arrowsS = $('#'+id).parent('form').find('select#sc_sliderarrows').val();
			
			var sizeM = $('#'+id).parent('form').find('select#sc_masonrysize').val();
			var fullwM = $('#'+id).parent('form').find('select#sc_masonryfullwidth').val();
			
			var images = $('#'+id).parent('form').find('textarea#sc_galleryimages').val();
			var lightbox = $('#'+id).parent('form').find('select#sc_gallerylightbox').val();
			
			var outputAdd = '';
			if (type == 'gallery') { outputAdd = 	'columns="'+cols+'" fullwidth="'+fullw+'" crop="yes"'; } 
			if (type == 'slider') { outputAdd = 	'bullets="'+bulletsS+'" arrows="'+arrowsS+'"'; } 
			if (type == 'masonry') { outputAdd = 	'size="'+sizeM+'" fullwidth="'+fullwM+'"'; } 
			
			output = '[sr_gallery type="'+type+'" lightbox="'+lightbox+'" '+outputAdd+']'+images+'[/sr_gallery]';
			
		}
		// ---------------------- GALLERY
		
		
		
		
		// ---------------------- CAROUSEL
		if (id == 'insert_carousel') {
			
			var images = $('#'+id).parent('form').find('textarea#sc_carouselimages').val();
			var items = $('#'+id).parent('form').find('select#sc_carouselitems').val();
			var pagination = $('#'+id).parent('form').find('select#sc_carouselpagination').val();
			var autoplay = $('#'+id).parent('form').find('select#sc_carouselautoplay').val();
			
			images = images.replace(/sr_gitem/g, "sr_citem");			
			output = '[sr_carousel items="'+items+'" pagination="'+pagination+'" autoplay="'+autoplay+'"]'+images+'[/sr_carousel]';
			
		}
		// ---------------------- CAROUSEL
		
	
		
		
		// ---------------------- SPACER
		if (id == 'insert_spacer') {
			
			var size = $('#'+id).parent('form').find('select#sc_spacersize').val();
			
			output = '[spacer size="'+size+'"]';
			
		}
		// ---------------------- SPACER
		
						
		
		// ---------------------- HORIZONTAL SECTION
		if (id == 'insert_horizontalsection') {
			
			var bg = $('#'+id).parent('form').find('select#sc_horizontalsectionbg').val();

			if (bg == 'color') {
				var color = $('#'+id).parent('form').find('input#sc_horizontalsection_bgcolor_color').val();
				var sc_name = 'horizontalsection';
				var sc_options = 'color="'+color+'"';
			} else if (bg == 'image') {
				var image = $('#'+id).parent('form').find('input#sc_horizontalsection_bgimage_image').val();
				var parallax = $('#'+id).parent('form').find('select#sc_horizontalsection_bgimage_parallax').val();
				var overlay = $('#'+id).parent('form').find('input#sc_horizontalsection_bgimage_overlaycolor').val();
				var overlayopacity = $('#'+id).parent('form').find('select#sc_horizontalsection_bgimage_opacity').val();
				var sc_name = 'horizontalsection-image';
				var sc_options = 'image="'+image+'" parallax="'+parallax+'" overlay="'+overlay+'" overlayopacity="'+overlayopacity+'"';
			} else if (bg == 'video') {
				var mp4 = $('#'+id).parent('form').find('input#sc_horizontalsection_video_mp4').val();
				var webm = $('#'+id).parent('form').find('input#sc_horizontalsection_video_webm').val();
				var ogv = $('#'+id).parent('form').find('input#sc_horizontalsection_video_ogv').val();
				var width = $('#'+id).parent('form').find('input#sc_horizontalsection_video_width').val();
				var height = $('#'+id).parent('form').find('input#sc_horizontalsection_video_height').val();
				var poster = $('#'+id).parent('form').find('input#sc_horizontalsection_video_poster').val();
				var parallax = $('#'+id).parent('form').find('select#sc_horizontalsection_video_parallax').val();
				var overlay = $('#'+id).parent('form').find('input#sc_horizontalsection_video_overlaycolor').val();
				var overlayopacity = $('#'+id).parent('form').find('select#sc_horizontalsection_video_opacity').val();
				var sc_name = 'horizontalsection-video';
				var sc_options = 'mp4="'+mp4+'" webm="'+webm+'" ogv="'+ogv+'" width="'+width+'" height="'+height+'" poster="'+poster+'" parallax="'+parallax+'" overlay="'+overlay+'" overlayopacity="'+overlayopacity+'"';
			}
			
			var textcolor = $('#'+id).parent('form').find('select#sc_horizontalsectiontextcolor').val();
			var pdtop = $('#'+id).parent('form').find('input#sc_horizontalsectionpdtop').val();
			var pdbottom = $('#'+id).parent('form').find('input#sc_horizontalsectionpdbottom').val();
			
			output = '['+sc_name+' '+sc_options+' textcolor="'+textcolor+'" pdtop="'+pdtop+'" pdbottom="'+pdbottom+'"][/'+sc_name+']';
			
		}
		// ---------------------- HORIZONTAL SECTION
		
		
		
		// ---------------------- MAP
		if (id == 'insert_map') {
			
			var latlong = $('#'+id).parent('form').find('input#sc_maplatlong').val();
			var text = $('#'+id).parent('form').find('textarea#sc_maptext').val();
			var icon = $('#'+id).parent('form').find('input#sc_mapicon').val();
			var height = $('#'+id).parent('form').find('input#sc_mapheight').val();
			var color = $('#'+id).parent('form').find('select#sc_mapcolor').val();
			var fullwidth = $('#'+id).parent('form').find('select#sc_mapwidth').val();

			output = '[googlemap latlong="'+latlong+'" icon="'+icon+'" color="'+color+'" fullwidth="'+fullwidth+'" style="height:'+height+'px;"]'+text+'[/googlemap]';
			
		}
		// ---------------------- MAP
		
		
		
		// ---------------------- DEVIDER
		if (id == 'insert_devider') {
			
			var size = $('#'+id).parent('form').find('select#sc_devidersize').val();
			var align = $('#'+id).parent('form').find('select#sc_devideralign').val();

			output = '[separator size="'+size+'" align="'+align+'"]';
			
		}
		// ---------------------- DEVIDER
		
		
		
		
		// ---------------------- SECTION TITLE
		if (id == 'insert_sectiontitle') {
			
			var type = $('#'+id).parent('form').find('select#sc_sectiontitle_type').val();
			var main = $('#'+id).parent('form').find('input#sc_sectiontitle_main').val();
			var size = $('#'+id).parent('form').find('select#sc_sectiontitle_mainsize').val();
			var style = $('#'+id).parent('form').find('select#sc_sectiontitle_style').val();
			var bLetter = $('#'+id).parent('form').find('input#sc_sectiontitle_bigletter').val();
			var alignment = $('#'+id).parent('form').find('select#sc_sectiontitle_alignment').val();

			output = '[title type="'+type+'" size="'+size+'" style="'+style+'" bigletter="'+bLetter+'" alignment="'+alignment+'"]'+main+'[/title]';
			
		}
		// ---------------------- SECTION TITLE
		

		
		
		// ---------------------- TEAM
		if (id == 'insert_team') {
						
			var type = $('#'+id).parent('form').find('select#sc_teamtype').val();
			var layout = $('#'+id).parent('form').find('input[name="sc_teamlayout"]:checked').val();
			var count = $('#'+id).parent('form').find('select#sc_teamcount').val();
			
			if (type == 'column') {			
				if (layout == 'layout_onehalf-onehalf') {
					var ar = ["one", "two"];	
					var tWidth = "one-half";	
				} else if (layout == 'layout_onethird-onethird-onethird') {
					var ar = ["one","two","three"];	
					var tWidth = "one-third";	
				} else if (layout == 'layout_onefourth-onefourth-onefourth-onefourth') {
					var ar = ["one","two","three","four"];	
					var tWidth = "one-fourth";	
				}
			} else if (type == 'list') { 
				if (count == '1') {
					var ar = ["one"];	
				} else if (count == '2') {
					var ar = ["one", "two"];	
				} else if (count == '3') {
					var ar = ["one","two","three"];	
				} else if (count == '4') {
					var ar = ["one","two","three","four"];	
				}
			}
			output = '';
			for (i = 0; i < ar.length; ++i) {
				var img = $('#'+id).parent('form').find('input#sc_teamimage_'+ar[i]).val();
				var name = $('#'+id).parent('form').find('input#sc_teamname_'+ar[i]).val();
				var title = $('#'+id).parent('form').find('input#sc_teamtitle_'+ar[i]).val();
				var text = $('#'+id).parent('form').find('textarea#sc_teamtext_'+ar[i]).val();
				var facebook = $('#'+id).parent('form').find('input#sc_teamfacebook_'+ar[i]).val();
				var twitter = $('#'+id).parent('form').find('input#sc_teamtwitter_'+ar[i]).val();
				var google = $('#'+id).parent('form').find('input#sc_teamgoogle_'+ar[i]).val();
				var linkedin = $('#'+id).parent('form').find('input#sc_teamlinkedin_'+ar[i]).val();
				var website = $('#'+id).parent('form').find('input#sc_teamwebsite_'+ar[i]).val();
				var mail = $('#'+id).parent('form').find('input#sc_teammail_'+ar[i]).val();
			
				if (type == 'column') {
					if (i+1 == ar.length) { lastC = 'last-col'; } else { lastC = ''; }
					output +='[team_member name="'+name+'" title="'+title+'" img="'+img+'" fb="'+facebook+'" tw="'+twitter+'" gl="'+google+'" li="'+linkedin+'" www="'+website+'" mail="'+mail+'" width="'+tWidth+'" last="'+lastC+'"]'+text+'[/team_member]';
				} else if (type == 'list') {
					if (i == 0 || i == 2) { tPos = 'left'; } else { tPos = 'right'; }
					output +='[team_list name="'+name+'" title="'+title+'" img="'+img+'" fb="'+facebook+'" tw="'+twitter+'" gl="'+google+'" li="'+linkedin+'" www="'+website+'" mail="'+mail+'" pos="'+tPos+'" ]'+text+'[/team_list]';
				}
			}
			
			if (type == 'column') {
				output = '[column_row]'+output+'[/column_row]';
			}
		}
		// ---------------------- TEAM
		
		
		
		// ---------------------- WRAPPER SMALL
		if (id == 'insert_wrapper') {
			
			output = '[wrapper_small][/wrapper_small]';
			
		}
		// ---------------------- WRAPPER SMALL
	
				
		return output;
		
	}
	
    
});


