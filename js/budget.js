!function ($) {

	$(function () {

		function budgetRefresh() {

			var $budgetTable = $('#budget-table');
			var $sections = $budgetTable.find('.section');
			var $summary = $budgetTable.find('.summary');
			var $monthlyAvailable = $summary.find('.monthly-available');

			$sections.each(function() {

				var $section = $(this);
				var $sectionTitle = $section.siblings('.section-title[data-for="' + $section.attr('id') + '"]');
				var $sectionTotal = $sectionTitle.find('.monthly-total');
				var $sectionMonthlyTotal = $section.find('tr.total').find('.monthly-total');
				var $sectionFields = $section.find('tr.field');

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
				$sectionTotal.text( sectionMonthlyTotal.toFixed(2) );
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

			var incomeTotal = parseFloat( $sections.filter('#income').find('tr.total td.monthly-total').text() );
			var savingsTotal = parseFloat( $sections.filter('#savings').find('tr.total td.monthly-total').text() );
			var spendingsTotal = parseFloat( $sections.filter('#spendings').find('tr.total td.monthly-total').text() );

			var monthlyAvailable = incomeTotal - savingsTotal - spendingsTotal;

			$monthlyAvailable.text( monthlyAvailable );

		}

		jQuery.fn.budget = function() {

			return this.each(function() {

				var $this = $(this);
				var $sectionTitles = $this.find('.section-title');
				var $sectionLabels = $this.find('.section-labels');
				var $sections = $this.find('.section');
				var $fields = $this.find('.field');
				var $inputs = $fields.find('input, select');

				budgetRefresh();

				$inputs.bind('change', budgetRefresh);

				$sectionTitles.addClass('collapsed').first().removeClass('collapsed');
				$sections.addClass('hidden').first().removeClass('hidden');

				$sectionTitles.click(function(e) {
					e.preventDefault();
					var section = $(this).data('for'), $section = $this.find( '#' + section );
					$section.toggleClass('hidden');
					$(this).toggleClass('collapsed');
				});

			});

		};

	})

}(window.jQuery);

!function ($) {

	$(function () {

		$(document).ready(function() {

			$('#budget-table').budget();

		});

	})

}(window.jQuery);
