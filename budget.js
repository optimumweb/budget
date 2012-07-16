$(document).ready(function() {
	
	var sectionAnnualTotal = function($section) {
		
		var total = 0;
		
		$section.find('.field').each(function() {
			
			var $this = $(this);
			var $annualTotal = $this.find('.annual-total');
			
			total += parseFloat( $annualTotal.text() );
			
		});
		
		return total;
		
	};
	
	function calcAnnualTotal($field) {
		
		var $amount = $field.find('.amount'), amount = parseFloat( $amount.find('input').val() );
		var $period = $field.find('.period'), period = parseFloat( $period.find('select').val() );
		var $annualTotal = $field.find('.annual-total');
		
		var annualTotal = amount * period;
		
		$annualTotal.text( annualTotal.toFixed(2) + ' $' );
		
	};
	
	$('.field').each(function() {
		
		var $field = $(this);
		
		calcAnnualTotal( $field );
		
	});
	
	$('.amount').focusout(function() {
		
		var $this = $(this);
		var $input = $this.find('input');
		var $field = $this.parent('.field');
		
		var amount = parseFloat( $input.val() );
		
		$input.val(  amount.toFixed(2) );
		
		calcAnnualTotal( $field );
		
	});


});