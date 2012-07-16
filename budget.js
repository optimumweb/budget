function sectionAnnualTotal($section) {
	
	var total = 0;
	
	$section.find('.field').each(function() {
		
		var $this = $(this);
		var $annualTotal = $this.find('.annual-total');
		
		total += parseFloat( $annualTotal.text() );
		
	});
	
	return parseFloat( total );
	
}

function calcSectionAnnualTotal($section) {
	
	$section.find('.field.total').find('.annual-total').text( sectionAnnualTotal( $section ).toFixed(2) );
	
}

function calcAnnualTotal($field) {
	
	var $amount = $field.find('.amount'), amount = parseFloat( $amount.find('input').val() );
	var $period = $field.find('.period'), period = parseFloat( $period.find('select').val() );
	var $annualTotal = $field.find('.annual-total');
	
	var annualTotal = amount * period;
	
	$annualTotal.text( annualTotal.toFixed(2) );
	
}

$(document).ready(function() {
	
	$('.field').each(function() {
		
		var $field = $(this);
		
		calcAnnualTotal( $field );
		
	});
	
	$('.amount').focusout(function() {
		
		var $this = $(this);
		var $input = $this.find('input');
		var $field = $this.parent('.field');
		var $section = $field.parent('.section');
		
		var amount = parseFloat( $input.val() );
		
		$input.val(  amount.toFixed(2) );
		
		calcAnnualTotal( $field );
		
		calcSectionAnnualTotal( $section );
		
	});


});