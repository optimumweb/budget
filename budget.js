function getSectionMonthlyTotal($section) {
	
	var total = 0;
	
	$section.find('.field').each(function() {
		
		var $this = $(this);
		var $monthlyTotal = $this.find('.monthly-total');
		
		total = total + parseFloat( $monthlyTotal.text() );
		
	});
	
	return parseFloat( total );
	
}

function calcSectionMonthlyTotal($section) {
	
	var sectionMonthlyTotal = getSectionMonthlyTotal( $section );
	var $sectionMonthlyTotal = $section.find('.total').find('.monthly-total');
	
	$sectionMonthlyTotal.text( sectionMonthlyTotal.toFixed(2) );
	
}

function calcMonthlyTotal($field) {
	
	var $amount = $field.find('.amount'), amount = parseFloat( $amount.find('input').val() );
	var $period = $field.find('.period'), period = parseFloat( $period.find('select').val() );
	var $monthlyTotal = $field.find('.monthly-total');
	
	var monthlyTotal = amount * period;
	
	$monthlyTotal.text( monthlyTotal.toFixed(2) );
	
}

function calcPercentage($field) {
	
	var $percentage = $field.find('.percentage');
	var $monthlyTotal = $field.find('.monthly-total'), monthlyTotal = parseFloat( $monthlyTotal.text() );
	var $section = $field.parent('.section');
	
	var sectionMonthlyTotal = getSectionMonthlyTotal( $section );
	var percentage = ( monthlyTotal / sectionMonthlyTotal ) * 100;
	
	$percentage.text( percentage.toFixed(1) );
	
}

function calcField($field) {
	
	var $amount = $field.find('.amount'), amount = parseFloat( $amount.find('input').val() );
	var $section = $field.parent('.section');
	
	$amount.find('input').val( amount.toFixed(2) );
	
	calcMonthlyTotal( $field );
	
	calcSectionMonthlyTotal( $section );
	
	calcPercentage( $field );
	
}

$(document).ready(function() {
	
	var $field = $('.field');
	
	$field.each(function() {
		
		var $this = $(this);
		
		calcMonthlyTotal( $this );
		
	});
	
	$field.find('.amount').focusout(function() {
		
		var $field = $(this).parent('.field');
		
		calcField( $field );
		
	});
	
	$field.find('.period').find('select').change(function() {
		
		var $field = $(this).parent('.field');
		
		calcField( $field );
		
	});


});