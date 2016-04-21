<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#sub").click(function(){
                
                var content=$("#content").val();
            })
            $.ajax({
                
                type:"GET",
                url:"message.php",
                data:{
                    
                    content:content,
                },
                success:function(data){
                    $("#all").html(content);
                }
                
            })
            
            
            })
        
        // $(document).ajaxStart(function(){
        //         $("span").show().html("留言发送中..");
        //     });
        //     $(document).ajaxStop(function(){
        //         $("span").html("留言成功!").hide();
        //     });
    </script>
</head>
<body>
    <textarea id="all"></textarea>
    <textarea id="content"></textarea>
    <input type="button" id="sub" value="提交"/>
    <span></span>
</body>
</html>




