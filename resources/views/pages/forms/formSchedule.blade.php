@extends("mainFrame")
@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {

    		$("#botonAgregar").click(function(event){
    			event.preventDefault();
    			if($("#nombreHorario").val() == ""){
					$("#nombreHorario").focus();
    			}
    			else if($("#tipoHorario option:selected").text() == "Seleccione tipo de horario"){
					$("#tipoHorario").focus();
    			}
    			else{
    				$("#submitForm").submit();
    			}
    		});

    		$('#tipoHorario').change(function() {
    			if($(this).val() == '1'){
    				$("#fichaHorarioFijo").removeClass("hidden");
    				$("#fichaHorarioVariable").addClass("hidden");
    			}
    			if($(this).val() == '2'){
    				$("#fichaHorarioVariable").removeClass("hidden");
    				$("#fichaHorarioFijo").addClass("hidden");
    			}
    		});    		

		    $('#checkGenerico').change(function() {
    			if($(this).is(":checked")) {			        	
		        	$("#divGenerico").removeClass("hidden");
		        	$("#divLunes").addClass("hidden");
		        	$("#divMartes").addClass("hidden");
		        	$("#divMiercoles").addClass("hidden");
		        	$("#divJueves").addClass("hidden");
		        	$("#divViernes").addClass("hidden");
		        	$("#divSabado").addClass("hidden");
		        	$("#divDomingo").addClass("hidden");		        	
		        }
		        else{
		        	$("#divGenerico").addClass("hidden");

		        	$("input:checkbox").each(function(){
		        		var id = $(this).attr("id");
    					var day = id.substring(5, id.length);
					    var $this = $(this);


					    if($this.is(":checked")){
					    	$("#div"+day).removeClass("hidden");						        
					    }						    
					});

		        }
		        
		    });

		    $('.checkDays').change(function() {
    			var id = $(this).attr("id");
    			var day = id.substring(5, id.length);

		        if($(this).is(":checked") && !$("#checkGenerico").is(":checked")) {			        	
		        	$("#div"+day).removeClass("hidden");			        	
		        }
		        else{
		        	$("#div"+day).addClass("hidden");
		        }
		    });	


		    $('#horasACumplir, .entrada, .comida, .regreso, .salida').timepicker({ 'timeFormat': 'H:i' });
		    


		    @if (count($errors) > 0)
				$.fancybox({
					content: $('#errorsDiv').show(),
		    	    scrolling: 'no',
		    	    padding: 10	        
			    });
		    @endif		
		});
    </script>	
