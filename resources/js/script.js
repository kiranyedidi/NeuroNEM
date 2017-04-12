/**
 * 
 */

function login(){
	window.location = "login.php";
}

function logout(){
	window.location = "logout.php";
}

function downloadApplications(){
	window.location = "download_applications.php";
}

function downloadResumes(){
	window.location = "download_resumes.php";
}

function switchTabs(element){
	
	$('a[href="' + element +'"]').parent('li').addClass('active');
		$('a[href="' + element +'"]').parent('li').siblings('li').removeClass('active');
		
		$(''+element).addClass('active in');
		$(''+element).siblings('div').removeClass('active in');
		
		//setMinHeightOfContainer();
		
		window.scrollTo(0,150);
}

function copyLocalAddress(){
	if($('#perm_local_addresses_same').is(':checked'))
	{
		$('#perm_address').val($('#address').val());
		$('#perm_city').val($('#city').val());
		$('#perm_state').val($('#state').val());
		$('#perm_zip').val($('#zip').val());
		$('#perm_phone').val($('#phone').val());
	}
	else
	{
		$('#perm_address').val('');
		$('#perm_city').val('');
		$('#perm_state').val('');
		$('#perm_zip').val('');
		$('#perm_phone').val('');
	}
}

$(document).ready(function(){
	
	// adding calendars to date fields
	$('.full-date-picker').datepicker();
	
	// Setting the min height of the container
	setMinHeightOfContainer();
	
	// validation for not selecting the same rank for two or more projects
	$('table.projects input').click(function(){
		var index = parseInt($(this).val()) + 1;
		var element = $(this);
		$(this).parent('td').parent('tr').siblings('tr').each(function(){
			if($('td:nth-child('+index+') input',this).is(':checked')){
				$(element).removeAttr('checked');
			}
		});
	});
	
	// Fixing nav bar on the top
	
	$(window).scroll(function() {
		if($(window).scrollTop()>132){
			$('#navigation').addClass('fix_on_top');
			$('#latech_mentors').addClass("navigation_margin");
			$('#uab_mentors').addClass("navigation_margin");
			$('#uams_mentors').addClass("navigation_margin");
			$('#latech_projects').addClass("navigation_margin");
			$('#uab_projects').addClass("navigation_margin");
			$('#uams_projects').addClass("navigation_margin");
		}else{
			$('#navigation').removeClass('fix_on_top');
			$('#latech_mentors').removeClass("navigation_margin");
			$('#uab_mentors').removeClass("navigation_margin");
			$('#uams_mentors').removeClass("navigation_margin");
			$('#latech_projects').removeClass("navigation_margin");
			$('#uab_projects').removeClass("navigation_margin");
			$('#uams_projects').removeClass("navigation_margin");
		}	
	});
});

function setMinHeightOfContainer(){
	//$('.setminheight').css("min-height", "");
	var header_height = $('header').height();
	var body_height = $('body').height();
	//alert(body_height);
	var footer_height = $('footer').height();
	var container_min_height = body_height - footer_height - header_height - 40; // 40px is the padding of footer
	//alert(container_min_height);
	$('.setminheight').css("min-height", container_min_height+"px");
}

