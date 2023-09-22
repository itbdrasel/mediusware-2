

// Date Picker
if ( $('.datepicker').length){
	$(function () {
		$(".datepicker").datepicker({
			showAnim: "slide",
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			yearRange: "-80:+80"
		});
	});
}



if ( $('.onlyNumber').length) {
	$('.onlyNumber').on('keyup', function (e) {
		if (/\D/g.test(this.value)) {
			this.value = this.value.replace(/\D/g, '');
		}
	});
}


if ( $('.number').length) {
    $('.number').keypress(function(event) {
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });
}