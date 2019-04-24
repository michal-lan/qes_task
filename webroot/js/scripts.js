$(document).ready( function() {
	// Init Validate for QESolver Form.
	var form      = $( '#qesolver_form' );
	var validator = form.validate( {
		rules: {
			a: {
				required : true,
				number   : true,
				notEqual : '0'
			},
			b: {
				required : true,
				number   : true
			},
			c: {
				required : true,
				number   : true
			}
		},
		messages: {
	        a: {
	            required : 'This field is required.',
	            number   : 'Please enter numbers only',
	            notEqual : 'field "a" can not be zero'
	        },
			b: {
	            required : 'This field is required.',
	            number   : 'Please enter numbers only'
	        },
			c: {
	            required : 'This field is required.',
	            number   : 'Please enter numbers only'
	        }
	    },
	    submitHandler: function(form) {

			$.post( window.location.href + 'api/request', {
				a     : $( '#qesolver_form' ).find('input[name="a"]').val(),
				b     : $( '#qesolver_form' ).find('input[name="b"]').val(),
				c     : $( '#qesolver_form' ).find('input[name="c"]').val(),
				token : $( '#qesolver_form' ).find('input[name="token"]').val()
			} )
			.done( function( data ) {
				$( '#result' ).html( data );
			})
			.fail( function( data ) {
				$( '#result' ).html( data );
			});

			return false;
	    }
	} );

	// Add rule for field 'a' (Not equal to zero)
	jQuery.validator.addMethod( 'notEqual', function ( value, element, param ) {
	    return this.optional( element ) || value != '0';
	} );

	// If submit or press Enter try to disable form and prepare AJAX QUERY to API.
	form.on( 'submit', function(event) {
	    event.preventDefault();
	});

	form.keypress(function(e) {
		if ( e.which == 13 ) {
			event.preventDefault();
		}
	});
} );
