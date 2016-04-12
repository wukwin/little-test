<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>upload</title>
</head>
<body>
	<form action="doAction3.php" method="post" enctype="multipart/form-data">
	please choose your file:<br/>
	<input type="file" name="myfile1"/><br/>
	<input type="file" name="myfile2"/><br/>
	<input type="file" name="myfile[]"/><br/>
	<input type="file" name="myfile[]"/><br/>
	<input type="file" name="myfile[]" multiple="multiple" /><br/>
	<input type="submit" value="upload your file" />
	</form>
</body>
</html>