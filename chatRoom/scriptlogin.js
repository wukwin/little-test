$(function(){

	$("#meg").ajaxStart(function(){

		$(this).show().html("正在发送登录请求");
	})
	$("#meg").ajaxStop(function(){

		$(this).html("请求完成").hide();
	})
	$("#ck").click(function(){
		var $name=$("#pname");
		var $pass=$("#psd");
		if ($name.val()!=null&&$pass.val()!=null) {
			userLogin($name.val(),$pass.val());
		}else{
			if ($name.val()==null) {alert("用户名不能为空");$name.focus();return false;} else {alert("密码不能为空");$pass.focus();return false;}
		}
	})
});
function userLogin(name,pass){

	$.ajax({
		type:"GET",
		url:"index.php",
		data:"action=Login&d="+ new Date()+"&name="+name+"&pass="+pass,
		success:function(data){
			if (data=="1") {
				window.location="chatMain.html";
			} else {
				alert("用户名或密码错误");
				return false;
			}
		}

	})
}