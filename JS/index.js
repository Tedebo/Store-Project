$(document).ready(function(){
	//$('#itemAdd').addClass('is-active');
	$('#addBtn').click(function(){

		$('#itemAdd').addClass('is-active');
	});

	$('.cancelBtn').click(function(){

		$('#itemAdd').removeClass('is-active');
	});

});