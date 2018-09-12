var options = {
		color : ["red","green","blue"],
		country : ["Spain","Germany","France"]
}

$(function(){
	var fillSecondary = function(){
		var selected = $('#departamento').val();
		$('#municipio').empty();
		options[selected].forEach(function(element,index){
			$('#municipio').append('<option value="'+element+'">'+element+'</option>');
		});
	}
	$('#departamento').change(fillSecondary);
	fillSecondary();
});