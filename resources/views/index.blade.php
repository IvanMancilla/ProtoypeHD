@extends('template')
@section('title')
<title>Instalaciones Inteligentes</title>
@endSection
@section('content')

	<div class="row parallax" style="height: 100vh;">
		<div class="col">
<div class="parallax" style="opacity: ; ">
  
    <center>
      <br><br>
    <h1 style=" color: #FECE78; font-size: 70px;">Hawkdemy</h1>
    <h1 style=" color: white;">Coaching y capacitación</h1>
    <img src="/images/hs.png" style="max-width: 20%; filter: contrast(200%);">
    </center>
  
</div>
</div>
</div>
<div class="row" style="background-color: #eee;">
	<div class="col">

<center>
	<br>
	<h1 class="purple"><b>Nuestros próximos cursos</b></h1>
	<br>
</center>
</div>
</div>
<div class="row" style="background-color: #eee;" align="center">
<div class="col">
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <div class="card" style="width: 300px; height: 300px;">
  <img src="/images/substation.jpg" class="card-img-top" alt="...">
  <div class="card-body bg-dark">
    <h5 class="card-title gold">Calidad de la energía en redes de distribución</h5>
    
    
  </div>
</div>
    </div>
    <div class="flip-card-back">
      <h4 class="gold">Calidad de la energía en redes de distribución</h4>
      <p style="margin: 5%" class="">Proporcionar un claro entendimiento de los  elementos que intervienen en la calidad de la energía de un sistema, así como las razones por las cuales se generan interrupciones...</p>
    </div>
  </div>
  <a href="/curso/1" class="btn bgGold" style="width: 300px;">Más detalles</a>
</div>
<br><br><br>
</div><!-- End col-->

<div class="col">
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
  <div class="card" style="width: 300px;  height: 300px;">
  <img src="/images/sala.jpg" class="card-img-top" alt="...">
  <div class="card-body bg-dark">
    <h5 class="card-title gold">Código de Red</h5>
    
    
  </div>
</div>
    </div>
    <div class="flip-card-back">
      <h4 class="gold">Código de Red</h4>      
      <p>Adquirir los conocimientos que permitan evaluar el cumplimiento del Código de Red para los centros de cargar y elaborar el plan de trabajo para presentar a la CRE</p>
    </div>
  </div>
  <a href="/curso/2" class="btn bgGold" style="width: 300px;">Más detalles</a>
</div>
<br><br><br>
</div>
<div class="col">
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <div class="card" style="width: 300px; height: 300px;">
  <img src="/images/mb.jpg" class="card-img-top" style="height: 200px" alt="...">
  <div class="card-body bg-dark">
    <h5 class="card-title gold">Diseño de Subestaciones a traves del Estandar IEC-61850 Parte I</h5>
    
    
  </div>
</div>
    </div>
    <div class="flip-card-back">
      <h4 class="gold">Diseño de Subestaciones a traves del Estandar IEC-61850 Parte I</h4>
      
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim ven...</p>

      
    </div>
  </div>
  <a href="/curso/3" class="btn bgGold" style="width: 300px;">Más detalles</a>
</div>
<br><br><br>
</div>
</div> <!--EN Row cards--->
<div class="row bgWhite">

	<div class="col" align="center">
		<br><br><br>
		<a href="/cursos" class="btn bgGold btn-lg" style="">Ver todos los cursos</a>
		<br><br><br>
	</div>
	
</div>
<div class="row parallax">
	<div class="col">
<div class="parallax">
	<center>
<br><br><br><br><br>
<h1 style=" color: #FECE78; font-size: 70px; text-align: center;">Nuestros aliados</h1>
<br><br>
<img src="/images/sedpc128.png" class="zoom" style="filter: contrast(200%); transition: transform.2s;">
<img src="/images/ieee.png" class="zoom" style="filter: contrast(200%); transition: transform.2s; max-width: 178px; padding-left: 50px">
<br><br><br>
</center>
</div> <!-- END parallax-->

</div>
</div><!-- END ROW parallax-->
<div class="row bgWhite">
	<div class="col-12 col-sm-6 col-md-6 col-lg-6" style="background-image: url(/images/team.jpg); background-size: cover; min-height: 250px">
		
	</div>
	<div class=" col-12 col-sm-6 col-md-6 col-lg-6">
		<br>
	<h1 class="purple">¡Forma parte de nuestro equipo!</h1>	
	<br><br><br><br><br><br><br><br>
	<a href="/ayuda" class="btn btn-lg bgGold  " style="">Más información</a>
	<br><br>
	</div>
	
</div><!--END ROW-->
<div class="row bg-dark"><br></div>

</div>
@endSection
