$(function() {
	
	buildCal("data_inicio");
	buildCal("data_fim");
	buildCal("data_abertura");
	
	$('#num').focus();
	
	
	
	
});



function nameOptimus()
{
	
	var id = $("#num").val();
	
	var nome = $.ajax({
		type: 'GET',
		url: '/ajax/namefromoptimus?id=' + id,
		async: false,
		}).responseText;
	
	$("#nome").val(nome);
	
	
	
}