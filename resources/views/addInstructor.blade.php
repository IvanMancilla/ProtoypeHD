@extends('template')
@section('title')
<title>Agregar Instructor</title>
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
		<h1 class="gold" style="color: #FECE78;">Agregar Instructor</h1>
		<br>
		<form method="POST" action="{{route('newInstructor')}}" enctype="multipart/form-data" method="POST">
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

    			<div class="col">
    				<label for="birthday" >*Fecha de Nacimiento</label>
    				<input type="date" id="birthday" class="form-control" name="birthday" required>
    				<br>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col">
    				<label for="phone_num">Teléfono</label>
        			<input type="tel" value="{{old('phone_num')}}" name="phone_num" class="form-control">
    				<br>
    			</div>

    			<div class="col">
    				<label for="image">Imágen</label>
    				<input type="file" class="form-control-file" id="image" name="image">
    				<br>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col">
    				<label for="description">Descripción</label>
    				<textarea class="form-control" rows="4" name="description" id="description" ></textarea>
    				<br>
    			</div>
    		</div>
			<button type="submit" role="button" class="btn btn-success">Registrar instructor</button>
		</form>
        <br>
	</div>
	<div class="col-12 col-sm-6 col-md-6 col-lg-6" style="background-image: url(/images/bgBlack.jpg); background-size: cover;"></div>
@else
<h1>No cuenta con permisos para esta acción</h1>
@endif  
</div>
@endSection