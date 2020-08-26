@extends('template')
@section('title')
<title> {{$participant->participantFirstName}} {{$participant->participantLastName}} || J I E</title>
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
	<h1 class="gold">{{$participant->participantFirstName}} {{$participant->participantLastName}}</h1>
	</div>
	</div>
	<hr>
	<div class="row">
		<div class="col">
	<p class="">{{$participant->participantFirstName}}</p>
	</div>
	<br>
	
		
	<div class="col">
	<img src="{{$participant->participantImage}}" style="max-width: 100px">
	</div>
	</div>
	

	<hr>
	<div class="row">
		<div class="col">
	<h4>Información</h4>
	</div>
	</div>
	<div class="row">
		<div class="col">
			Teléfono:
		</div>
	</div>
	<div class="row">
		<div class="col">
			País:
		</div>
	</div>
	<div class="row">
		<div class="col">
			Código postal	
		</div>
	</div>
	
	<br>
	<div align="center">

	</div>
</div> <!--COL información-->
	<div class="col-md-6 col-sm-12 col-12">	 <!-- style="background-image: url(/images/energy.jpg); background-size: cover"-->
		
		<Hr>
		<div class="row">
			<div class="col" align="center">
@if((session()->get('userId')==$participant->participantId)&&(session()->get('userType')=='participant'))				
<h3>Solo tu puedes ver tu código</h3>
<img src="/images/participants/tmp_3000002.png" style="max-width:300px ">
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