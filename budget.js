var calcSection = function($section) {

	var $fields = $section.find('.field');
	var $total = $section.find('.total');
	var $monthlyTotal = $total.find('.monthly-total');
	
	this.getMonthlyTotal = function() {
		
		var total = 0;
		
		$fields.each(function() {
			var $field = $(this);
			var $fieldMonthlyTotal = $field.find('.monthly-total');
			total += parseFloat( $fieldMonthlyTotal.text() );
		});
		
		return parseFloat( total );
		
	};
	
	this.calcMonthlyTotal = function() {
		
		var total = calcSection( $section ).getMonthlyTotal();
		
		$monthlyTotal.text( total.toFixed(2) );
		
		return this;
		
	};
	
	return $section;
	
};

var calcField = function($field) {
	
	var $amount = $field.find('.amount'), amount = parseFloat( $amount.find('input').val() );
	var $period = $field.find('.period'), period = parseFloat( $period.find('select').val() );
	var $monthlyTotal = $field.find('.monthly-total'), monthlyTotal = parseFloat( $monthlyTotal.text() );
	var $percentage = $field.find('.percentage'), percentage = parseFloat( $percentage.text() );

	var $section = $field.parent('.section');
	
	this.refreshAmount = function() {
		$amount.find('input').val( amount.toFixed(2) );
		return this;
	};
	
	this.calcMonthlyTotal = function() {
		var newMonthlyTotal = amount * period;
		$monthlyTotal.text( newMonthlyTotal.toFixed(2) );
		monthlyTotal = newMonthlyTotal;
		return this;
	};
	
	this.calcPercentage = function() {
		var sectionMonthlyTotal = calcSection( $section ).getMonthlyTotal();
		var newPercentage = ( monthlyTotal / sectionMonthlyTotal ) * 100;
		$percentage.text( newPercentage.toFixed(1) );
		percentage = newPercentage;
		return this;
	};
	
	return $field;
	
};

function calcAll($field) {
	
	$section = $field.parent('.section');
	
	calcField( $field ).refreshAmount().calcMonthlyTotal().calcPercentage();
	
	calcSection( $section ).calcMonthlyTotal();
	
}

$(document).ready(function() {
	
	var $field = $('.field');
	var $inputs = $field.find('input, select');
	
	$field.each(function() {
	
		var $this = $(this);
		
		calcAll( $field );
		
	});
	
	$inputs.bind('change focusout blur', function() {
		
		var $this = $(this);
		var $field = $this.parent('.field');
		
		calcAll( $field );
		
	});


});