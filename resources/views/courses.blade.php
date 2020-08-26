@extends('template')
@section('title')
<title>Cursos || J I E</title>
@endSection
@section('content')
  <div class="row " style="background-color: #555">
  <div class="col">
    <br><br><br>
  </div>
</div>
<div class="row bgWhite" >
	<div class="col">
    <br>

		@forElse($courses as $course)
		
			<div class="card mb-3" style="max-width: 75%;">
  <div class="row no-gutters">
    <div class="col-md-4" style="background-image: url(/images/city2.jpg); background-size: cover;">
      
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{$course->courseName}}</h5>
        <p class="card-text" style="overflow: hidden;">{{substr($course->courseDescription,0,220)}}...</p>
        <a href="/curso/{{$course->courseId}}" class="btn bgGold" style="width: 300px;">Más detalles</a>
@if(session()->get('userType')=='admin') 
        <a href="/modifyCourse/{{$course->courseId}}" class="btn btn-info" style="width: 300px;">Modificar</a>
@endif      
        <p class="card-text"><small class="text-muted">Last updated {{$course->modifyDate}}</small></p>        
@if(session()->get('userType')=='admin')         
        <form action="{{route('deleteCourse')}}" method="POST"  class="form-container " align="right">
          {{ csrf_field() }}
          <input type="Number"  id="id" name="id" value="{{$course->courseId}}" placeholder="{{$course->courseId}}" hidden>
          <button type="submit" role="button" class="btn btn-danger">Eliminar curso</button>
        </form>
@endif              
      </div>
    </div>
  </div>
</div>
		<br>
    @empty
    <center>
    <h1>Lo sentimos, no hay cursos disponibles :( </h1>
    </center>
		@endForElse
	</div>
</div>
@endSection