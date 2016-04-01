$(function(){
	$('#myfri li').bind({
		mouseover:function(){$(this).children('a').show();},
		mouseout:function(){$(this).children('a').hide();}
	});
});