@extends('template')
@section('title')
<title> {{$instructor->instructorFirstName}} {{$instructor->instructorLastName}} || J I E</title>
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
	<h1 class="gold">{{$instructor->instructorFirstName}} {{$instructor->instructorLastName}}</h1>
	</div>
	</div>
	<hr>
	<div class="row">
		<div class="col">
			<h4>Información</h4>
	<p class="">{{$instructor->instructorAbstract}}</p>
	</div>
	<br>
	</div>	
	
	

	<hr>
	<div class="row">
		<div class="col">
	
	</div>
</div>
	
	<br>
	<div align="center">

	</div>
</div> <!--COL información-->
	<div class="col-md-6 col-sm-12 col-12">	 <!-- style="background-image: url(/images/energy.jpg); background-size: cover"-->
		<br>
		<div class="row">
			<div class="col" align="center">
  				<img src="{{$instructor->instructorImage}}" style="max-width: 250px">
  				
  			</div>
		</div>
		<Hr>
		<div class="row">
			<div class="col">
@if((session()->get('userId')==$instructor->instructorId)&&(session()->get('userType')=='instructor'))				
<h3>Solo tu puedes ver tu código</h3>
@endif  			
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