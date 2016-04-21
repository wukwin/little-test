<!-- 这是我自己写的留言板，参考了别人的部分 -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>message</title>
	<style type="text/css">
	#top{border: #CCCCCC 3px solid;width:420px;height: 400px;}
	#one{padding: 20px;}
	#a{padding-top:40px;}
	#b{margin-top:-125px;margin-left:220px; }
	#c{margin-left:220px;margin-top:45px }
	#word{color:#BF3EFF;}
	#wordd{color:#DAA520;}
</style>

<script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.js"></script>

<script type="text/javascript">
	$(function(){

		$("#content").focus(function(){

			$(this).val("");
		})
		$("#name").focus(function(){

			$(this).val("");
		})

		$("#bt").click(function(){
			var $content=$("#content").val();
			var $name=$("#name").val();
			var $message=getTime()+' '+$name+
			' 说 '+"\n"+$content;

			var	$all=$("#all").html()+$message+"\n";
			if($content&&$name!=""){
			$.ajax({
				type:"get",
				url:"message.php",
				data:$content,
				success:function(data){
					$("#all").html($all);
					$("#content,#name").val("");					
				}
			});
			
             }
		});
	})
	function getTime(){
		var date=new Date();
		var year = date.getFullYear();
            var month = date.getMonth()+1;
            var day = date.getDate();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();
            var time = year+'/'+month+'/'+
                day+' '+hours+':'+minutes+':'+seconds;
            return time;
	}
</script>
</head>
<body>
<h1>留言板</h1>
	<div id="top">
		<div id="one">
			<textarea cols="50" rows="10" id="all"></textarea>
			<div id="a"><textarea cols="25" rows="8" id="content">请输入要要留言的内容</textarea>

			
			</div>
			<div id="b"><input type="text" id="name" style="height:30px;width: 150px" value="请输入您的昵称"></input>
			
			</div>
			<div id="c"><input type="button" id="bt" value="发送" style="height: 40px;width: 150px" /></div>
		</div>
	</div>
</body>
</html>

