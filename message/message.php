<!-- 这个是别人写的留言板 -->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
	<title>留言板</title>
    <script src="http://www.imooc.com/data/jquery-1.8.2.min.js" type="text/javascript"></script>
   	<style>
		*{padding:0px;margin:0px;}
		#main{
			width:450px;
			height:400px;
			border:3px solid #ccc;
			margin:20px;
			}
		#contentList{
			width:400px;
			height:200px;
			border:1px solid #ccc;
			margin:24px;
			overflow-y:scroll;
            word-wrap: break-word;
			}
        #sendCon{width:inherit;height:125px;}
		#putCon{
			float:left;
			margin-left:23px;
			}
        
		#name{ line-height:30px; }
		#name,#sendBtn{
			margin-top:15px;
            margin-left: 6px;
			width:150px;
			height:30px;
			}
        #txtSpan,#nameSpan{
            color:red;
            font-size: 15px;
            }
        #nameSpan{margin-left: 13px;}
        #pName{ color:blue; }
        #pTxt{ color:#dd1ad5; }
        #tip{font-size: 12px;color:gray;}
    </style>
</head>

<body>
	<div id="main">
        <!--显示内容-->
    	<div id="contentList"></div>
        
        <div id="sendCon">
            <div id="putCon">
                <!--留言-->
                <textarea rows="8" cols="30">请输入你要留言的内容！</textarea>
                <br/>
                <span id="txtSpan"></span>
             </div>

            <div id="nameBtn">
                <!--昵称-->
                <input id="name" type="text" value="请输入您的昵称！" /> 
                <br/>
                <span id="nameSpan"></span><br/>
                <!--发送按钮-->
                <input id="sendBtn" type="button" value="发送" />
             </div>
        </div>
        <center><span id="tip"></span></center>
    </div>
    
    <script>
        $(function(){
            // 为留言框、昵称添加点击事件，清空预内容
            $("textarea").focus(function(){
                    $(this).val("");
            });
            $("#name").focus(function(){
                    $(this).val("");
            });
            
            // 添加点击事件-按钮
            $("#sendBtn").click(function(){
                var $sendTxt = $("textarea").val();
                var $name = $("#name").val();
                var $message = getTime()+' '+
                    '<span id="pName">'+$name+'</span>'+' 说：'+
                    '<span id="pTxt">'+$sendTxt+'</span>'+'<br/>';
                var $content = $("#contentList").html()+$message;
                if($sendTxt&&$name!=""){
                    $.ajax({
                        url:"",
                        data: $content,
                        success:function(data){
                            $("#contentList").html($content);
                            $("#txtSpan,#nameSpan").html("");
                        }
                    });
                }else if($name==""&&$sendTxt!=""){   
                    $("#nameSpan").html("昵称不能为空!");
                    $("#txtSpan").html("");
                    $("#name").focus();
                }else if($sendTxt==""&&$name!=""){
                    $("#txtSpan").html("留言内容不能为空!");
                    $("#nameSpan").html("");
                    $("textarea").focus();
                }else{
                    $("#txtSpan").html("留言或昵称不能为空!");
                    $("textarea").focus();
                } 
                
                $("#tip").ajaxStart(function(){
                    $(this).show().html("留言发送中..");
                });
                $("#tip").ajaxStop(function(){
                    $(this).html("留言成功!");
                });  
                
                //计时器
                setTimeout(function(){
                    $("#tip").html("");
                },1000);
            });
        })
        
        function getTime(){
            var date = new Date();
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
</body>
</html>