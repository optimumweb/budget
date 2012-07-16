function sectionAnnualTotal($section) {
	
	var total = 0;
	
	$section.find('.field').each(function() {
		
		var $this = $(this);
		var $annualTotal = $this.find('.annual-total');
		
		total = total + parseFloat( $annualTotal.text() );
		
	});
	
	return parseFloat( total );
	
}

function calcSectionAnnualTotal($section) {
	
	var sectionAnnualTotal = sectionAnnualTotal( $section ).toFixed(2);
	var $sectionAnnualTotal = $section.find('.total').find('.annual-total');
	
	$sectionAnnualTotal.text( sectionAnnualTotal );
	
}

function calcAnnualTotal($field) {
	
	var $amount = $field.find('.amount'), amount = parseFloat( $amount.find('input').val() );
	var $period = $field.find('.period'), period = parseFloat( $period.find('select').val() );
	var $annualTotal = $field.find('.annual-total');
	
	var annualTotal = amount * period;
	
	$annualTotal.text( annualTotal.toFixed(2) );
	
}

$(document).ready(function() {
	
	var $field = $('.field');
	
	$field.each(function() {
		
		var $this = $(this);
		
		calcAnnualTotal( $this );
		
	});
	
	$field.focusout(function() {
		
		var $this = $(this);
		var $amount = $this.find('.amount'), amount = parseFloat( $input.val() );
		var $section = $this.parent('.section');
		
		$amount.find('input').val(  amount.toFixed(2) );
		
		calcAnnualTotal( $field );
		
		calcSectionAnnualTotal( $section );
		
	});


});