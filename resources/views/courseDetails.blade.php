@extends('template')
@section('title')
<title>Curso {{$course->courseName}} || J I E</title>
@endSection
@section('content')
  <div class="row " style="background-color: #555">
  <div class="col">
    <br><br><br>
  </div>
</div>
<div align="left" class="row bgWhite"  >	<!--style="background-color:  #454545" -->

<div class="col-md-6 col-sm-12 col-12">
	<br>
	<div class="row">
		<div class="col">
	<h1 class="gold">{{$course->courseName}}</h1>
	</div>
	</div>
	<hr>
	<div class="row">
		<div class="col">
	<p class="">{{$course->courseDescription}}</p>
	</div>
	<br>
	</div>	
	<div class="row">
		<div class="col">
	<label for="instructor">Instructor:</label>
	<a href="" id="instructor">{{$instructor->instructorFirstName}}</a>
	</div>
	<div class="col">
	<img src="{{$instructor->instructorImage}}" style="max-width: 100px">
	</div>
	</div>
	<div class="row">
		<div class="col">
			<p>Fecha: {{$course->courseDate}}</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p>Duración: {{$course->courseDuration}} hrs.</p>
			
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col">
	<h4>Temario</h4>
	</div>
</div>
	<div class="row">
		<div class="col">
	<div style="overflow: scroll; max-height: 250px">

	<ol class="" style="font-size: 12px" >
		
			@foreach($topics as $t)
			<li>{{$t->topicName}}</li>
			<!--Se saca el subTopic individualmente-->
			<ul>

				<?php 
					$a=explode(';',$t->subTopics);
					$b=compact('a');
					foreach ($a as $c ) {
						echo "<li>";
						echo $c;
						echo "</li>";
					}
				
				?>
			
			</ul>						
			@endForeach
	
	</ol>
	</div> <!-- Div temario -->
	</div>
	</div><!--Row Temario-->
	<br>
	<div align="center">
@if(session()->get('userId')==null)
<h3>Para registrarse a este curso necesita iniciar sesión</h3>
@elseif($course->courseStatus=='P')
	@if($preregistro==null)
	<form action="{{route('preregister')}}" method="POST">
		{{ csrf_field() }}
		<input type="number" name="courseId" hidden="" value="{{$course->courseId}}">
		<input type="submit" class="btn btn-warning" name="" value="Preregistrarse">
	</form>
	@else
	<h3>Ya se encuentra preregistrado</h3>
	@endif
@elseif($course->courseStatus=='R')
@if($registro==null)
	@if(($course->availablePlaces)>0)
	<form action="{{route('courseRegister')}}" method="POST">
		{{ csrf_field() }}
		<input type="number" name="courseId" hidden="" value="{{$course->courseId}}">
		<input type="submit" class="btn btn-warning" name="" value="Registrarse">
	</form>
	@else
	<h3>Cupo lleno, contacte a un administrador</h3>
	@endif
@else
	<h3>Ya se encuentra registrado</h3>
@endif
@endIf
	</div>
</div> <!--COL información-->
	<div class="col-md-6 col-sm-12 col-12">	 <!-- style="background-image: url(/images/energy.jpg); background-size: cover"-->
		<br>
		<div class="row">
			<div class="col" style="background-image: url(/images/energy.jpg); background-size: cover; height: 300px">
  				
  			</div>
		</div>
		<Hr>
		<div class="row">
			<div class="col">
				<h4>Lugar:</h4>
				<h5>CDMX</h5>
  			<iframe src="{{$course->courseMap}}" width="500" height="300" frameborder="0" style="border:0; max-width: 100%" allowfullscreen=""></iframe>
  			</div>
  		</div>
	</div>
</div>

<div class="row bgWhite" >
	<div class="col">
		<h1></h1>
			
		
	</div>
	
</div>


@endSection