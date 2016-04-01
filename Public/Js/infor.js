$(function(){
	$('.chooseli').click(function(){
		$('iframe').get(0).src=this.href;
		return false;
	});

	
});