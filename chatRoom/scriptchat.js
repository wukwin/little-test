$(function(){


	$("#button1").click(function(){
		var $content=$("contentput");
		if ($content.val()!=null) {

			sendcontent($content.val());
		} else {
			alert("发送内容不能为空");
			$content.focus();
			return false;
		}

	});

	face();
	$("#faceimg").click(function(){

		var strcontent=$("#contentput").val()+"<:"+this.id+":>";
		$("#contentput").val(strcontent);
	})

	AutoUpd();
	var hander =setInterval("AutoUpd()",5000);
	$("#meg").ajaxStart(function(){

		$(this).show().html("正在发送请求");

	})
	$("#meg").ajaxStop(function(){
		$(this).html("发送请求已完成").hide();
	})

	function AutoUpd(){
		getMessageList();
		getonlinelist();
	}

	function getMessageList(){
		$.ajax({

			type:"GET",
			url:"index.php",
			data:"action=chatList&d="+new Date(),
			success :function(data){
				$("#contentput").html(data);
			}
		});

	}
	function getonlinelist(){

			$.ajax({

			type:"GET",
			url:"index.php",
			data:"action=onlineList&d="+new Date(),
			success :function(data){
				$("#online").html(data);
			}
		});

	}
	function sendcontent(content) {
		$.ajax({
			type:"GET",
			url:"index.php",
			data:"action=sendcontent&d="+new Date()+"&content="+content,
			success:function(data){
				if (data=="1") {
					getMessageList();
					$("#contentput").val("");

				} else {
					alert("发送失败");
					return false;
				}
			}
		})
	}

	function face(){
		var str="";
		for (var i = 1; i <6; i++ ){
			str+="<img src='face/"+i+".png ' id='"+i+"'/>";
		}
		$("#faceimg").html(str);
	}
})