@stop
@section("content")
	@include("partials/header")
	<div id="wrapper">
		@include("partials/menu")
		<section class="col-sm-10 col-md-10 col-lg-10 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
			@include("partials/titleSection")
			@include("partials/errorsModal")
			<div class="row">
				<div class="hidden-xs col-sm-8 col-md-8 col-lg-8 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
					{!! Form::open(array('route' => 'horarios/agregar', 'class' => 'form-horizontal', 'role' => 'form' , 'id' => 'submitForm')) !!}
						<div class="shadow-division">
							<label class="mtDivision ml15 redIdentifier">Identificación:</label>						

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="nombre">Nombre:</label>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<input value="{{Input::old('nombre')}}" name="nombre" type="text" class="form-control" id="nombreHorario" placeholder="Ejemplo: 9hrs-16hrs Corrido">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="tipo">Tipo:</label>
				     			<div class="col-sm-6 col-md-6 col-lg-6">
									<select name="tipo" id="tipoHorario" class="form-control">
										<option selected="true" disabled="disabled">Seleccione tipo de horario</option>
									 	<option value="1">Fijo</option>
									 	<option value="2">Variable</option>
									 	<!-- <option value="3">Rotativo</option> -->
								 	</select>									
								</div>
							</div>														
						</div>

						<div class="mtDivision shadow-division hidden" id="fichaHorarioFijo">	
							<label class="mtDivision ml15 redIdentifier">Detalles de Horario Fijo:</label>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="dias">Dias:</label>
								<div class="col-sm-3 col-md-3 col-lg-3">
									<input type="checkbox" class="checkDays" name="diasFijo[]" id="checkLunes" value="1">Lunes <br>
									<input type="checkbox" class="checkDays" name="diasFijo[]" id="checkMartes" value="2">Martes <br>
									<input type="checkbox" class="checkDays" name="diasFijo[]" id="checkMiercoles" value="3">Miercoles <br>
									<input type="checkbox" class="checkDays" name="diasFijo[]" id="checkJueves" value="4">Jueves <br>
									<input type="checkbox" class="checkDays" name="diasFijo[]" id="checkViernes" value="5">Viernes <br>
									<input type="checkbox" class="checkDays" name="diasFijo[]" id="checkSabado" value="6">Sabado <br>
									<input type="checkbox" class="checkDays" name="diasFijo[]" id="checkDomingo" value="7">Domingo <br>
								</div>

								<div class="col-sm-5 col-md-5 col-lg-5" style="margin-top: 65px;">
									<input type="checkbox" name="mismoHorarioTodosDias" id="checkGenerico" value="mismo">Mismo horario para todos los días marcados
								</div>
							</div>


							<div class="row mtDivision hidden" id="divGenerico">
								<div class="form-group">
									<label class="mtDivision blueIdentifier control-label pull-text-left col-sm-5 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1">Todos los días marcados:</label>
								</div>

								<div class="form-group">
									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="inicio">Hora entrada:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="entrance_x" type="text" class="form-control entrada" placeholder="">														
									</div>


									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2" for="inicio">Hora comida:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="break_x" type="text" class="form-control comida" placeholder="">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="inicio">Hora regreso:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="return_x" type="text" class="form-control regreso" placeholder="">
									</div>


									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2" for="inicio">Hora salida:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="departure_x" type="text" class="form-control salida" placeholder="">
									</div>
								</div>
							</div>


							<div class="row mtDivision hidden" id="divLunes">

								<div class="form-group">
									<label class="mtDivision blueIdentifier control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1">Lunes:</label>
								</div>

								<div class="form-group">
									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="inicio">Hora entrada:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="entrance_1" type="text" class="form-control entrada" placeholder="">
									</div>


									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2" for="inicio">Hora comida:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="break_1" type="text" class="form-control comida" placeholder="">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="inicio">Hora regreso:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="return_1" type="text" class="form-control regreso" placeholder="">
									</div>


									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2" for="inicio">Hora salida:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="departure_1" type="text" class="form-control salida" placeholder="">
									</div>
								</div>
							</div>

							<div class="row mtDivision hidden" id="divMartes">
								
								<div class="form-group">
									<label class="mtDivision blueIdentifier control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1">Martes:</label>
								</div>

								<div class="form-group">
									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="inicio">Hora entrada:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="entrance_2" type="text" class="form-control entrada" placeholder="">
									</div>


									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2" for="inicio">Hora comida:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="break_2" type="text" class="form-control comida" placeholder="">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="inicio">Hora regreso:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="return_2" type="text" class="form-control regreso" placeholder="">
									</div>


									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2" for="inicio">Hora salida:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="departure_2" type="text" class="form-control salida" placeholder="">
									</div>
								</div>
							</div>

							<div class="row mtDivision hidden" id="divMiercoles">
								
								<div class="form-group">
									<label class="mtDivision blueIdentifier control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1">Miercoles:</label>
								</div>

								<div class="form-group">
									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="inicio">Hora entrada:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="entrance_3" type="text" class="form-control entrada" placeholder="">
									</div>


									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2" for="inicio">Hora comida:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="break_3" type="text" class="form-control comida" placeholder="">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="inicio">Hora regreso:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="return_3" type="text" class="form-control regreso" placeholder="">
									</div>


									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2" for="inicio">Hora salida:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="departure_3" type="text" class="form-control salida" placeholder="">
									</div>
								</div>
							</div>

							<div class="row mtDivision hidden" id="divJueves">
								
								<div class="form-group">
									<label class="mtDivision blueIdentifier control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1">Jueves:</label>
								</div>

								<div class="form-group">
									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="inicio">Hora entrada:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="entrance_4" type="text" class="form-control entrada" placeholder="">
									</div>


									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2" for="inicio">Hora comida:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="break_4" type="text" class="form-control comida" placeholder="">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="inicio">Hora regreso:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="return_4" type="text" class="form-control regreso" placeholder="">
									</div>


									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2" for="inicio">Hora salida:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="departure_4" type="text" class="form-control salida" placeholder="">
									</div>
								</div>
							</div>

							<div class="row mtDivision hidden" id="divViernes">
								
								<div class="form-group">
									<label class="mtDivision blueIdentifier control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1">Viernes:</label>
								</div>

								<div class="form-group">
									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="inicio">Hora entrada:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="entrance_5" type="text" class="form-control entrada" placeholder="">
									</div>


									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2" for="inicio">Hora comida:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="break_5" type="text" class="form-control comida" placeholder="">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="inicio">Hora regreso:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="return_5" type="text" class="form-control regreso" placeholder="">
									</div>


									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2" for="inicio">Hora salida:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="departure_5" type="text" class="form-control salida" placeholder="">
									</div>
								</div>
							</div>

							<div class="row mtDivision hidden" id="divSabado">
								
								<div class="form-group">
									<label class="mtDivision blueIdentifier control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1">Sabado:</label>
								</div>

								<div class="form-group">
									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="inicio">Hora entrada:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="entrance_6" type="text" class="form-control entrada" placeholder="">
									</div>


									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2" for="inicio">Hora comida:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="break_6" type="text" class="form-control comida" placeholder="">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="inicio">Hora regreso:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="return_6" type="text" class="form-control regreso" placeholder="">
									</div>


									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2" for="inicio">Hora salida:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="departure_6" type="text" class="form-control salida" placeholder="">
									</div>
								</div>
							</div>

							<div class="row mtDivision hidden" id="divDomingo">
								
								<div class="form-group">
									<label class="mtDivision blueIdentifier control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1">Domingo:</label>
								</div>

								<div class="form-group">
									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="inicio">Hora entrada:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="entrance_7" type="text" class="form-control entrada" placeholder="">
									</div>


									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2" for="inicio">Hora comida:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="break_7" type="text" class="form-control comida" placeholder="">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="inicio">Hora regreso:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="return_7" type="text" class="form-control regreso" placeholder="">
									</div>


									<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2" for="inicio">Hora salida:</label>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<input name="departure_7" type="text" class="form-control salida" placeholder="">
									</div>
								</div>
							</div>
						</div>

						<div class="mtDivision shadow-division hidden" id="fichaHorarioVariable">	
							<label class="mtDivision ml15 redIdentifier">Detalles de Horario Variable:</label>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="dias">Dias:</label>
								<div class="col-sm-2 col-md-2 col-lg-2">
									<input type="checkbox" name="diasVariable[]" id="checkLunes" value="1">Lunes <br>
									<input type="checkbox" name="diasVariable[]" id="checkMartes" value="2">Martes <br>
									<input type="checkbox" name="diasVariable[]" id="checkMiercoles" value="3">Miercoles <br>
									<input type="checkbox" name="diasVariable[]" id="checkJueves" value="4">Jueves <br>
									<input type="checkbox" name="diasVariable[]" id="checkViernes" value="5">Viernes <br>
									<input type="checkbox" name="diasVariable[]" id="checkSabado" value="6">Sabado <br>
									<input type="checkbox" name="diasVariable[]" id="checkDomingo" value="7">Domingo <br>
								</div>

								
								<label class="control-label pull-text-left col-sm-3 col-md-3 col-lg-3" for="dias">Horas a cumplir:</label>
								<div class="col-sm-3 col-md-3 col-lg-3">
									<input type="text" name="horasDiarias" class="form-control" id="horasACumplir" placeholder="">
								</div>
								
							</div>
						</div>


						@include("partials/buttonsFormSection")	
					{!! Form::close() !!}
				</div>
			</div>
		</section>
	</div>			
	@include("partials/xsFallback")
	@include("partials/footer")
@stop