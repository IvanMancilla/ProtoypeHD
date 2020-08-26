@extends('template')
@section('extraScripts')
<script type="text/javascript" src="/js/scripts.js"></script>
@endSection
@section('title')
<title>Crear Curso || J I E</title>
@endSection
@section('content')
  <div class="row " style="background-color: #aaa">
  <div class="col">
    <br><br><br>
  </div>
</div>
@if(session()->get('userType')=='admin')
<div class="row bgWhite">
	<div class="col-12 col-sm-6 col-md-6 col-lg-6">
		<br>
		<h1 class="gold" style="color: #FECE78;">Nuevo curso</h1>
		<form action="{{route('newCourse')}}" method="POST" style="font-size: 12px; max-width: 600px;margin: 5%; " class="form-container ">
    		{{ csrf_field() }}
    		<div class="row">
    			<div class="col">
    				<label for="name">*Nombre:</label>
    				<input type="text" id="name" name="name" class="form-control" value="{{old('name')}}" placeholder="Nombre" required>
    				<br>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col">
    				<label for="instructor">*Instructor</label>                    
    				<select id="instructor" class="form-control" name="instructor" >
@foreach($instructors as $instructor)
                        <option value="{{$instructor->instructorId}}">{{$instructor->instructorFirstName}} {{$instructor->instructorLastName}}</option>
@endforeach

    				</select>
    				<hr>
    			</div>
    		</div>

    		<div class="row">
    			<div class="col">
    				<label for="startDate" >*Fecha de Inicio</label>
    				<input type="date" id="startDate" class="form-control" name="startDate" required>
    				<br>
    			</div>
    		</div>
    		
    		<br>
    		<h5>Duración</h5>
    		<div class="row">
    			<div class="col">
    				<label for="hours" >*Horas</label>
    				<input type="Number" id="hours" max="99" min="1" class="form-control" name="hours" size="1" required>
    			</div>
    			<div class="col">
    				<label for="minutes" >*Minutos</label>
    				<input type="Number" id="minutes" max="59" min="0" class="form-control" name="minutes" maxlength="2" required>
    			</div>
    			
    		</div>
    		<br>
    		<div class="row">
    			<div class="col "  id="dateSection">
    				<label for="d1">Día 1</label>
                    <input type="date" name="day1" id="day1" class="form-control">
                    <label for="start1">Hora de inicio</label>
                    <input type="time" name="start1" id="start1" class="form-control">
                    <label for="end1">Hora de fin</label>
                    <input type="time" name="end1" id="end1" class="form-control">
                    <input type="Number"  id="contDay" name="contDay"  placeholder="1" value="1" hidden>
                    <hr>
    			</div>
    		</div>
    		<br>
    		<p class="btn btn-success" onclick="addDay()">Agregar Dia</p>
<hr>
    		<div class="row">
    			<div class="col">
    				<label for="description">*Descripción/Resumen</label>
    				<textarea class="form-control" rows="4" name="description" id="description" required></textarea>
    				<br>
    			</div>
    		</div>

    		<div class="row">
    			<div class="col">
    				<label for="category">*Categoría</label>
    				<select class="form-control" id="category" name="category" required>
    					
@foreach($categories as $category)
            
            <!--Se saca el subTopic individualmente-->
            

                <?php 
                    $sc=explode(';',$category->subCategories);
                    
                    foreach ($sc as $sub ) {
                        echo "<option value='$category->categoryId'>";
                        echo $sub;
                        echo "</option>";
                    }
                
                ?>
            
                                  
@endForeach
    				</select>
    				<br>
    			</div>

    			<div class="col">
    				<label for="modality">*Modalidad</label>
    				<select class="form-control" id="modality" name="modality" required>
    					<option value="P">Presencial</option>
    					<option value="O">Online</option>
    				</select>
    				
    			</div>
    		</div>
