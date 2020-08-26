@extends('template')
@section('title')
<title>Iniciar Sesión</title>
@endSection
@section('content')
  <div class="row " style="background-color: #555">
  <div class="col">
    <br><br><br>
  </div>
</div>
<div class="row">
	<div class="col"></div>
	<div class="col">
		<br>
    <h1 class="gold">Inicio de sesión (Instructores)</h1>
		<form method="POST" action="{{route('LoginInstructor')}}" method="POST">
			{{ csrf_field() }}
                  <label for="email">Correo:</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="micorreo@ejemplo.com" required>
                  <br>
                  <label for="password">Contraseña:</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="******" required>
                  <br>
                  <div align="right">      
                    <input  type="reset" name="" class="btn btn-outline-danger" value="Limpiar">
                    <input  type="submit" name="" class="btn btn-info" value="Ingresar">
                  </div>
                </form>
                <br>
	</div>
	<div class="col"></div>
</div>
@endSection