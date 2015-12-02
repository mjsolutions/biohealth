@extends("mainFrame")
@section("customJS")
	<script type="text/javascript">

		
    	$( document ).ready(function() {
    		$("#buttonChecar").click(function(event){
    			event.preventDefault();
    			$("#submitForm").submit();
    		});

    		$("#buttonGuardar").click(function(event){
    			event.preventDefault();
    			if($("#reportTextarea").val()==""){
    				alert("El reporte de actividades debe estar lleno para poder checar salida");
    				$("#reportTextarea").focus();
    			}
    			else{
    				$('#divReporteActividades').modal('hide');
    			}
    		});



    		
    		
    	});
    </script>	
@stop
@section("content")
	<div class="row">
		<div class="col-sm-8 col-md-8 col-lg-8 col-centered text-centered">
			<h1>Reloj Checador</h1>
			<hr>					
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 col-sm-offset-2 col-md-offset-2 col-lg-offset-3">
			<div class="mtDivision shadow-division">
				<div class="col-centered text-centered">
					<label class="mtDivision bigTimeDisplay">14:30 Hrs</label>						
				</div>
				<div class="col-centered text-centered">
					<label class="smallDateDisplay blueIdentifier">Jueves 5 de Noviembre de 2015</label>						
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-8 col-md-8 col-lg-6 col-sm-offset-2 col-md-offset-2 col-lg-offset-3">
			{!! Form::open(array('route' => 'checar', 'class' => 'form-horizontal', 'role' => 'form' , 'id' => 'submitForm')) !!}
				<div class="mtDivision shadow-division">					
					<div class="form-group">
						<div class="mtDivision">
							<label class="control-label pull-text-left col-xs-6 col-sm-4 col-md-3 col-lg-3 col-xs-offset-1 col-sm-offset-1" for="nombreEmpresa">No. de Empleado:</label>
							<div class="col-xs-10 col-sm-5 col-md-6 col-lg-6 col-xs-offset-1">
								<input name="usuario" type="text" class="form-control text-centered" id="usuario">
							</div>
						</div>						
					</div>

					<div class="form-group">
						<label class="control-label pull-text-left col-xs-6 col-sm-4 col-md-3 col-lg-3 col-xs-offset-1 col-sm-offset-1" for="empresa">Clave:</label>
						<div class="col-xs-10 col-sm-5 col-md-6 col-lg-6 col-xs-offset-1">
							<input name="clave" type="password" class="form-control text-centered" id="clave">
						</div>
					</div>

					
					<div class="row">
						<button class="btn btn-primary col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xs-offset-4 col-sm-offset-2 col-md-offset-2" id="buttonChecar">Checar</button>
						<div class="text-centered col-xs-12 col-sm-5 col-md-6 col-lg-6 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
							<span class="smallEmployee blueIdentifier">Edgar Rene Valdovinos Cortes</span><br>
							<span class="smallEmployee greenIdentifier">Entrada 14:30 hrs</span>
						</div>
					</div>
				</div>						
			{!! Form::close() !!}
		</div>
	</div>

	<div class="row">
		<div class="mtDivision col-sm-8 col-md-8 col-lg-6 col-sm-offset-2 col-md-offset-2 col-lg-offset-3 modal fade" tabindex="-1" role="dialog" id="divReporteActividades">
			<div class="shadow-division"  id="divContentReporteActividades" >
				<label class="mtDivision ml15 redIdentifier">Reporte de Actividades:</label>
				
				<div class="row mtDivision">
					<label class="pull-text-left hidden-xs col-sm-4 col-md-4 col-lg-4 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">Nombre del trabajador:</label>
					
					<div class="col-xs-10 col-sm-5 col-md-6 col-lg-6 col-xs-offset-1">
						<label class="blueIdentifier hideText">Jose Ramón Ignacio Ochoa Alvarez</label>
					</div>
				</div>

				<div class="row mtDivision">
					<label class="pull-text-left hidden-xs col-sm-4 col-md-4 col-lg-4 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">Fecha de reporte:</label>
					
					<div class="col-xs-10 col-sm-5 col-md-6 col-lg-6 col-xs-offset-1">
						<label class="blueIdentifier">5 de Noviembre de 2015</label>
					</div>
				</div>

				<div class="row mtDivision">
					<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
						<textarea id="reportTextarea"></textarea>
					</div>
				</div>

				<div class="row mtDivision">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-5 col-md-offset-5 col-lg-offset-5 col-centered">
						<a href="javascript:void(0)" class="btn btn-primary col-xs-4 col-sm-4 col-xs-offset-4 col-sm-offset-4" id="buttonGuardar">Guardar</a>
					</div>
				</div>
			</div>			
		</div>
	</div>

	

	
@stop

