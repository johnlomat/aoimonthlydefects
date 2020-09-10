<script type="text/javascript">
	/*	Navbar*/
	function dropBtn() {
		document.getElementById('dropdown').classList.toggle('dropdown-show');
	}
	window.onclick = function(event) {
		if (!event.target.matches('.material-icons')) {
			var dropdowns = document.getElementsByClassName('dropdown-content');
			var i;
			for (i = 0; i < dropdowns.length; i++) {
				var openDropdown = dropdowns[i];
				if (openDropdown.classList.contains('dropdown-show')) {
					openDropdown.classList.remove('dropdown-show');
				}
			}
		}	
	}
	/*	Sign-up Date Picker	*/
	$(function() {
        $('#datepicker').datepicker();
    });
	$(document).ready(function () {
		$('#datepicker').change(function () {
			$('.datepicker').val($('#datepicker').val());
		});
		$('.datepicker').change(function () {
			$('#datepicker').val($('.datepicker').val());
		});
	});
	/*	Add button/Modal	*/
	$(document).on('keyup',function(evt) {
		if (evt.keyCode == 27) {
			$('#form-option').css('top','-360px');
			$('#form-add').css('top','-360px');
			$('#modal').css('display','none');
			document.getElementById('modal').style.opacity = '0';
			document.body.style.overflow = 'visible';
		}
	});
	function addButton () {
		document.getElementById('form-add').style.top = '100px';
		document.getElementById('modal').style.display = 'block';
		document.getElementById('modal').style.opacity = '1';
		document.body.style.overflow = 'hidden';
	}
	function closeButton () {
		$('#form-option').css('top','-360px');
		$('#form-add').css('top','-360px');
		$('#form-delete').css('top','-360px');
		$('#modal').css('display','none');
		$('#modal-delete').css('display','none');
		document.getElementById('modal').style.opacity = '0';
		document.body.style.overflow = 'visible';
	}
	function editButton () {
		$('.button-icon').css('display','block');
		$('.button-icon').css('opacity','1');
		$('.edit-btn').css('display','none');
		$('.close-edit').css('display','block');
	}
	function closeEdit () {
		$('.button-icon').css('display','none');
		$('.edit-btn').css('display','block');
		$('.close-edit').css('display','none');
	}
	function deleteForm (element) {
		document.getElementById('form-delete').style.top = '100px';
		document.getElementById('modal-delete').style.display = 'block';
		document.getElementById('modal-delete').style.opacity = '1';
		document.body.style.overflow = 'hidden';
		$('.location').val($(element).val());
		$('.location-form-title').text($(element).val());
	}
	function deleteForm2 (element) {
		$('.defect').val($(element).val());
		$('.defect-form-title').text($(element).val());
	}
	function deleteForm3 (element) {
		$('.id').val($(element).val());
	}
	function editForm (element) {
		document.getElementById('form-option').style.top = '80px';
		document.getElementById('modal').style.display = 'block';
		document.getElementById('modal').style.opacity = '1';
		document.body.style.overflow = 'hidden';
		$('.location').val($(element).val());
		$('.location-form-title').text($(element).val());
	}
	function editForm2 (element) {
		$('.defect').val($(element).val());
		$('.defect-form-title').text($(element).val());
	}
	function editForm3 (element) {
		$('select[name="january"]').val($(element).val());
	}
	function editForm4 (element) {
		$('select[name="february"]').val($(element).val());
	}
	function editForm5 (element) {
		$('select[name="march"]').val($(element).val());
	}
	function editForm6 (element) {
		$('select[name="april"]').val($(element).val());
	}
	function editForm7 (element) {
		$('select[name="may"]').val($(element).val());
	}
	function editForm8 (element) {
		$('select[name="june"]').val($(element).val());
	}
	function editForm9 (element) {
		$('select[name="july"]').val($(element).val());
	}
	function editForm10 (element) {
		$('select[name="august"]').val($(element).val());
	}
	function editForm11 (element) {
		$('select[name="september"]').val($(element).val());
	}
	function editForm12 (element) {
		$('select[name="october"]').val($(element).val());
	}
	function editForm13 (element) {
		$('select[name="november"]').val($(element).val());
	}
	function editForm14 (element) {
		$('select[name="december"]').val($(element).val());
	}
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
	});
</script>