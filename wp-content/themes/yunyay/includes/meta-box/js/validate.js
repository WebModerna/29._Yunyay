jQuery( function ( $ )
{
	'use strict';

	var $form = $( '#post' ),
		rules = {
			invalidHandler: function ()
			{
				// Re-enable the submit ( publish/update ) button and hide the ajax indicator
				$( '#publish' ).removeClass( 'button-primary-disabled' );
				$( '#ajax-loading' ).attr( 'style', '' );
				$form.siblings( '#message' ).remove();
				$form.before( '<div id="message" class="error"><p>' + rwmbValidate.summaryMessage + '</p></div>' );
			}
		};

	// Gather all validation rules
	$( '.rwmb-validation-rules' ).each( function ()
	{
		var subRules = $( this ).data( 'rules' );
		jQuery.extend( true, rules, subRules );

		// Required field styling
		$.each( subRules, function ( k, v )
		{
			if ( v['required'] )
			{
				$( '#' + k ).parent().siblings( '.rwmb-label' ).addClass( 'required' ).append( '<span>*</span>' );
			}
		} );
	} );

	// Execute
	$form.validate( rules );
});


$(document).ready(function()
{
	// Limitar la entrada de caracteres a 160 en los campos de Meta Keywords y Meta Description del dashboard de las entradas.
	var caracteres = 160;
	$( "#villabrochero_meta_descripcion, #villabrochero_meta_keywords" ).keyup( function()
	{
		if( $( this ).val().length > caracteres )
		{
			$( this ).val( $( this ).val().substr( 0, caracteres ) );
		}
	});

	// Agregar clases a unos checkboxes
	if ( $( "#villabrochero_reservado" ).is(":checked") )
	{
		$( "#villabrochero_reservado" ).parent().parent().addClass('villabrochero_reservado');
	};

	if ( $( "#villabrochero_vendido" ).is(":checked") )
	{
		$( "#villabrochero_vendido" ).parent().parent().addClass('villabrochero_vendido');
	};

	// Controlar si están activados y agregarles o quitarles una clase
	$("#villabrochero_reservado").on("click", function()
	{
		if ( $( "#villabrochero_reservado" ).is(":checked") )
		{
			$( "#villabrochero_reservado" ).parent().parent().addClass('villabrochero_reservado');
		}
		else
		{
			$( "#villabrochero_reservado" ).parent().parent().removeClass('villabrochero_reservado');
		}
	});

	$("#villabrochero_vendido").on("click", function()
	{
		if ( $( "#villabrochero_vendido" ).is(":checked") )
		{
			$( "#villabrochero_vendido" ).parent().parent().addClass('villabrochero_vendido');
		}
		else
		{
			$( "#villabrochero_vendido" ).parent().parent().removeClass('villabrochero_vendido');
		}
	});
});