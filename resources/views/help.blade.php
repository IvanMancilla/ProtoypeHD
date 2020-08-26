@extends('template')
@section('title')
<title>Ayuda || J I E</title>
@endSection
@section('content')
  <div class="row " style="background-color: #aaa">
  <div class="col">
    <br><br><br>
  </div>
</div>
<div class="row parallaxBgBlack" style="background-color: #aaa">
  <div class="col">
    <br><br><br>
  </div>
</div>
<div class="row parallaxBgWhite">
	
	<div class="col-sm-1 col-md-2 col-lg-2"><br></div>

	<div class="col bgWhite " style="max-width: 900px;" ><!--Start col center-->
		<div class="row">
			<div class="col-12 col-sm-6 col-md-6 col-lg-6" style="background-image: url(/images/team.jpg); background-size: cover;min-height: 250px;"></div><!--END COL/IIZQ-->
		<div class="col">
	<form action="{{route('helpRequest')}}" method="POST" style="font-size: 12px; max-width: 600px;margin: 5%; " class="form-container bgWhite">
    {{ csrf_field() }}
    <div class="row">
        <div class="col">
            <h1 class="gold" style="color: #FECE78;">Contáctanos</h1>
    <label for="name">*Nombre:</label>
    <input type="text" onkeypress="return checkLetra(event)" name="name" class="form-control" value="{{old('name')}}" placeholder="Nombre" required>
        </div>

    </div>
    <br>

    <hr>
   
    <div class="row">

        <div class="col ">
            <label for="email" >*Correo</label>
            <input type="email"value="{{old('email')}}" name="email" id="usuario" class="form-control @if(session('err'))
            is-invalid
            @endIf
            " required>
            
        </div>


    </div>
    <br>
   
    <hr>
  <div class="row">

        <div class="col ">
            <label for="message" >*Tu mensaje</label>
            
            <textarea class="form-control" rows="4" name="message" id="message" required=""></textarea>
            
        </div>


    </div>
    <div class="row">
    	<div class="col">
    		<br>
    	<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="checkHelp" required>
  <label class="form-check-label" for="checkHelp">
    Al marcar su casilla y enviar su información nos concede permiso para contactarlo por medio de correo electrónico.
  </label>
</div>	
    	</div>
    </div>
        
    <br>
 
    
    <hr>
    <div class="row">
    	<div class="col" align="right">
    	<button type="submit" role="button" class="btn btn-warning">Enviar</button>		
    	</div>
    </div>
    

  </form>
</div><!--End col derecha/center--></div><!--End row center-->

</div><!-- End col center -->

  <div class="col-sm-1 col-md-2 col-lg-2" >
  	
  </div>
	
</div><!--END ROW parallax-->
@endSection