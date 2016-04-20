function buildCal(id)
{

	$("#" + id).datepicker({ dateFormat: "yy-mm-dd" , 
    	dayNamesMin: ["Dom","Seg", "Ter", "Qua", "Qui", "Sex", "Sab"], 
    	monthNames:["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
    	monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
		
	});
	$('#'+id).datepicker($.datepicker.regional['pt']);
}


function cleadDate(id)
{
	
	var obj = $("#"+id).val();
	
	
	if (obj == "0000-00-00")
		{
		$("#"+id).val("");
		}


}