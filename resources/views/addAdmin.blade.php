@extends('template')
@section('title')
<title>Agregar Administrador</title>
@endSection
@section('content')
  <div class="row " style="background-color: #555">
  <div class="col">
    <br><br><br>
  </div>
</div>
@if(session()->get('userType')=='admin')
<div class="row">
	
	<div class="col-12 col-sm-6 col-md-6 col-lg-6">
		<br>
		<h1 class="gold" style="color: #FECE78;">Agregar Administrador</h1>
		<br>
		<form method="POST" action="{{route('newAdmin')}}" method="POST">
			{{ csrf_field() }}

			<div class="row">
    			<div class="col">
    				<label for="name">*Nombre:</label>
    				<input type="text" id="name" name="name" class="form-control" value="{{old('name')}}" placeholder="Nombre" required>
    				<br>
    			</div>
    		
    			<div class="col">
    				<label for="name">*Apellidos:</label>
    				<input type="text" id="lastName" name="lastName" class="form-control" value="{{old('lastName')}}" placeholder="Apellidos" required>
    				<br>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col">
    				<label for="email" >*Correo</label>
            <input type="email"value="{{old('email')}}" name="email" id="usuario" class="form-control @if(session('err'))
            is-invalid
            @endIf
            " placeholder="correo@ejemplo.com" required>
            @if(session('err'))
            <div class="invalid-feedback">
          El correo ya se encuentra registrado
        </div>
        @endIf
        <br>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col">
    				<label for="password" >*Contraseña</label>
            		<input type="password"  minlength="6" name="password" class="form-control" required>
    				<br>
    			</div>

    			
    		</div>
			<button type="submit" role="button" class="btn btn-success">Registrar Administrador</button>
		</form>
        <br>
	</div>
	<div class="col-12 col-sm-6 col-md-6 col-lg-6" style="background-image: url(/images/bgBlack.jpg); background-size: cover;"></div>
@else
<h1>No cuenta con permisos para esta acción</h1>
@endif    
</div>
@endSection