<hr>
    		<div class="row">
    			<div class="col">
    				<label for="CP">*Código Postal</label>
    				<input type="Number" id="CP" class="form-control" name="CP" required>
    				<br>
    			</div>    			
    		</div>

    		<div class="row">
    			<div class="col">
    				<label for="map">Lugar</label>
                    <select class="form-control" id="map" name="map" required>
                        <option value="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3766.45946412719!2d-99.09979788578433!3d19.262375451094723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce03e3bb9a0a03%3A0xfcfe0467956832e4!2sSEDPC%20SA%20de%20CV!5e0!3m2!1ses-419!2smx!4v1583370172640!5m2!1ses-419!2smx">SEDPC</option>
                        <option value="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3764.1442438706413!2d-99.18563468509437!3d19.36290598692394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff8c890a93dd%3A0xc6ce7f403d3e7978!2sIQ4%20S.A.%20de%20C.V.!5e0!3m2!1ses-419!2smx!4v1591330277890!5m2!1ses-419!2smx">IQ4</option>
                        <option value="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d791.1052982941562!2d-99.1197541566325!3d19.405828899201335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1fe9414c62be3%3A0x7052e44f1aaf9534!2sHoliday%20Inn!5e0!3m2!1ses-419!2smx!4v1591330212891!5m2!1ses-419!2smx">Holliday Inn</option>
                    </select>
    				
    				<hr>
    			</div>
    		</div>
    		
    		<div class="row">
    			<div class="col">
    				<label for="image">Imágen</label>
    				<input type="file" class="form-control-file" id="image" name="image">
    				<br>
    			</div>

    			<div class="col">
    				<label for="places">*Cupo máximo</label>
    				<input type="Number" class="form-control" max="40" id="places" name="places" required>
    				<br>
    			</div>
    		</div>

    		<div class="row">
    			<div class="col">
    				<label for="generalCost">*Costo general</label>
    				<input type="Number" name="generalCost" id="generalCost" class="form-control" required>
    			</div>
    			<div class="col">
    				<label for="generalCost">Costo con certificación</label>
    				<input type="Number" name="certificationCost" id="certificationCost" class="form-control">
    				
    			</div>    			
    		</div>
<hr>
    		<div class="row">
    			<div class="col" id="topicsSection">
    				<h3>Temas:</h3>
    				<label for="t1">Tema 1</label>
    				<input type="text"class="form-control" name="t1" id="t1">
    				<br>
    				<label for="ta1">Subtemas</label>
    				<textarea class="form-control" id="ta1" name="ta1"></textarea>
    				<hr>
    			</div>
    		</div>

			<p class="btn btn-success" onclick="addTopic()">Agregar tema</p>

    		<div class="row" >
    			<div class="col">

    				<input type="Number"  id="cont" name="cont" value="1" placeholder="1" hidden>
    			</div>
    		</div>

    		

    		<script type="text/javascript">
    			var i=2;
                var d=2
    			function addDay()
    			{
    				
    				var dateSection = document.getElementById("dateSection");
    				var labDate = document.createElement("label");
                    var labStart = document.createElement("label");
                    var labEnd = document.createElement("label");
    				var inputDate = document.createElement("input");
    				var inputStart = document.createElement("input");
    				var inputEnd = document.createElement("input");
                    var br = document.createElement("hr");

    				inputDate.setAttribute("class", "form-control");
    				inputDate.setAttribute("type", "date");
                    inputDate.setAttribute("id", "day"+d);
                    inputDate.setAttribute("name", "day"+d);
    				inputStart.setAttribute("class", "form-control");
    				inputStart.setAttribute("type", "time");
                    inputStart.setAttribute("id", "start"+d);
                    inputStart.setAttribute("name", "start"+d);
    				inputEnd.setAttribute("class", "form-control");
    				inputEnd.setAttribute("type", "time");
                    inputEnd.setAttribute("id", "end"+d);
                    inputEnd.setAttribute("name", "end"+d);

                    labDate.innerHTML = "Día "+d;
                    labStart.innerHTML = "Hora de Inicio";
                    labEnd.innerHTML = "Hora de fin";

                    var conDay=document.getElementById("contDay");
                    conDay.setAttribute("value",d);

                    d++;

                    dateSection.appendChild(labDate);
    				dateSection.appendChild(inputDate);
                    dateSection.appendChild(labStart);
    				dateSection.appendChild(inputStart);
                    dateSection.appendChild(labEnd);
    				dateSection.appendChild(inputEnd);
                    dateSection.appendChild(br);

    			}

    			function addTopic(){


    			var sec=document.getElementById("topicsSection");
    			var inp = document.createElement("input");
    			var ta = document.createElement("textarea");
    			var br = document.createElement("br");
    			var hr = document.createElement("hr");
    			var	lab = document.createElement("label");
    			var	lab2 = document.createElement("label");

    			inp.setAttribute("class", "form-control");
    			inp.setAttribute("id", "t"+i);
                inp.setAttribute("name", "t"+i);
    			ta.setAttribute("class", "form-control");
    			ta.setAttribute("id", "ta"+i);
                ta.setAttribute("name", "ta"+i);

    			lab.innerHTML = "Tema "+i;
    			lab2.innerHTML = "Subtemas";

    			var con=document.getElementById("cont");
    			con.setAttribute("value",i);

    			i++;
    			sec.appendChild(lab);
    			sec.appendChild(inp);
    			sec.appendChild(br);
    			sec.appendChild(lab2)
    			sec.appendChild(ta);
    			sec.appendChild(hr);
    			}
    		</script>
    			
    		
    		
    		
    		<button type="submit" role="button" class="btn btn-success">Crear curso</button>
		</form>
	</div>
	<div class="col-12 col-sm-6 col-md-6 col-lg-6" style="background-image: url(/images/bgBlack.jpg);">
		
	</div>
@else
<h1>No cuenta con permisos para esta acción</h1>
@endif
</div>
@endSection