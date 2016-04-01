$(function(){
//验证码改变
	$('#code').click(function(){
		this.src="/thinkphp/index.php/Home/Base/code?tm="+Math.random();
	});
//验证验证码	
var l=0;
	$('input[name="check"]').focus(function(){	
    $('#code').next().text('').removeClass('state1').addClass('state2');
       }).blur(function(){ 
            if($(this).val()!== ''){
            	// 通过 Ajax POST 方法把用户名提交到控制器进行验证用户名是否存在，并返回结果  
            	$.post('/thinkphp/index.php/Home/Base/checkcode',{'check':$(this).val()},function(data){
	            	 //Ajax返回的值显示在SPAN标签上   
	            	 if (data!='2') {
	            	 $('#code').next().text('-'+data).removeClass('state1').addClass('state4');
	            	 }else{	            	 	
	            		return l=1;	            		 
	            	 }
            	});
            }

    });

//验证用户名密码
	$('input[type="button"]').click(function(){
		var i=$('input[name="username"]').val();
		var j=$('input[name="password"]').val();
		var k=$('input[name="check"]').val();
		if(i !='' && j !='' && k!='' && l==1){
			$.ajax({
				type:'POST',
				url:'/thinkphp/index.php/Home/Login/checklogin',
				data:{
					'username':i,
					'password':j
				},
				success:function(data){
					if(data=='1'){
						$('form').submit();											
					}else{
						$('#code').get(0).src="/thinkphp/index.php/Home/Base/code?tm="+Math.random();
						if(data!='3'){
							$('#info').empty().html(data);
						}else{
							$('#info').empty().append('<a href="/thinkphp/index.php/Home/Login/active" style="color:red;">帐号未激活，请激活!</a>')
						}
					}
				}
			})
		}else{
			$('#info').empty().html('登录信息错误！');
		}

	});
});