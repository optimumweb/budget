function refresh() {

	var start = new Date().getTime();
	console.log('Refreshing...');
	
	var $sections = $('.section');
	
	$sections.each(function() {
	
		var $section = $(this);
		var $sectionTotal = $section.find('.total');
		var $sectionMonthlyTotal = $sectionTotal.find('.monthly-total');
		var $sectionFields = $section.find('.field');
		
		var sectionMonthlyTotal = 0;
		
		$sectionFields.each(function() {
		
			var $field = $(this);
			var $amount = $field.find('.amount'), amount = parseFloat( $amount.find('input').val() );
			var $period = $field.find('.period'), period = parseFloat( $period.find('select').val() );
			var $monthlyTotal = $field.find('.monthly-total'), monthlyTotal = parseFloat( $monthlyTotal.text() );
			
			// refresh field amount
			$amount.find('input').val( amount.toFixed(2) );
			
			// refresh field monthly total
			var newMonthlyTotal = amount * period;
			$monthlyTotal.text( newMonthlyTotal.toFixed(2) );
			monthlyTotal = newMonthlyTotal;
			
			// increment section monthly total
			sectionMonthlyTotal += monthlyTotal;
			
		});
		
		// refresh section monthly total
		$sectionMonthlyTotal.text( sectionMonthlyTotal.toFixed(2) );
		
		// refresh percentages
		$sectionFields.each(function() {
			
			var $field = $(this);
			var $monthlyTotal = $field.find('.monthly-total'), monthlyTotal = parseFloat( $monthlyTotal.text() );
			var $percentage = $field.find('.percentage'), percentage = parseFloat( $percentage.text() );
			
			if ( sectionMonthlyTotal != 0 ) {
				var newPercentage = ( monthlyTotal / sectionMonthlyTotal ) * 100;
				$percentage.text( newPercentage.toFixed(1) );
				percentage = newPercentage;
			}
			else {
				$percentage.text( '-' );
			}
			
		});
	
	});
	
	var end = new Date().getTime();
	var runtime = end - start;
	console.log('Runtime: ' + runtime + 'ms');
	
}

jQuery.fn.budget = function() {

	return this.each(function() {
	
		var $this = $(this);
		var $sectionTitles = $this.find('.section-title');
		var $sectionLabels = $this.find('.section-labels');
		var $sections = $this.find('.section');
		var $fields = $this.find('.field');
		var $inputs = $fields.find('input, select');
		
		refresh();
		
		$inputs.bind('change', refresh);
		
		$sections.addClass('hidden').first().removeClass('hidden');
		
		$sectionTitles.click(function(e) {
			e.preventDefault();
			var section = $(this).data('for'), $section = $this.find( '#' + section );
			$section.toggleClass('hidden');
		});
		
	});
	
};
