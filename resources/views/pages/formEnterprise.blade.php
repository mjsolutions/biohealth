@extends("mainFrame")


@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {

    		$("#botonAgregar").click(function(event){
    			event.preventDefault();
    			
    			if($("#nombreEmpresa").val() == ""){
    				$("#nombreEmpresa").parent().addClass("has-error");
    				$("#nombreEmpresa").focus();    				
    			}
    			else if($("#direccion").val() == ""){
					$("#direccion").parent().addClass("has-error");
    				$("#direccion").focus();
    			}
    			else if($("#codigoPostal").val() == ""){
					$("#codigoPostal").parent().addClass("has-error");
    				$("#codigoPostal").focus();
    			}
    			else if($("#estado option:selected").text() == "Seleccione estado"){
					$("#estado").parent().addClass("has-error");
    				$("#estado").focus();
    			}
    			else if($("#municipio option:selected").text() == "Seleccione municipio"){
					$("#municipio").parent().addClass("has-error");
    				$("#municipio").focus();
    			}
    			else if($("#telefono").val() == ""){
					$("#telefono").parent().addClass("has-error");
    				$("#telefono").focus();
    			}
    			else if($("#rfc").val() == ""){
					$("#rfc").parent().addClass("has-error");
    				$("#rfc").focus();
    			}
    			else{
    				alert("hola");
    			}			

    		});
    		
    		
    	});
    </script>	
@stop



@section("content")

	@include("partials/header")

			<div id="wrapper">

				@include("partials/menu")

				<section class="col-sm-10 col-md-10 col-lg-10 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">

							@include("partials/titleSection")					
							
							<div class="row">
								<div class="hidden-xs col-sm-8 col-md-8 col-lg-8 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
									{!! Form::Open() !!}
										<div class="shadow-division">
											<label class="mtDivision ml15 redIdentifier">Identificación:</label>						

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="nombreEmpresa">Nombre:</label>
												<div class="col-sm-8 col-md-8 col-lg-8">
													<input type="text" class="form-control" id="nombreEmpresa" placeholder="Ejemplo: MegaSalud">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="direccion">Dirección:</label>
								     			<div class="col-sm-8 col-md-8 col-lg-8">
													<input type="text" class="form-control" id="direccion" placeholder="Ejemplo: Revolución #552 Col. Centro.">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="codigoPostal">C.P.:</label>
												<div class="col-sm-8 col-md-8 col-lg-8">
													<input type="text" class="form-control" id="codigoPostal" placeholder="Ejemplo: 58000">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="estado">Estado:</label>
								     			<div class="col-sm-8 col-md-8 col-lg-8">
													<select id="estado" class="form-control">
														<option selected="true" disabled="disabled">Seleccione estado</option>   
													 	<option value="volvo">Michoacán</option>
													 	<option value="volvo">Estado de México</option>
													 	<option value="volvo">Baja California Sur</option>
													 	<option value="volvo">Jalisco</option>									 	
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="municipio">Municipio:</label>
								     			<div class="col-sm-8 col-md-8 col-lg-8">
													<select id="municipio" class="form-control">
														<option selected="true" disabled="disabled">Seleccione municipio</option>   
													 	<option value="volvo">Morelia</option>
													 	<option value="volvo">Zamora</option>
													 	<option value="volvo">Lazaro Cardenas</option>
													 	<option value="volvo">Uruápan</option>									 	
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="telefono">Telefono:</label>
								     			<div class="col-sm-8 col-md-8 col-lg-8">
													<input type="text" class="form-control" id="telefono" placeholder="Ejemplo: (443) 123 4567">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="rfc">RFC:</label>
								     			<div class="col-sm-8 col-md-8 col-lg-8">
													<input type="password" class="form-control" id="rfc" placeholder="Ejemplo: OOAI901110GQ6">
												</div>
											</div>							
										</div>

										<div class="form-group mtDivision">							
											<a href="/{{$section}}" class="mtDivision btn btn-danger col-sm-2 col-md-2 col-lg-2 col-sm-offset-2 col-md-offset-2">Cancelar</a>
											<button id="botonAgregar" class="mtDivision btn btn-primary col-sm-2 col-md-2 col-lg-2 col-sm-offset-4 col-md-offset-4">Agregar</button>							
										</div>		
									{!! Form::Close() !!}
								</div>
							</div>
				</section>
			</div>
			
			@include("partials/xsFallback")

			@include("partials/footer")
@stop