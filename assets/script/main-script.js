	//	Navbar
	function dropBtn() {
		document.getElementById('dropdown').classList.toggle('dropdown-show');
	}
	window.onclick = function(event) {
		matches = event.target.matches ? event.target.matches('.material-icons') : event.target.msMatchesSelector('.material-icons');
		if (!matches) {
			var dropdowns = document.getElementsByClassName("dropdown-content");
			var i;
			for (i = 0; i < dropdowns.length; i++) {
				var openDropdown = dropdowns[i];
				if (openDropdown.classList.contains('dropdown-show')) {
					openDropdown.classList.remove('dropdown-show');
				}
			}
		}
	}
	
	//	Sign-up Date Picker
	$(function() {
        $('#datepicker').datepicker();
    })
	$(document).ready(function () {
		$('#datepicker').change(function() {
			$('.datepicker').val($('#datepicker').val());
			$('.mdl-datepicker').addClass('is-dirty');
		});
	})
	
	//	Add button, Modal, Animation and Form
	$(document).on('keyup',function(evt) {
		if (evt.keyCode == 27) {
			$('#form-add').css('top','-360px');
			$('#form-image').css('top','-360px');
			$('#form-option').animate({opacity:'0'},{duration:100});
			$('#form-option').queue(function(next) {$(this).hide(); next()});
			$('#modal').animate({opacity:'0'},{duration:200});
			$('#modal').queue(function(next) {$(this).hide(); next()});
			$('body').css('overflow','visible');
		}
	})
	function addButton () {
		$('#form-add').css('top','100px');
		$('#modal').show();
		$('#modal').animate({opacity:'1'},{duration:200});
		$('body').css('overflow','hidden');
	}
	function closeButton () {
		$('#form-add').css('top','-360px');
		$('#form-image').css('top','-360px');
		$('#form-option').animate({opacity:'0'},{duration:100});
		$('#form-option').queue(function(next) {$(this).hide(); next()});
		$('#form-delete').animate({opacity:'0'},{duration:100});
		$('#form-delete').queue(function(next) {$(this).hide(); next()});
		$('#modal-delete').animate({opacity:'0'},{duration:200});
		$('#modal-delete').queue(function(next) {$(this).hide(); next()});
		$('#modal').animate({opacity:'0'},{duration:200});
		$('#modal').queue(function(next) {$(this).hide(); next()});
		$('body').css('overflow','visible');
	}
	function editButton () {
		$('.button-icon').show();
		$('.button-icon').animate({opacity:'1'},{duration:200});
		$('.red-color-button').show();
		$('.red-color-button').animate({opacity:'1'},{duration:200});
		$('.create').animate({fontSize:'0'},{duration:200});
		$('.create').animate({fontSize:'24px'},{duration:1});
		$('.edit-btn').delay(200).queue(function(next) {$(this).hide(); next()});
		$('.close-edit').delay(200).queue(function(next) {$(this).show(); next()});
	}
	function closeEdit () {
		$('.button-icon').animate({opacity:'0'},{duration:200});
		$('.button-icon').queue(function(next) {$(this).hide(); next()});
		$('.red-color-button').animate({opacity:'0'},{duration:200});
		$('.red-color-button').queue(function(next) {$(this).hide(); next()});
		$('.clear').animate({fontSize:'0'},{duration:200});
		$('.clear').animate({fontSize:'24px'},{duration:1});
		$('.close-edit').delay(200).queue(function(next) {$(this).hide(); next()});
		$('.edit-btn').delay(200).queue(function(next) {$(this).show(); next()});
	}
	function addImage (element) {
		$('#form-image').css('top','100px');
		$('#modal').show();
		$('#modal').animate({opacity:'1'},{duration:200});
		$('.model').val($(element).data('id'));
		$('body').css('overflow','hidden');
	}
	function editForm (element) {
		$('#form-option').show();
		$('#form-option').animate({opacity:'1'},{duration:150});
		$('#modal').show();
		$('#modal').animate({opacity:'1'},{duration:200});
		$('.location').val($(element).data('location'));
		$('.location-form-title').text($(element).data('location'));
		$('body').css('overflow','hidden');
	}
	function editForm2 (element) {
		$('.defect').val($(element).data('defect'));
		$('.defect-form-title').text($(element).data('defect'));
	}
	function editForm3 (element) {
		$('select[name="january"]').val($(element).data('january'));
	}
	function editForm4 (element) {
		$('select[name="february"]').val($(element).data('february'));
	}
	function editForm5 (element) {
		$('select[name="march"]').val($(element).data('march'));
	}
	function editForm6 (element) {
		$('select[name="april"]').val($(element).data('april'));
	}
	function editForm7 (element) {
		$('select[name="may"]').val($(element).data('may'));
	}
	function editForm8 (element) {
		$('select[name="june"]').val($(element).data('june'));
	}
	function editForm9 (element) {
		$('select[name="july"]').val($(element).data('july'));
	}
	function editForm10 (element) {
		$('select[name="august"]').val($(element).data('august'));
	}
	function editForm11 (element) {
		$('select[name="september"]').val($(element).data('september'));
	}
	function editForm12 (element) {
		$('select[name="october"]').val($(element).data('october'));
	}
	function editForm13 (element) {
		$('select[name="november"]').val($(element).data('november'));
	}
	function editForm14 (element) {
		$('select[name="december"]').val($(element).data('december'));
	}
	function deleteFunction (element) {
		$('#form-delete').show();
		$('#form-delete').animate({opacity:'1'},{duration:50});
		$('#modal-delete').show();
		$('#modal-delete').animate({opacity:'1'},{duration:200});
		$('.model-id').val($(element).data('id'));
		$('body').css('overflow','hidden');
		$('.model').val($(element).data('model'));
		$('.model-form-title').text($(element).data('model'));
		$('.inspection-template-id').val($(element).data('id'));
		$('.location-form-title').text($(element).data('location'));
		$('.defect-form-title').text($(element).data('defect'));
	}
	function deleteID (element) {
		$('.location-id').val($(element).data('id'));
	}
	
	//	Search Button Animation
	$(document).ready(function(){
		$('.search-btn > div > form > input').focus(function() {
			$('.search-btn > label').css({BorderTopRightRadius: '0',BorderBottomRightRadius: '0'});
		}).blur(function() {
			$('.search-btn > label').delay(210).queue(function(next) {$(this).css('borderRadius','50%'); next()});
		});
	});

	//	Textfield validation button disabled default add model form
	jQuery("#add_confirm").prop('disabled', true);

	var toValidate = jQuery('#textfield_1, #textfield_2'), valid = false;
	
	toValidate.keyup(function () {
		if (jQuery(this).val().length > 0) {
			jQuery(this).data('valid', true);
		} else {
			jQuery(this).data('valid', false);
		}
		toValidate.each(function () {
			if (jQuery('#textfield_1').data('valid') && jQuery('#textfield_2').data('valid') == true) {
				valid = true;
			} else {
				valid = false;
			}
		});
		if (valid === true) {
			jQuery("#add_confirm").prop('disabled', false);
		} else {
			jQuery("#add_confirm").prop('disabled', true);
		}
	})
	
	//	Textfield validation button disabled default add location form
	jQuery("#add_location").prop('disabled', true);

	var toValidate2 = jQuery('#textfield'), valid = false;
	
	toValidate2.keyup(function () {
		if (jQuery(this).val().length > 0) {
			jQuery(this).data('valid', true);
		} else {
			jQuery(this).data('valid', false);
		}
		toValidate2.each(function () {
			if (jQuery('#textfield').data('valid') == true) {
				valid = true;
			} else {
				valid = false;
			}
		});
		if (valid === true) {
			jQuery("#add_location").prop('disabled', false);
		} else {
			jQuery("#add_location").prop('disabled', true);
		}
	})

	//	Timestamp
	window.setInterval('update()');
  
	function update() {
		var time   = new Date();
		var hours   = time.getHours();
		var minutes = time.getMinutes();
		var seconds = time.getSeconds();
		var dd = String(time.getDate()).padStart(2, '0');
		var mm = String(time.getMonth() + 1).padStart(2, '0');
		var yyyy = time.getFullYear();
		var today = mm + '/' + dd + '/' + yyyy;
		var ampm = hours >= 12 ? 'PM' : 'AM';
		var hours = hours % 12;
    	var hours = hours ? hours : 12;
		var clock = ((hours < 10) ? '0' : '') + hours + ':' + ((minutes < 10) ? '0' : '') + minutes + ':' + ((seconds < 10) ? '0' : '') + seconds + ' ' + ampm;
		
		$('#date').val(today);
		$('#time').val(clock);
	}	
	
	//	AJAX REQUEST
	$(document).ready(function() {
		// Add CpK Data
		$('#addData').submit(function(event){
			event.preventDefault();
			var inputs = $(this).serialize();
			
			$.post('../libs/add_data.php', inputs, function() {
				$('#form-option').animate({opacity:'0'},{duration:50});
				$('#form-option').queue(function(next) {$(this).hide(); next()});
				$('#modal').animate({opacity:'0'},{duration:200});
				$('#modal').queue(function(next) {$(this).hide(); next()});
				$('body').css('overflow','visible');
				$('.content').load('../libs/refresh.php');
			})
		})
	})