function validateForm(){
	var valid = true;
	var section_valid = true;
	
	// Personal Information
	$('#personal_information input:not([name="mother_education"], [name="father_education"], [name="mname"])').each(function(){
		if((($(this).attr("type")=="text"||$(this).attr("type")=="number"||$(this).attr("type")=="date") && $(this).val().trim()=="") || ($(this).attr("type")=="radio" && !$(this).is(":checked")) || ($(this).attr("type")=="email" && !isEmail($(this).val())))
		{
			// Once the valid variable is set to false, we should not change it, because if the later fields are valid, it will
			// set the valid to true and the form gets submitted. But we need else to highlight the fields in red.
			if(valid)
				valid = validateFields(this);
			else
				validateFields(this);
		}
		else
		{
			removeCss(this);
		}
	});
		
	if(!valid)
		switchTabs("#personal_information");
	section_valid = valid;
	// End of personal information
	
	// Academic information
	$('#academic_information input:not([name="current_classification_description"], [name="institution_type_description"])').each(function(){
		if((($(this).attr("type")=="text"||$(this).attr("type")=="date") && $(this).val().trim()=="") || ($(this).attr("type")=="radio" && !$(this).is(":checked"))){
			if(valid)
				valid = validateFields(this);
			else
				validateFields(this);
		}
		else
		{
			removeCss(this);
		}
	});
	
	// Verifying the text fields if Other radio button is selected
	var other_radio_buttons = Array("current_classification","institution_type");
	var other_text_fields = Array("current_classification_description","institution_type_description");
	
	for(var i=0; i<other_radio_buttons.length; i++)
	{
		if($('input[name="' + other_radio_buttons[i] + '"]:checked').val()==5 && $('#' + other_text_fields[i]).val().trim()=="")
		{
			$('#' + other_text_fields[i]).css("border","1px solid red");
			valid = false;
		}
		else
			$('#' + other_text_fields[i]).css("border","");
	}
	
	// Checking if the selected transcripts are selected and if it is PDF
	if($('#saved_transcripts').length==0 && ($('#transcripts').val().trim()=="" || $('#transcripts').val().split(/[\.]/)[1].toLowerCase()!="pdf"))
	{
		$('#transcripts').css("border","1px solid red");
		$('#transcripts_error').show();
		valid = false;
	}
	else
	{
		$('#transcripts').css("border","");
		$('#transcripts_error').hide();
	}
		
	
	if(!valid && section_valid)
		switchTabs("#academic_information");
	section_valid = valid;
	// End of academic information
	
	// REU program preferences
	$('#reu_program_preferences input').each(function(){
		if($(this).attr("type")=="radio" && !$(this).is(":checked")){
			if(valid)
				valid = validateFields(this);
			else
				validateFields(this);
		}
		else
		{
			removeCss(this);
		}
	});
	
	if(!valid && section_valid)
		switchTabs("#reu_program_preferences");
	section_valid = valid;
	// End of reu program preferences
	
	// Reference information
	$('#reference_information input').each(function(){
		if(($(this).attr("type")=="text" && $(this).val().trim()=="") || ($(this).attr("type")=="radio" && !$(this).is(":checked")) || ($(this).attr("type")=="email" && !isEmail($(this).val()))){
			if(valid)
				valid = validateFields(this);
			else
				validateFields(this);
		}
		else
		{
			removeCss(this);
		}
	});
	
	if(!valid && section_valid)
		switchTabs("#reference_information");
	section_valid = valid;
	// End of reference information
	
	// Essay
	if($('#essay_description').val().trim()==""){
		valid = false;
		$('#essay_description').css("border","1px solid red");
	}
	else
		$('#essay_description').css("border","");
	// End of essay
	
	if(!valid)
		alert("Please complete all the required fields highlighted in red before submitting the application.");
	
	return valid;
}

function validateFields(element){
	var valid = false;
	if($(element).attr("type")=="radio")
	{
		var name = $(element).attr('name');
		if(!($('input[name="' + name + '"]').is(':checked')))
		{
			$(element).addClass("styleRadio");
		}
		else
		{
			$(element).removeClass('styleRadio');
			valid = true;
		}
		/*$(element).addClass("styleRadio");
		// Need to check if the other radio buttons are checked.
		
		var currentElement = $(element);
		$('input[name="' + name + '"]').each(function(){
			if($(this).is(":checked"))
			{
				valid = true;
				$(currentElement).removeClass('styleRadio');
				return false;
			}
		});*/
	}
	else
		$(element).css("border","1px solid red");
	
	return valid;
}

function removeCss(element){
	$(element).removeClass('styleRadio');
	$(element).css('border',"");
}

function isEmail(email) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
}