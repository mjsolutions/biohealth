@extends("mainFrame")
@section("customJS")
	<script type="text/javascript">

		
    	$( document ).ready(function() {
    		$("#buttonChecar").click(function(event){
    			event.preventDefault();
    			if($("#usuario").val() == ""){
					$("#usuario").focus();
    			}
    			else if($("#clave").val() == ""){
    				$("#clave").focus();
    			}
    			else{
    				$("#submitForm").submit();
    			}
    		});

    		$("#buttonGuardar").click(function(event){
    			event.preventDefault();
    			if($("#reportTextarea").val()==""){
    				alert("El reporte de actividades debe estar lleno para poder checar salida");
    				$("#reportTextarea").focus();
    			}
    			else{
    				$("#submitFormReport").submit();
    			}
    		});

    		$("#usuario, #clave").focus(function(){
    			$("#error").hide();
    			$("#mensajeUsuario").hide();
    			$("#tiempoEvento").hide();
    		});

    		window.setInterval(function(){
			  $.ajax({
					url: "/api/getServerTime",
					success: function(response){
						$("#displayTime").html(response.time);
						$("#displayDate").html(response.date);
					}
				});
			}, 3000);

    		@if(Session::has('type-check'))
    			@if(Session::get('type-check') == 'report')
    				$('#divReporteActividades').modal({
				        show: 'true'
				    });
    			@endif
    		@endif    		
    		
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
					<label class="mtDivision bigTimeDisplay" id="displayTime">{{$displayTime}}</label>						
				</div>
				<div class="col-centered text-centered">
					<label class="smallDateDisplay blueIdentifier" id="displayDate">{{$displayDate}}</label>						
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-8 col-md-8 col-lg-6 col-sm-offset-2 col-md-offset-2 col-lg-offset-3">
			{!! Form::open(array('route' => 'checador', 'class' => 'form-horizontal', 'role' => 'form' , 'id' => 'submitForm')) !!}
				<div class="mtDivision shadow-division">

					<div class="mtDivision" style="padding-top:20px;">

						<div class="form-group">
							<label class="control-label pull-text-left col-xs-6 col-sm-4 col-md-3 col-lg-3 col-xs-offset-1 col-sm-offset-1" for="usuario">No. de Empleado:</label>
							<div class="col-xs-10 col-sm-5 col-md-6 col-lg-6 col-xs-offset-1">
								<input name="usuario" type="text" class="form-control text-centered" id="usuario">
							</div>
						</div>						


						<div class="form-group">
							<label class="control-label pull-text-left col-xs-6 col-sm-4 col-md-3 col-lg-3 col-xs-offset-1 col-sm-offset-1" for="clave">Clave:</label>
							<div class="col-xs-10 col-sm-5 col-md-6 col-lg-6 col-xs-offset-1">
								<input name="clave" type="password" class="form-control text-centered" id="clave">
							</div>
						</div>


						<div class="form-group">
							<button class="mt10 btn btn-primary col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xs-offset-4 col-sm-offset-2 col-md-offset-2" id="buttonChecar">Checar</button>
							<div style="height:37px; margin-top:7px" class="text-centered col-xs-12 col-sm-5 col-md-6 col-lg-6 col-sm-offset-1 col-md-offset-1">
								@if(Session::has('error')) <div id="error" class="smallEmployee redIdentifier mt10">{{Session::get('error')}}</div> @endif
								@if(Session::has('user')) <span id="mensajeUsuario" class="smallEmployee blueIdentifier">{{Session::get('user')}}</span><br> @endif
								@if(Session::has('type-check')) <span id="tiempoEvento" class="smallEmployee @if(Session::get('type-check') == 'entrance') greenIdentifier @elseif(Session::get('type-check') == 'departure' || Session::get('type-check') == 'done') orangeIdentifier @endif">{{Session::get('time-check')}}</span> @endif
							</div>
						</div>

					</div>

					
				</div>						
			{!! Form::close() !!}
		</div>
	</div>

	@if(Session::has('type-check'))
		@if(Session::get('type-check') == 'report')

			<div class="row">
				<div class="mtDivision col-sm-8 col-md-8 col-lg-6 col-sm-offset-2 col-md-offset-2 col-lg-offset-3 modal fade" tabindex="-1" role="dialog" id="divReporteActividades">
					{!! Form::open(array('route' => 'reporte', 'class' => 'form-horizontal', 'role' => 'form' , 'id' => 'submitFormReport')) !!}
						<input type="hidden" name="tokenCheck" value="@if(Session::has('token')){{Session::get('token')}}@endif" />
						
						<div class="shadow-division"  id="divContentReporteActividades" >
							<label class="mtDivision ml15 redIdentifier">Reporte de Actividades:</label>
							
							<div class="row mtDivision">
								<label class="pull-text-left hidden-xs col-sm-4 col-md-4 col-lg-4 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">Nombre del trabajador:</label>
								
								<div class="col-xs-10 col-sm-5 col-md-6 col-lg-6 col-xs-offset-1">
									<label class="blueIdentifier hideText">@if(Session::has('user')) {{Session::get('user')}} @endif</label>
								</div>
							</div>

							<div class="row mtDivision">
								<label class="pull-text-left hidden-xs col-sm-4 col-md-4 col-lg-4 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">Fecha de reporte:</label>
								
								<div class="col-xs-10 col-sm-5 col-md-6 col-lg-6 col-xs-offset-1">
									<label class="blueIdentifier">{{$displayDate}}</label>
								</div>
							</div>

							<div class="row mtDivision">
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
									<textarea name="reporteActividades" id="reportTextarea"></textarea>
								</div>
							</div>

							<div class="row mtDivision">
								<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-5 col-md-offset-5 col-lg-offset-5 col-centered">
									<button class="btn btn-primary col-xs-4 col-sm-4 col-xs-offset-4 col-sm-offset-4" id="buttonGuardar">Guardar</button>
								</div>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>

		@endif
	@endif

	

	
@stop

