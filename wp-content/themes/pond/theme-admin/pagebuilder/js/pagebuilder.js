jQuery(function(jQuery) {  
  	
	// CHECK IF ACTIVE
	if (jQuery( "._sr_pagebuilder_active").val() == 'yes') {
		// hide editor + show builder
		jQuery("#postdivrich").addClass("sr-hide");		
	}
	jQuery("#sr-pagebuilder").on("click", '.sr-disable-pagebuilder', function() {
		jQuery("#postdivrich").removeClass("sr-hide");
		jQuery("#sr-pagebuilder").removeClass("active");
		jQuery("._sr_pagebuilder_active").val("");
       	tinymce.get("content").setContent("");
		return false;
	});
	jQuery("#sr-pagebuilder").on("click", '.sr-enable-pagebuilder', function() {
		jQuery("#postdivrich").addClass("sr-hide");
		jQuery("#sr-pagebuilder").addClass("active");
		jQuery("._sr_pagebuilder_active").val("yes");
		updatePageBuilder();	
	});
	
	
	
	/* Open Popup Elements Choose */
	jQuery( "#sr-pagebuilder").on("click", '.sr-open-popup-elements', function() {
		jQuery("#sr-pagebuilder-popup-bg").fadeIn(200);
		jQuery("#sr-pagebuilder-popup-elements").fadeIn(200);
		return false;
	});
	/* Open Popup Options */
	jQuery(".sr-pagebuilder-options").on("click", 'a', function() {
		var href = jQuery(this).attr("href");
		jQuery("#sr-pagebuilder-popup-elements").fadeOut(200);
		jQuery(href).removeClass("edit-mode");
		jQuery(href).fadeIn(200);
		
		/* Bug when opening the text editor */
		tinymce.get("builder_sr_text_content").focus();
		tinymce.activeEditor.setContent('');
		
		return false;
	});
	/* Close Popup (General) */
	jQuery( ".sr-pagebuilder-popup").on("click", '.close-popup', function() {
		jQuery("#sr-pagebuilder-popup-bg").fadeOut(200);
		jQuery(".sr-pagebuilder-popup").fadeOut(200);
		return false;
	});
	
	
	
	/* Open edit tinymce popup */
	var tmpContentEdit = false;
	jQuery('#sr-pagebuilder-visual').on('click',".open-text",function( event ) {
		var val = jQuery(this).siblings("textarea.content").val();		
		tmpContentEdit = jQuery(this).siblings("textarea.content");
		tinymce.get("_sr_buildereditor").focus();
       	tinymce.activeEditor.setContent(val);
		jQuery("#sr-pagebuilder-popup-bg").fadeIn(200);
		jQuery("#sr-pagebuilder-popup-tinymce").fadeIn(200);		
		return false;
	});
	/* Update edit content popup */
	jQuery('.update-content').click(function() {	
		var newContent = tinymce.activeEditor.getContent();
		tmpContentEdit.val(newContent);
		jQuery("#sr-pagebuilder-popup-bg").fadeOut(200);
		jQuery(".sr-pagebuilder-popup").fadeOut(200);
		updatePageBuilder();
		
		// BUG - Reset the visual tab 
		var is_visual_active = (typeof tinyMCE != "undefined") && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden();
		if (!is_visual_active) {
			jQuery("#wp-_sr_buildereditor-wrap .switch-tmce").trigger("click");	
		}
		
		return false;
	});
	/* Delete section */
	jQuery('#sr-pagebuilder-visual').on('click',".delete",function( event ) {
		jQuery(this).parents(".visualsection").remove();
		updatePageBuilder();
		return false;
	});
	/* Edit section */
	jQuery('#sr-pagebuilder-visual').on('click',".edit",function( event ) {
		var jsonContent = jQuery(this).parent(".title-bar").siblings("textarea.json").val();
		openEdit(jQuery(this).attr("href"),jsonContent,jQuery(this).parents(".visualsection"));
		return false;
	});
	
	
	
	
	
	
	
	/*	**********************************
	
		---------------------------------	
		OPEN EDIT SECTION
		---------------------------------	
		
	/*	**********************************/
	var tmpSectionEdit = false;
	function openEdit(element,json,visual) {
		tmpSectionEdit = visual;
		if (json.indexOf("***SPLITLEFT***") >= 0) { 
			var jsonLeft = jQuery(visual).find(".json-left").val(); 
			var jsonRight = jQuery(visual).find(".json-right").val();
			json = json.replace("***SPLITLEFT***", jsonLeft);
			json = json.replace("***SPLITRIGHT***", jsonRight); 
		}
		var json = jQuery.parseJSON( json );
		
			
		if (json.shortcode == 'spacer' || json.shortcode == 'horizontalsection' || json.shortcode == 'text') {
			jQuery('.builder_sr_'+json.shortcode+'_subname').val(json.subname);
			jQuery.each(json.options, function(i, o) {
				if (o.oName !== 'content') { jQuery('.builder_sr_'+json.shortcode+'_'+o.oName).val(o.oVal).change(); }
			});
			
			if (json.shortcode == 'text') {
				var val = visual.find("textarea.content").val();	
				tinymce.get("builder_sr_text_content").focus();
				tinymce.activeEditor.setContent(val);
			}
		} else if (json.shortcode == 'splitsection') {
			jQuery('.builder_sr_'+json.shortcode+'_size').val(json.size);
			if (!json.order) { var tmpOrder = 'left'; } else { var tmpOrder = json.order; }
			jQuery('.builder_sr_'+json.shortcode+'_order').val(tmpOrder);
			jQuery.each(json.optionsleft, function(i, o) {
				if (o.oName !== 'content') { jQuery('.builder_sr_'+json.shortcode+'_left_'+o.oName).val(o.oVal).change(); }
			});
			jQuery.each(json.optionsright, function(i, o) {
				if (o.oName !== 'content') { jQuery('.builder_sr_'+json.shortcode+'_right_'+o.oName).val(o.oVal).change(); }
			});
		}
		
		jQuery(element).addClass("edit-mode");
		jQuery(element).fadeIn(200);
		jQuery("#sr-pagebuilder-popup-bg").fadeIn(200);	
	}
	
	jQuery('.edit-builder').click(function() {
		var builderElement = getBuilderElement(jQuery(this).attr('id'));
		jQuery(tmpSectionEdit).replaceWith(builderElement);
		jQuery("#sr-pagebuilder-popup-bg").fadeOut(200);
		jQuery(".sr-pagebuilder-popup-option").fadeOut(200);
		updatePageBuilder();
		tmpSectionEdit = false;
		return false;
	});
	/*	**********************************
	
		---------------------------------	
		OPEN EDIT SECTION
		---------------------------------	
		
	/*	**********************************/
	
	
	
	
	
	
	
	/*	**********************************
	
		---------------------------------	
		UPDATE PAGE BUILDER VAL
		---------------------------------	
		
	/*	**********************************/
	
		function updatePageBuilder() {
			var pbVal = '';
			var addToNext = '';
			jQuery("#sr-pagebuilder-visual textarea.shortcode").each(function(index, element) {
                var thisShortcode = jQuery(this).val();
                var thisContent = jQuery(this).siblings("textarea.content").val();
				
                var thisSite = jQuery(this).siblings("textarea.content").data("site");
                var thisOrder = jQuery(this).siblings("textarea.content").data("order");
				if (thisSite == 'left' && thisOrder == 'right') { 
					if (thisShortcode.indexOf("***CONTENT***") >= 0) {addToNext = thisShortcode.replace("***CONTENT***", thisContent);}else{addToNext = thisShortcode;}
				} else {
					if (thisShortcode.indexOf("***CONTENT***") >= 0) { pbVal += thisShortcode.replace("***CONTENT***", thisContent); } else { pbVal += thisShortcode; }
					if (addToNext !== '') { pbVal += addToNext; addToNext = ''; }
				}
            });
			jQuery("textarea#_sr_pagebuilder").val(pbVal);
       		tinymce.get("content").setContent(pbVal);
			
			var pbJson = '{"section":[';
			jQuery("#sr-pagebuilder-visual textarea.json").each(function(index, element) {
                
				if (!jQuery(this).hasClass("json-left") && !jQuery(this).hasClass("json-right")) {
					var thisJson = jQuery(this).val();
					if (jQuery(this).siblings("textarea.content").length > 0) {
						var thisContent = jQuery(this).siblings("textarea.content").val();
						thisContent = JSON.stringify(thisContent);		thisContent = thisContent.substring(1, thisContent.length-1);
					} else if (jQuery(this).hasClass("json-split")) {
						// SPLIT
						var jsonLeft = jQuery(this).siblings(".split-section").find(".json-left").val();
						var leftContent = jQuery(this).siblings(".split-section").find(".json-left").siblings("textarea.content").val();
						leftContent = JSON.stringify(leftContent); 		leftContent = leftContent.substring(1, leftContent.length-1);
						jsonLeft = jsonLeft.replace("***CONTENT***", leftContent);
						var jsonRight = jQuery(this).siblings(".split-section").find(".json-right").val();
						var rightContent = jQuery(this).siblings(".split-section").find(".json-right").siblings("textarea.content").val();
						rightContent = JSON.stringify(rightContent); 		rightContent = rightContent.substring(1, rightContent.length-1);
						jsonRight = jsonRight.replace("***CONTENT***", rightContent);
						thisJson = thisJson.replace("***SPLITLEFT***", jsonLeft);
						thisJson = thisJson.replace("***SPLITRIGHT***", jsonRight);
					}
					if (index > 0) { pbJson += ','; }
					if (thisJson.indexOf("***CONTENT***") >= 0) { pbJson += thisJson.replace("***CONTENT***", thisContent); } else { pbJson += thisJson; }
				}
            });
			pbJson += ']}';
			if (pbJson == '{"section":[]}') { pbJson = ''; }
			jQuery("textarea#_sr_pagebuilder_json").val(pbJson);
		}
	
	/*	**********************************
	
		---------------------------------	
		UPDATE PAGE BUILDER VAL
		---------------------------------	
		
	/*	**********************************/
	
	
	
	
	
	
	
	
	/*	**********************************
	
		---------------------------------	
		CLICK INSERT PAGE BUILDER ELEMENT
		---------------------------------	
		
	/*	**********************************/
	
	jQuery('.submit-builder').click(function() {	
		var builderElement = getBuilderElement(jQuery(this).attr('id'));
		jQuery("#sr-pagebuilder-visual").append(builderElement);
		jQuery("#sr-pagebuilder-popup-bg").fadeOut(200);
		jQuery(".sr-pagebuilder-popup-option").fadeOut(200);
		updatePageBuilder();
		return false;
	});
	
	
	// GET BUILDER ELEMENT FUNCTION
	function getBuilderElement(id) {
		
		var shortcodeEl = ''; 
		var visualEl = ''; 
		var jsonEl = ''; 
		
		// ---------------------- HORIZONTAL SECTION
		if (id == 'insertbuilder_horizontalsection' || id == 'editbuilder_horizontalsection') {
						
			var hzName =  jQuery('input[name="builder_sr_horizontalsection_subname"]').val();
			var hzBg =  jQuery('select[name="builder_sr_horizontalsection_background"]').val();
			var hzTextColor = jQuery('select[name="builder_sr_horizontalsection_textcolor"]').val();
			var hzPdtop = jQuery('input[name="builder_sr_horizontalsection_pdtop"]').val();
			var hzPdbottom = jQuery('input[name="builder_sr_horizontalsection_pdbottom"]').val();
			
			var subName = hzBg+' background'; if (hzName !== '') { subName = hzName; }
			
			jsonEl += '{"shortcode":"horizontalsection","name":"Horizontal Section","subname":"'+subName+'",';
			if (hzBg == 'color') {
				var hzBgColor = jQuery('input[name="builder_sr_horizontalsection_colorbg"]').val();
				shortcodeEl += '[horizontalsection background="'+hzBg+'" colorbg="'+hzBgColor+'" textcolor="'+hzTextColor+'" pdtop="'+hzPdtop+'" pdbottom="'+hzPdbottom+'"]***CONTENT***[/horizontalsection]';
				
				jsonEl += '"options":[{"oName":"background","oVal":"'+hzBg+'"},{"oName":"colorbg","oVal":"'+hzBgColor+'"},{"oName":"textcolor","oVal":"'+hzTextColor+'"},{"oName":"pdtop","oVal":"'+hzPdtop+'"},{"oName":"pdbottom","oVal":"'+hzPdbottom+'"},';
				
			} else if (hzBg == 'image') {
				var hzImageBg = jQuery('input[name="builder_sr_horizontalsection_imagebg"]').val();
				var hzImageParallax = jQuery('select[name="builder_sr_horizontalsection_imageparallax"]').val();
				shortcodeEl += '[horizontalsection background="'+hzBg+'" imagebg="'+hzImageBg+'" imageparallax="'+hzImageParallax+'" textcolor="'+hzTextColor+'" pdtop="'+hzPdtop+'" pdbottom="'+hzPdbottom+'"]***CONTENT***[/horizontalsection]';
				
				jsonEl += '"options":[{"oName":"background","oVal":"'+hzBg+'"},{"oName":"imagebg","oVal":"'+hzImageBg+'"},{"oName":"imageparallax","oVal":"'+hzImageParallax+'"},{"oName":"textcolor","oVal":"'+hzTextColor+'"},{"oName":"pdtop","oVal":"'+hzPdtop+'"},{"oName":"pdbottom","oVal":"'+hzPdbottom+'"},';
				
			} else if (hzBg == 'video') {
				var hzVideoMp4 = jQuery('input[name="builder_sr_horizontalsection_videomp4"]').val();
				var hzVideoWebm = jQuery('input[name="builder_sr_horizontalsection_videowebm"]').val();
				var hzVideoOgv = jQuery('input[name="builder_sr_horizontalsection_videoogv"]').val();
				var hzVideoWidth = jQuery('input[name="builder_sr_horizontalsection_videowidth"]').val();
				var hzVideoHeight = jQuery('input[name="builder_sr_horizontalsection_videoheight"]').val();
				var hzVideoPoster = jQuery('input[name="builder_sr_horizontalsection_videoposter"]').val();
				var hzVideoParallax = jQuery('select[name="builder_sr_horizontalsection_videoparallax"]').val();
				var hzVideoOColor = jQuery('input[name="builder_sr_horizontalsection_videooverlaycolor"]').val();
				var hzVideoOOpacity = jQuery('select[name="builder_sr_horizontalsection_videooverlayopacity"]').val();

				shortcodeEl += '[horizontalsection background="'+hzBg+'" videomp4="'+hzVideoMp4+'" videowebm="'+hzVideoWebm+'" videoogv="'+hzVideoOgv+'" videowidth="'+hzVideoWidth+'" videoheight="'+hzVideoHeight+'" videoposter="'+hzVideoPoster+'" videoparallax="'+hzVideoParallax+'" videooverlay="'+hzVideoOColor+'" videooverlayopacity="'+hzVideoOOpacity+'" textcolor="'+hzTextColor+'" pdtop="'+hzPdtop+'" pdbottom="'+hzPdbottom+'"]***CONTENT***[/horizontalsection]';
				
				jsonEl += '"options":[{"oName":"background","oVal":"'+hzBg+'"},{"oName":"videomp4","oVal":"'+hzVideoMp4+'"},{"oName":"videowebm","oVal":"'+hzVideoWebm+'"},{"oName":"videoogv","oVal":"'+hzVideoOgv+'"},{"oName":"videowidth","oVal":"'+hzVideoWidth+'"},{"oName":"videoheight","oVal":"'+hzVideoHeight+'"},{"oName":"videoposter","oVal":"'+hzVideoPoster+'"},{"oName":"videoparallax","oVal":"'+hzVideoParallax+'"},{"oName":"videooverlay","oVal":"'+hzVideoOColor+'"},{"oName":"videooverlayopacity","oVal":"'+hzVideoOOpacity+'"},{"oName":"textcolor","oVal":"'+hzTextColor+'"},{"oName":"pdtop","oVal":"'+hzPdtop+'"},{"oName":"pdbottom","oVal":"'+hzPdbottom+'"},';
				
			}
			jsonEl += '{"oName":"content","oVal":"***CONTENT***"}]}';
			
			// Old content if edit mode
			var oldContent = '';
			if (tmpSectionEdit) { oldContent = tmpSectionEdit.find("textarea.content").val();	}
			// Old content if edit mode
			
			visualEl = '<div class="visualsection horizontalsection"><div class="title-bar"><strong>Horizontal Section</strong> <span>('+subName+')</span><a href="#" class="delete"></a><a href="#sr-pagebuilder-popup-horizontalsection" class="edit">edit</a></div><textarea class="shortcode">'+shortcodeEl+'</textarea><textarea class="content">'+oldContent+'</textarea><div class="hor-bg"></div><a href="#" class="open-text"><span></span>Edit Content</a><textarea class="json">'+jsonEl+'</textarea></div>'; 
			
			
		}
		// ---------------------- HORIZONTAL SECTION
		
		
		
		
		
		// ---------------------- SPLIT SECTION
		else if (id == 'insertbuilder_splitsection' || id == 'editbuilder_splitsection') {
			
			var splitSize =  jQuery('select[name="builder_sr_splitsection_size"]').val();
			if (splitSize == 'split-half/split-half') { var leftSize = 'split-half'; var rightSize = 'split-half'; }
			else if (splitSize == 'split-onethird/split-twothird') { var leftSize = 'split-onethird'; var rightSize = 'split-twothird'; }
			else if (splitSize == 'split-twothird/split-onethird') { var leftSize = 'split-twothird'; var rightSize = 'split-onethird'; }
			var splitOrder =  jQuery('select[name="builder_sr_splitsection_order"]').val();
			if (splitOrder == 'left') { var leftOrder = 'first'; var rightOrder = 'last'; } else { var leftOrder = 'last'; var rightOrder = 'first'; }
			
			// left			
			var leftBg =  jQuery('select[name="builder_sr_splitsection_left_background"]').val();
			var leftName =  jQuery('input[name="builder_sr_splitsection_left_subname"]').val();
			var leftSubName = leftBg+' background'; if (leftName !== '') { leftSubName = leftName; }
			var leftTextColor =  jQuery('select[name="builder_sr_splitsection_left_textcolor"]').val();
			var leftCSize =  jQuery('select[name="builder_sr_splitsection_left_csize"]').val();
			var leftVAlign =  jQuery('select[name="builder_sr_splitsection_left_valign"]').val();
			
			if (leftBg == 'map') { leftTextColor = 'text-dark' }
			var jsonLeft = '[{"oName":"background","oVal":"'+leftBg+'"},{"oName":"subname","oVal":"'+leftSubName+'"},{"oName":"textcolor","oVal":"'+leftTextColor+'"},{"oName":"size","oVal":"'+leftSize+'"},{"oName":"order","oVal":"'+leftOrder+'"},{"oName":"csize","oVal":"'+leftCSize+'"},{"oName":"valign","oVal":"'+leftVAlign+'"}';
				if (leftBg == 'false') {
					var leftShortcodeEl = '[splitsection position="left" order="'+splitOrder+'" size="'+leftSize+'" csize="'+leftCSize+'" valign="'+leftVAlign+'"]***CONTENT***[/splitsection]';				
				} else if (leftBg == 'color') {
					var leftBgColor = jQuery('input[name="builder_sr_splitsection_left_colorbg"]').val();
					var leftShortcodeEl = '[splitsection position="left" order="'+splitOrder+'" size="'+leftSize+'" background="'+leftBg+'" colorbg="'+leftBgColor+'" textcolor="'+leftTextColor+'" csize="'+leftCSize+'" valign="'+leftVAlign+'"]***CONTENT***[/splitsection]';
					jsonLeft += ',{"oName":"colorbg","oVal":"'+leftBgColor+'"}';
				} else if (leftBg == 'image') {
					var leftImageBg = jQuery('input[name="builder_sr_splitsection_left_imagebg"]').val();
					var leftImageParallax = jQuery('select[name="builder_sr_splitsection_left_imageparallax"]').val();
					var leftShortcodeEl = '[splitsection position="left" order="'+splitOrder+'" size="'+leftSize+'" background="'+leftBg+'" imagebg="'+leftImageBg+'" imageparallax="'+leftImageParallax+'" textcolor="'+leftTextColor+'" csize="'+leftCSize+'" valign="'+leftVAlign+'"]***CONTENT***[/splitsection]';
					jsonLeft += ',{"oName":"imagebg","oVal":"'+leftImageBg+'"},{"oName":"imageparallax","oVal":"'+leftImageParallax+'"}';
				} else if (leftBg == 'video') {
					var leftVideoMp4 = jQuery('input[name="builder_sr_splitsection_left_videomp4"]').val();
					var leftVideoWebm = jQuery('input[name="builder_sr_splitsection_left_videowebm"]').val();
					var leftVideoOgv = jQuery('input[name="builder_sr_splitsection_left_videoogv"]').val();
					var leftVideoWidth = jQuery('input[name="builder_sr_splitsection_left_videowidth"]').val();
					var leftVideoHeight = jQuery('input[name="builder_sr_splitsection_left_videoheight"]').val();
					var leftVideoPoster = jQuery('input[name="builder_sr_splitsection_left_videoposter"]').val();
					var leftVideoParallax = jQuery('select[name="builder_sr_splitsection_left_videoparallax"]').val();
					var leftVideoOColor = jQuery('input[name="builder_sr_splitsection_left_videooverlay"]').val();
					var leftVideoOOpacity = jQuery('select[name="builder_sr_splitsection_left_videooverlayopacity"]').val();
					var leftShortcodeEl = '[splitsection position="left" order="'+splitOrder+'" size="'+leftSize+'" background="'+leftBg+'" videomp4="'+leftVideoMp4+'" videowebm="'+leftVideoWebm+'" videoogv="'+leftVideoOgv+'" videowidth="'+leftVideoWidth+'" videoheight="'+leftVideoHeight+'" videoposter="'+leftVideoPoster+'" videoparallax="'+leftVideoParallax+'" videooverlay="'+leftVideoOColor+'" videooverlayopacity="'+leftVideoOOpacity+'" textcolor="'+leftTextColor+'" csize="'+leftCSize+'" valign="'+leftVAlign+'"]***CONTENT***[/splitsection]';
					jsonLeft += ',{"oName":"videomp4","oVal":"'+leftVideoMp4+'"},{"oName":"videowebm","oVal":"'+leftVideoWebm+'"},{"oName":"videoogv","oVal":"'+leftVideoOgv+'"},{"oName":"videowidth","oVal":"'+leftVideoWidth+'"},{"oName":"videoheight","oVal":"'+leftVideoHeight+'"},{"oName":"videoposter","oVal":"'+leftVideoPoster+'"},{"oName":"videoparallax","oVal":"'+leftVideoParallax+'"},{"oName":"videooverlay","oVal":"'+leftVideoOColor+'"},{"oName":"videooverlayopacity","oVal":"'+leftVideoOOpacity+'"}';
				} else if (leftBg == 'map') { 
					var leftLatLong = jQuery('input[name="builder_sr_splitsection_left_maplatlong"]').val();
					var leftMapIcon = jQuery('input[name="builder_sr_splitsection_left_mapicon"]').val();
					var leftMapColor = jQuery('select[name="builder_sr_splitsection_left_mapcolor"]').val();
					var leftShortcodeEl = '[splitsection position="left" order="'+splitOrder+'" size="'+leftSize+'" background="'+leftBg+'" maplatlong="'+leftLatLong+'" mapicon="'+leftMapIcon+'" mapcolor="'+leftMapColor+'" style="height:100%;min-height:300px;"]***CONTENT***[/splitsection]';
					jsonLeft+=',{"oName":"maplatlong","oVal":"'+leftLatLong+'"},{"oName":"mapicon","oVal":"'+leftMapIcon+'"},{"oName":"mapcolor","oVal":"'+leftMapColor+'"},{"oName":"style","oVal":"height:100%;min-height:300px;"}';
				}
			jsonLeft += ',{"oName":"content","oVal":"***CONTENT***"}]';
						
			// right
			var rightBg =  jQuery('select[name="builder_sr_splitsection_right_background"]').val();
			var rightName =  jQuery('input[name="builder_sr_splitsection_right_subname"]').val();
			var rightSubName = rightBg+' background'; if (rightName !== '') { rightSubName = rightName; }
			var rightTextColor =  jQuery('select[name="builder_sr_splitsection_right_textcolor"]').val();
			var rightCSize =  jQuery('select[name="builder_sr_splitsection_right_csize"]').val();
			var rightVAlign =  jQuery('select[name="builder_sr_splitsection_right_valign"]').val();
			
			if (rightBg == 'map') { rightTextColor = 'text-dark' }
			var jsonRight = '[{"oName":"background","oVal":"'+rightBg+'"},{"oName":"subname","oVal":"'+rightSubName+'"},{"oName":"textcolor","oVal":"'+rightTextColor+'"},{"oName":"size","oVal":"'+rightSize+'"},{"oName":"order","oVal":"'+rightOrder+'"},{"oName":"csize","oVal":"'+rightCSize+'"},{"oName":"valign","oVal":"'+rightVAlign+'"}';
				if (rightBg == 'false') {
					var rightShortcodeEl = '[splitsection position="right" order="'+splitOrder+'" size="'+rightSize+'" csize="'+rightCSize+'" valign="'+rightVAlign+'"]***CONTENT***[/splitsection]';				
				} else if (rightBg == 'color') {
					var rightBgColor = jQuery('input[name="builder_sr_splitsection_right_colorbg"]').val();
					var rightShortcodeEl = '[splitsection position="right" order="'+splitOrder+'" size="'+rightSize+'" background="'+rightBg+'" colorbg="'+rightBgColor+'" textcolor="'+rightTextColor+'" csize="'+rightCSize+'" valign="'+rightVAlign+'"]***CONTENT***[/splitsection]';
					jsonRight += ',{"oName":"colorbg","oVal":"'+rightBgColor+'"}';
				} else if (rightBg == 'image') {
					var rightImageBg = jQuery('input[name="builder_sr_splitsection_right_imagebg"]').val();
					var rightImageParallax = jQuery('select[name="builder_sr_splitsection_right_imageparallax"]').val();
					var rightShortcodeEl = '[splitsection position="right" order="'+splitOrder+'" size="'+rightSize+'" background="'+rightBg+'" imagebg="'+rightImageBg+'" imageparallax="'+rightImageParallax+'" textcolor="'+rightTextColor+'" csize="'+rightCSize+'" valign="'+rightVAlign+'"]***CONTENT***[/splitsection]';
					jsonRight += ',{"oName":"imagebg","oVal":"'+rightImageBg+'"},{"oName":"imageparallax","oVal":"'+rightImageParallax+'"}';
				} else if (rightBg == 'video') {
					var rightVideoMp4 = jQuery('input[name="builder_sr_splitsection_right_videomp4"]').val();
					var rightVideoWebm = jQuery('input[name="builder_sr_splitsection_right_videowebm"]').val();
					var rightVideoOgv = jQuery('input[name="builder_sr_splitsection_right_videoogv"]').val();
					var rightVideoWidth = jQuery('input[name="builder_sr_splitsection_right_videowidth"]').val();
					var rightVideoHeight = jQuery('input[name="builder_sr_splitsection_right_videoheight"]').val();
					var rightVideoPoster = jQuery('input[name="builder_sr_splitsection_right_videoposter"]').val();
					var rightVideoParallax = jQuery('select[name="builder_sr_splitsection_right_videoparallax"]').val();
					var rightVideoOColor = jQuery('input[name="builder_sr_splitsection_right_videooverlay"]').val();
					var rightVideoOOpacity = jQuery('select[name="builder_sr_splitsection_right_videooverlayopacity"]').val();
					var rightShortcodeEl = '[splitsection position="right" order="'+splitOrder+'" size="'+rightSize+'" background="'+rightBg+'" videomp4="'+rightVideoMp4+'" videowebm="'+rightVideoWebm+'" videoogv="'+rightVideoOgv+'" videowidth="'+rightVideoWidth+'" videoheight="'+rightVideoHeight+'" videoposter="'+rightVideoPoster+'" videoparallax="'+rightVideoParallax+'" videooverlay="'+rightVideoOColor+'" videooverlayopacity="'+rightVideoOOpacity+'" textcolor="'+rightTextColor+'" csize="'+rightCSize+'" valign="'+rightVAlign+'"]***CONTENT***[/splitsection]';
					jsonRight += ',{"oName":"videomp4","oVal":"'+rightVideoMp4+'"},{"oName":"videowebm","oVal":"'+rightVideoWebm+'"},{"oName":"videoogv","oVal":"'+rightVideoOgv+'"},{"oName":"videowidth","oVal":"'+rightVideoWidth+'"},{"oName":"videoheight","oVal":"'+rightVideoHeight+'"},{"oName":"videoposter","oVal":"'+rightVideoPoster+'"},{"oName":"videoparallax","oVal":"'+rightVideoParallax+'"},{"oName":"videooverlay","oVal":"'+rightVideoOColor+'"},{"oName":"videooverlayopacity","oVal":"'+rightVideoOOpacity+'"}';
				} else if (rightBg == 'map') { 
					var rightLatLong = jQuery('input[name="builder_sr_splitsection_right_maplatlong"]').val();
					var rightMapIcon = jQuery('input[name="builder_sr_splitsection_right_mapicon"]').val();
					var righMapColor = jQuery('select[name="builder_sr_splitsection_right_mapcolor"]').val();
					var rightShortcodeEl = '[splitsection position="right" order="'+splitOrder+'" size="'+rightSize+'" background="'+rightBg+'" maplatlong="'+rightLatLong+'" mapicon="'+rightMapIcon+'" mapcolor="'+righMapColor+'" style="height:100%;min-height:300px;"]***CONTENT***[/splitsection]';
					jsonRight+=',{"oName":"maplatlong","oVal":"'+rightLatLong+'"},{"oName":"mapicon","oVal":"'+rightMapIcon+'"},{"oName":"mapcolor","oVal":"'+righMapColor+'"},{"oName":"style","oVal":"height:100%;min-height:300px;"}';
				}
			jsonRight += ',{"oName":"content","oVal":"***CONTENT***"}]';
				
			jsonEl = '{"shortcode": "splitsection","name": "Split Section","subname": "","size":"'+splitSize+'","order":"'+splitOrder+'","optionsleft":***SPLITLEFT***,"optionsright":***SPLITRIGHT***}';
			
			// Old content if edit mode
			var oldContentLeft = '';
			var oldContentRight = '';
			if (tmpSectionEdit) { 
				oldContentLeft = tmpSectionEdit.find(".split-left textarea.content").val();	
				if (leftBg == 'map') { oldContentLeft = ''; }	
				oldContentRight = tmpSectionEdit.find(".split-right textarea.content").val();
				if (rightBg == 'map') { oldContentRight = ''; }	
			}
			// Old content if edit mode
							
			visualEl = '<div class="visualsection splitsection"><div class="title-bar"><strong>Split Section</strong><a href="#" class="delete"></a><a href="#sr-pagebuilder-popup-splitsection" class="edit">edit</a></div><textarea name="json" class="json json-split">'+jsonEl+'</textarea><div class="split-section"><div class="split-left '+leftSize+'"><span class="split-title">'+leftSubName+'</span><textarea class="shortcode">'+leftShortcodeEl+'</textarea><textarea class="content" data-site="left" data-order="'+splitOrder+'">'+oldContentLeft+'</textarea><a href="#" class="open-text"><span></span>Edit Content</a><textarea class="json json-left">'+jsonLeft+'</textarea></div><div class="split-right '+rightSize+'"><span class="split-title">'+rightSubName+'</span><textarea class="shortcode">'+rightShortcodeEl+'</textarea><textarea class="content" data-site="right" data-order="'+splitOrder+'">'+oldContentRight+'</textarea><a href="#" class="open-text"><span></span>Edit Content</a><textarea class="json json-right">'+jsonRight+'</textarea></div></div></div>';
			
		}
		// ---------------------- SPLIT SECTION
		
		
		
		
		// ---------------------- TEXT
		else if (id == 'insertbuilder_text' || id == 'editbuilder_text') {
			
			var textName =  jQuery('input[name="builder_sr_text_subname"]').val();
			var subName = 'blank content'; if (textName !== '') { subName = textName; }
			var textContent =  tinymce.get("builder_sr_text_content").getContent();
			shortcodeEl += '***CONTENT***';
			
			jsonEl += '{"shortcode":"text","name":"Text / Editor","subname":"'+subName+'","options":[{"oName":"content","oVal":"***CONTENT***"}]}';
			
			visualEl = '<div class="visualsection editor"><div class="title-bar"><strong>Text / Editor</strong> <span>('+subName+')</span><a href="#" class="delete"></a><a href="#sr-pagebuilder-popup-text" class="edit">edit</a></div><textarea class="shortcode">'+shortcodeEl+'</textarea><textarea class="content">'+textContent+'</textarea><a href="#" class="open-text"><span></span>Edit Content</a><textarea class="json">'+jsonEl+'</textarea></div>'; 
			
		}
		// ---------------------- TEXT
		
		
		
		
		
		// ---------------------- SPACER
		else if (id == 'insertbuilder_spacer' || id == 'editbuilder_spacer') {
			
			var spacerSize =  jQuery('select[name="builder_sr_spacer_size"]').val();
			shortcodeEl += '[spacer size="'+spacerSize+'"]';
			
			jsonEl += '{"shortcode":"spacer","name":"Spacer","subname":"'+spacerSize+'","options":[{"oName":"size","oVal":"'+spacerSize+'"}]}';
			
			visualEl = '<div class="visualsection spacer"><div class="title-bar"><strong>Spacer</strong> <span>('+spacerSize+')</span><a href="#" class="delete"></a><a href="#sr-pagebuilder-popup-spacer" class="edit">edit</a></div><textarea class="shortcode">'+shortcodeEl+'</textarea><textarea class="json">'+jsonEl+'</textarea></div>'; 
						
		}
		// ---------------------- SPACER
		
		
		return visualEl;
		
	}
	// GET BUILDER ELEMENT FUNCTION
	
	/*	**********************************
	
		---------------------------------	
		CLICK INSERT PAGE BUILDER ELEMENT
		---------------------------------	
		
	/*	**********************************/
	
	
	
	
	// sortable
	jQuery( "#sr-pagebuilder-visual" ).sortable({
		revert: true,
		stop: function(event, ui) {  
			updatePageBuilder();		   
		}
	});
	
	
	
	
	
	/*	---------------------------------	
		RESTORE BUTTON
		--------------------------------- */
		jQuery("#sr-pagebuilder").on("click", '#restore-pagebuilder', function() {
			//alert("hello");
			jQuery('input[name="sr-pagebuilder-restore"]').val("true");
			jQuery('#publish').click();
			return false;
		});	
	/*	---------------------------------	
		RESTORE BUTTON
		--------------------------------- */	
	
	
	
});