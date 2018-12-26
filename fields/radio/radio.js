( function ( $ ) {
	function radioChanged ( select ) {
			radio  = select.attr('data-radio'),
			hide    = select.attr('data-hide'),
			trigger = select.attr('data-trigger'),
			val     = select.val(),
			i       = 0,
			k       = 0;
		if(typeof radio !== 'undefined') {
			radio = JSON.parse(radio);
			for(i in radio) {
				FLBuilder._settingsSelectToggle(radio[i].fields, 'hide', '#fl-field-');
				FLBuilder._settingsSelectToggle(radio[i].sections, 'hide', '#fl-builder-settings-section-');
				FLBuilder._settingsSelectToggle(radio[i].tabs, 'hide', 'a[href*=fl-builder-settings-tab-', ']');
			}
			if(typeof radio[val] !== 'undefined') {
				FLBuilder._settingsSelectToggle(radio[val].fields, 'show', '#fl-field-');
				FLBuilder._settingsSelectToggle(radio[val].sections, 'show', '#fl-builder-settings-section-');
				FLBuilder._settingsSelectToggle(radio[val].tabs, 'show', 'a[href*=fl-builder-settings-tab-', ']');
			}
		}
		if(typeof hide !== 'undefined') {
			hide = JSON.parse(hide);
			if(typeof hide[val] !== 'undefined') {
				FLBuilder._settingsSelectToggle(hide[val].fields, 'hide', '#fl-field-');
				FLBuilder._settingsSelectToggle(hide[val].sections, 'hide', '#fl-builder-settings-section-');
				FLBuilder._settingsSelectToggle(hide[val].tabs, 'hide', 'a[href*=fl-builder-settings-tab-', ']');
			}
		}
		if(typeof trigger !== 'undefined') {
			trigger = JSON.parse(trigger);
			if(typeof trigger[val] !== 'undefined') {
				if(typeof trigger[val].fields !== 'undefined') {
					for(i = 0; i < trigger[val].fields.length; i++) {
						$('#fl-field-' + trigger[val].fields[i]).find('select').trigger('change');
					}
				}
			}
		}
	}
	$ ( document ).ready (function () {
		if ( typeof FLBuilder != 'object' ) return;
		$( 'body' ).delegate( '.fl-builder-settings-fields :radio:checked' , 'change' ,  function () { radioChanged($(this));  } );
	});

} )( jQuery );
