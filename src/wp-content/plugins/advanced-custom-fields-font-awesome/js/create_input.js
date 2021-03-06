(function($){

	var version_num = 5;

	$(document).on( 'change', '.field_type-select select, .field_type select', function() {

		if( $(this).val() == 'font-awesome' ) {

			// ACF 5
			var font_awesome_form = $(this).closest( '.field-settings' );

			// ACF 4
			if ( font_awesome_form.length == 0 ) {
				var font_awesome_form = $(this).closest( '.field_form' );
				version_num = 4;
			}

			setTimeout(function() {
				var font_awesome_select = $( 'select.fontawesome', font_awesome_form );

				update_preview( font_awesome_select, $( font_awesome_select ).val(), version_num );

				if ( $('.select2-container', font_awesome_form).length == 0 ) {
					font_awesome_select.select2({
						width : '100%'
					});
				} else {
					$('.select2-container', font_awesome_form).remove();
					font_awesome_select.select2({
						width : '100%'
					});				}
			}, 1000);
		}

	});

	$(document).ready(function($) {
		
		if ( $('.fa-field-wrapper').length > 0 ) {
			version_num = 4;
		}

		element = $( 'select.fontawesome' );

		$( element ).select2({
			width : '100%'
		});
		update_preview( element, $(element).val(), version_num );
	});

	$(document).on( 'select2-selecting', 'select.fontawesome', function( object ) {
		update_preview( this, object.val, version_num );
	});

	$(document).on( 'select2-highlight', 'select.fontawesome', function( object ) {
		update_preview( this, object.val, version_num );
	});

	$(document).on( 'select2-close', 'select.fontawesome', function( object ) {
		update_preview( this, $(this).val(), version_num );
	});

	function update_preview( element, selected, version ) {
		if ( version == 4 ) {
			var parent = $(element).parent();
			$( '.fa-live-preview', parent ).html( '<i class="fa ' + selected + '"></i>' );
		} else {
			var parent = $(element).closest('tr');
			var sibling = parent.siblings('tr[data-name="fa_live_preview"]');
			$( 'td.acf-input', sibling ).html( '<i class="fa ' + selected + '"></i>' );	
		}
	}

})(jQuery);