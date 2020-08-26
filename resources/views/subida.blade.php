<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<form action="/media" enctype="multipart/form-data" method="post">
    {{ csrf_field() }}
    <input type="file" name="image">
    <button type="submit">Upload</button>
</form>
<img src="/storage/instructors/2000000.jpeg">
</body>
</html>