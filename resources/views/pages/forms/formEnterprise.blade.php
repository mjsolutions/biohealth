@extends("mainFrame")
@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {

    		$("#botonAgregar").click(function(event){
    			event.preventDefault();
    			
    			if($("#nombreEmpresa").val() == ""){
    				$("#nombreEmpresa").focus();    				
    			}
    			else if($("#direccion").val() == ""){
					$("#direccion").focus();
    			}
    			else if($("#codigoPostal").val() == ""){
					$("#codigoPostal").focus();
    			}
    			else if($("#estado option:selected").text() == "Seleccione estado"){
					$("#estado").focus();
    			}
    			else if($("#municipio option:selected").text() == "Seleccione municipio"){
					$("#municipio").focus();
    			}
    			else if($("#telefono").val() == ""){
					$("#telefono").focus();
    			}
    			else if($("#rfc").val() == ""){
					$("#rfc").focus();
    			}
    			else{
    				$("#submitForm").submit();
    			}
    		});

			$('#estado').change(function(){
				var stateId = $(this).val();
				$.ajax({
					url: "/api/getCountiesByStateId/"+stateId,
					success: function(response){
						var counties = response;
						var countiesSelect ='<option selected="true" disabled="disabled">Seleccione municipio</option>';
						for(i=0; i<counties.length; i++){
							countiesSelect+='<option value="'+counties[i].id+'">'+counties[i].nombre+'</option>';
						}
						$("#municipio").html(countiesSelect);
					}
				});				
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
					{!! Form::open(array('route' => 'empresas/agregar', 'class' => 'form-horizontal', 'role' => 'form' , 'id' => 'submitForm')) !!}
						<div class="shadow-division">
							<label class="mtDivision ml15 redIdentifier">Identificación:</label>						

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="nombreEmpresa">Nombre:</label>
								<div class="col-sm-8 col-md-8 col-lg-8">
									<input value="{{Input::old('nombre')}}" name="nombre" type="text" class="form-control" id="nombreEmpresa" placeholder="Ejemplo: MegaSalud">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="direccion">Dirección:</label>
				     			<div class="col-sm-8 col-md-8 col-lg-8">
									<input value="{{Input::old('direccion')}}" name="direccion" type="text" class="form-control" id="direccion" placeholder="Ejemplo: Revolución #552 Col. Centro.">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="codigoPostal">C.P.:</label>
								<div class="col-sm-8 col-md-8 col-lg-8">
									<input value="{{Input::old('codigoPostal')}}" name="codigoPostal" type="text" class="form-control" id="codigoPostal" placeholder="Ejemplo: 58000">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="estado">Estado:</label>
				     			<div class="col-sm-8 col-md-8 col-lg-8">
									<select name="estado" id="estado" class="form-control">
										<option selected="true" disabled="disabled">Seleccione estado</option>
										@foreach($states as $state)
									 	<option value="{{$state->id}}">{{$state->nombre}}</option>
									 	@endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="municipio">Municipio:</label>
				     			<div class="col-sm-8 col-md-8 col-lg-8">
									<select value="{{Input::old('municipio')}}" name="municipio" id="municipio" class="form-control">
										<option selected="true" disabled="disabled">Seleccione municipio</option>
									 										 	
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="telefono">Telefono:</label>
				     			<div class="col-sm-8 col-md-8 col-lg-8">
									<input value="{{Input::old('telefono')}}" name="telefono" type="text" class="form-control" id="telefono" placeholder="Ejemplo: (443) 123 4567">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="rfc">RFC:</label>
				     			<div class="col-sm-8 col-md-8 col-lg-8">
									<input value="{{Input::old('rfc')}}" name="rfc" type="text" class="form-control" id="rfc" placeholder="Ejemplo: OOAI901110GQ6">
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