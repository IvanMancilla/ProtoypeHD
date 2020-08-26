<!DOCTYPE html>
<html>
<head>
	<script>
    window.onload=function(){
                // Una vez cargada la página, el formulario se enviara automáticamente.
		document.forms["miformulario"].submit();
    }
    </script>
	<title>writer</title>
</head>
<body>
<form  method="post" action="/hqr/genHQR.php" name="miformulario">
				Nombre(s): <input type="text" name="name" required="required" pattern="[A-Z a-z]{1,30}" value="{{$user->participantFirstName}}" hidden=""><br><br>
				Apellidos: <input type="text" name="lastname" required="required" pattern="[A-Z a-z]{1,30}" value="{{$user->participantLastName}}" hidden=""><br><br>
				ID: <input type="text" name="id" required="required" pattern="[0-9]{7}" value="{{$user->participantId}}" hidden=""><br><br>
				Tipo de cuenta: <input type="radio" name="type" value="s" checked>Estudiante <input type="radio" name="type" value="i" hidden="">Instructor<br><br>
				<input type="submit" hidden="">
			</form>
</body>
</html>