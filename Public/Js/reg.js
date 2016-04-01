$(function () {
	$('#img').click(function(){
			$(this).hide();
			$('#show').show(200);
	});	
//选择图片
	$('#show .chooseimg').click(function(){
		$('#show').hide(200);
		$('#img').get(0).src=this.src;
		$('#img').show();
		$('form input[name="face"]').get(0).value=this.src;   //更改提交的数据
	});
//验证码改变
	$('#code').click(function(){
		this.src="/thinkphp/index.php/Home/Base/code?tm="+Math.random();
	});
//验证表单
var i,j,k,l,m='';
//验证用户名
	$('input[name="username"]').focus(function(){	
    $(this).next().text('输入用户名').removeClass('state1').addClass('state2');
       }).blur(function(){
            if($(this).val().length >= 2 && $(this).val().length <=12 && $(this).val()!=''){
            	// 通过 Ajax POST 方法把用户名提交到 validate.php 进行验证用户名是否存在，并返回结果  
            	$.post('checkname',{username:$(this).val()},function(data){ 
            		$('input[name="username"]').next().text(data).removeClass('state1').addClass('state4');//Ajax返回的值显示在SPAN标签上   
            		return i=1;
            		});
                }else{
                        $(this).next().text('请输入2-12位的用户名').removeClass('state1').addClass('state3');
                    }
                     
    });
//验证密码
    $('input[name="pass"]').focus(function(){
        $(this).next().text('输入密码').removeClass('state1').addClass('state2');
    }).blur(function(){
        if($(this).val().length >= 6 && $(this).val().length <=20 && $(this).val()!=''){
            $(this).next().text('ok').removeClass('').addClass('state4');
             return j=1;
        }else{
            $(this).next().text('请输入6-20位的密码').removeClass('state1').addClass('state3');
        }
                     
    });
 
//验证确认密码
    $('input[name="repass"]').focus(function(){
        $(this).next().text('确认密码要一致').removeClass('state1').addClass('state2');
    }).blur(function(){
        if($(this).val().length >= 6 && $(this).val().length <=20 && $(this).val()!='' && $(this).val() == $('input[name="pass"]').val()){
            $(this).next().text('ok').removeClass('state1').addClass('state4');
            return m=1;
        }else{
            $(this).next().text('确认密码与密码不一致').removeClass('state1').addClass('state3');
        }                        
    });
//验证邮箱
	$('#reg input[name="email"]').focus(function(){
		$(this).next().text('请输入邮箱').removeClass('state1').addClass('state2');

	}).blur(function(){
		if(/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test($(this).val())==false){
			$(this).next().text('你输入的电子邮件有误').removeClass('state1').addClass('state3');
		}else{
			$(this).next().text('ok').removeClass('state1').addClass('state4');
			return k=1;
		}
	});
//验证验证码	
	$('input[name="check"]').focus(function(){	
    $('#code').next().text('').removeClass('state1').addClass('state2');
       }).blur(function(){
            if($(this).val()!=''){
            	// 通过 Ajax POST 方法把用户名提交到控制器进行验证用户名是否存在，并返回结果  
            	$.post('/thinkphp/index.php/Home/Base/checkcode',{'check':$(this).val()},function(data){
            	 ///Ajax返回的值显示在SPAN标签上
                 if(data=='2'){  
                     return l=1;           		
                }else{
                     $('#code').next().text('-- '+data).removeClass('state1').addClass('state4');
                     }
            		});
            }else{
                    $('#code').next().text('').removeClass('state1').addClass('state3');                       
                 }
    });
//验证提交
    $('input[name="sub"]').click(function(){
    	if(i==1 && j==1 && k==1 && l==1 && m==1){
        $('form').submit();           
    	}else{
    		  alert('请填写正确信息');
		      $('#code').get(0).src="/thinkphp/index.php/Home/Base/code?tm="+Math.random();
    	   }
    });
//防止恶意注册及跨站攻击    
    $.post('checkse',{'uniqid':$('input[name="uniqid"]').val()},function(data){
      if(data==0){
        alert('define');
      }
    });

});
