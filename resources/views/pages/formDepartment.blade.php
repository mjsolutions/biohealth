@extends("mainFrame")


@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {
    		$("#botonAgregar").click(function(event){
    			event.preventDefault();
    			if($("#empresa option:selected").text() == "Seleccione empresa"){
					$("#empresa").parent().addClass("has-error");
    				$("#empresa").focus();
    			}    			
    			else if($("#sucursal option:selected").text() == "Seleccione sucursal"){
					$("#sucursal").parent().addClass("has-error");
    				$("#sucursal").focus();
    			}
    			else if($("#nombreDepartamento").val() == ""){
					$("#nombreDepartamento").parent().addClass("has-error");
    				$("#nombreDepartamento").focus();
    			}
    			else{
    				alert("hola");
    			}
    		});

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
									{!! Form::open(array('route' => 'departamentos/agregar', 'class' => 'form-horizontal', 'role' => 'form')) !!}
										<div class="shadow-division">
											<label class="mtDivision ml15 redIdentifier">Identificación:</label>						
											<div class="form-group">
												<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="empresa">Empresa:</label>
												<div class="col-sm-8 col-md-8 col-lg-8">
													<select value="{{Input::old('empresa')}}" name="empresa" id="empresa" class="form-control">
														<option selected="true" disabled="disabled">Seleccione empresa</option>
													 	<option value="volvo">MegaSalud</option>
													 	<option value="volvo">Select Food World</option>
													 	<option value="volvo">CIGDMAC</option>
													 	<option value="volvo">Kamuhro</option>									 	
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="sucursal">Sucursal:</label>
												<div class="col-sm-8 col-md-8 col-lg-8">
													<select value="{{Input::old('sucursal')}}" name="sucursal" id="sucursal" class="form-control">
														<option selected="true" disabled="disabled">Seleccione sucursal</option>
													 	<option value="volvo">Matriz</option>
													 	<option value="volvo">Sucursal Morelia</option>
													 	<option value="volvo">Sucursal Patzcuaro</option>
													 	<option value="volvo">Sucursal Erongaricuaro</option>									 	
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="nombreDepartamento">Nombre:</label>
												<div class="col-sm-8 col-md-8 col-lg-8">
													<input value="{{Input::old('nombre')}}" name="nombre" type="text" class="form-control" id="nombreDepartamento" placeholder="Ejemplo: Recursos Humanos">
												</div>
											</div>

										</div>

										<div class="form-group mtDivision">							
											<a href="/{{$section}}" class="mtDivision btn btn-danger  col-sm-2 col-md-2 col-lg-2 col-sm-offset-2 col-md-offset-2">Cancelar</a>
											<input value="Agregar" type="submit" id="abotonAgregar" class="mtDivision btn btn-primary col-sm-2 col-md-2 col-lg-2 col-sm-offset-4 col-md-offset-4"/>
										</div>		
									{!! Form::close() !!}
								</div>
							</div>
				</section>
			</div>
			
			@include("partials/xsFallback")

			@include("partials/footer")
@stop