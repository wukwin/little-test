-<!DOCTYPE html>
-<html>
-<head>
-<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
-<title>little test</title>
-<style>
-    .hide{display:none; background:red;}
-    a{text-decoration:none;}
<script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.js"></script>
-</style>
-</head>
-<body>

	<a>this is a test</a>
	<a href="#">this is a second test</a>
	<a href="#">commit really need time?</a>
-    <ul>
-        <li>1</li>
-        <li>2</li>
-        <li>3</li>
-        <li>4</li>
-        <a href="#">more</a>
-        <li class="hide">5</li>
-        <li class="hide">6</li>
-        <li class="hide">7</li>
-        <li>8</li>
-    </ul>
-</body>
-<script type="text/javascript">
-   $(function(){
-      $("a").click(function(){
-          if($("a").html()=="more"){
-              $(".hide").show();
-              $("a").html("simple");
-          }
-          else{
-              $(".hide").hide();
-              $("a").html("more");
-          }
-      });  
-})
-</script>
-</html>
