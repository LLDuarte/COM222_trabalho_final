$(function() {

	//slider de preco	
	$( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: maxslider,
		values: [$("#slider0").val(), $("#slider1").val()],
		slide: function( event, ui ) {
			$( "#amount" ).val( "R$" + ui.values[ 0 ] + " - R$" + ui.values[ 1 ] );
		},
		change: function( event, ui){
			$('#slider'+ui.handleIndex).val(ui.value);
			$(".filterarea form").submit();
		}
	});

	$( "#amount" ).val( "R$" + $( "#slider-range" ).slider( "values", 0 ) + " - R$" + $( "#slider-range" ).slider( "values", 1 ) );

	//slider de avaliacao
	$( "#slider-range-max" ).slider({
		range: "max",
		min: 0,
		max: 5,
		step: 0.1,
		value: $("#slider3").val(),
		slide: function( event, ui ) {
			$( "#estrela" ).val( ui.value );
		},
		change: function( event, ui){
			$('#slider3').val(ui.value);
			$(".filterarea form").submit();
		}
	});
	$( "#estrela" ).val( $( "#slider-range-max" ).slider( "value" ) );

	//todos os filtros 
	$(".filterarea").find('input').on('change', function(){
		$(".filterarea form").submit();
	});
	
});

