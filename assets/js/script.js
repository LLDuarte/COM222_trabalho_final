$(function() {
	$( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: maxslider,
		values: [ 25, 100 ],
		slide: function( event, ui ) {
			$( "#amount" ).val( "R$" + ui.values[ 0 ] + " - R$" + ui.values[ 1 ] );
		}
	});
	$( "#amount" ).val( "R$" + $( "#slider-range" ).slider( "values", 0 ) +
		" - R$" + $( "#slider-range" ).slider( "values", 1 ) );
});

$( function() {
	$( "#slider-range-max" ).slider({
		range: "max",
		min: 1,
		max: 5,
		step: 0.1,
		value: 1,
		slide: function( event, ui ) {
			$( "#estrela" ).val( ui.value );
		}
	});
	$( "#estrela" ).val( $( "#slider-range-max" ).slider( "value" ) );
} );