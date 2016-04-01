$(function(){
	$('.showre').click(function(){
		var obj=$(this);
		var fri=$(this).prev().text();
		$.ajax({
			type:'GET',
			url:'/thinkphp/index.php/Home/Index/add',
			data:{
				'fri':fri
			},
			success:function(data){
				if(data == 't'){
					obj.hide();
					alert('添加成功');
				}else{
					obj.hide();					
					alert('他已经是你的好友了');
				}
			}
		});		
	});
});