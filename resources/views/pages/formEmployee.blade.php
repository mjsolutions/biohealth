@extends("mainFrame")


@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {

    		$("#botonAgregar").click(function(event){
    			event.preventDefault();
    			
    			if($("#nombre").val() == ""){
    				$("#nombre").parent().addClass("has-error");
    				$("#nombre").focus();    				
    			}
    			else if($("#usuario").val() == ""){
    				$("#usuario").parent().addClass("has-error");
    				$("#usuario").focus();    				
    			}
    			else if($("#clave").val() == ""){
    				$("#clave").parent().addClass("has-error");
    				$("#clave").focus();    				
    			}
    			else if($("#empresa option:selected").text() == "Seleccione empresa"){
					$("#empresa").parent().addClass("has-error");
    				$("#empresa").focus();
    			}
    			else if($("#sucursal option:selected").text() == "Seleccione sucursal"){
					$("#sucursal").parent().addClass("has-error");
    				$("#sucursal").focus();
    			}
    			else if($("#departamento option:selected").text() == "Seleccione departamento"){
					$("#departamento").parent().addClass("has-error");
    				$("#departamento").focus();
    			}
    			else if($("#horario option:selected").text() == "Seleccione horario"){
					$("#horario").parent().addClass("has-error");
    				$("#horario").focus();
    			}
    			else if($("#domicilio").val() == ""){
    				$("#domicilio").parent().addClass("has-error");
    				$("#domicilio").focus();    				
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
    			else if($("#celular").val() == ""){
    				$("#celular").parent().addClass("has-error");
    				$("#celular").focus();    				
    			}
    			else if($("#email").val() == ""){
    				$("#email").parent().addClass("has-error");
    				$("#email").focus();    				
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
									<form class="form-horizontal" role="form">
										<div class="shadow-division">
											<label class="mtDivision ml15 redIdentifier">Identificación:</label>						

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="nombre">Nombre completo:</label>
												<div class="col-sm-6 col-md-6 col-lg-6">
													<input type="text" class="form-control" id="nombre" placeholder="Ejemplo: Juan Carlos Silva Perez">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="numeroEmpleado">Usuario:</label>
								     			<div class="col-sm-6 col-md-6 col-lg-6">
													<input type="text" class="form-control" id="usuario" placeholder="Ejemplo: Usuario123">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="clave">Clave:</label>
								     			<div class="col-sm-6 col-md-6 col-lg-6">
													<input type="password" class="form-control" id="clave" placeholder="Ejemplo: abc123">
												</div>
											</div>							
										</div>
										
										<div class="mtDivision shadow-division">	
											<label class="mtDivision ml15 redIdentifier">Empresa:</label>
											
											<div class="form-group">
												<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="empresa">Empresa:</label>
												<div class="col-sm-6 col-md-6 col-lg-6">
													<select id="empresa" class="form-control">
														<option selected="true" disabled="disabled">Seleccione empresa</option>   
													 	<option value="volvo">MegaSalud</option>
													 	<option value="volvo">Select Food World</option>
													 	<option value="volvo">CIGDMAC</option>
													 	<option value="volvo">Kamuhro</option>									 	
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="empresa">Sucursal:</label>
												<div class="col-sm-6 col-md-6 col-lg-6">
													<select id="sucursal" class="form-control">
														<option selected="true" disabled="disabled">Seleccione sucursal</option>   
													 	<option value="volvo">Matriz</option>
													 	<option value="volvo">Sucursal Morelia</option>
													 	<option value="volvo">Sucursal Zamora</option>
													 	<option value="volvo">Sucursal Patzcuaro</option>									 	
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="departamento">Departamento:</label>
												<div class="col-sm-6 col-md-6 col-lg-6">
													<select id="departamento" class="form-control">
														<option selected="true" disabled="disabled">Seleccione departamento</option>   
													 	<option value="volvo">Juridico y Legal</option>
													 	<option value="volvo">Recursos Humanos</option>
													 	<option value="volvo">Informática y Sistemas</option>
													 	<option value="volvo">Gestión de Calidad</option>									 	
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="horario">Horario:</label>
												<div class="col-sm-6 col-md-6 col-lg-6">
													<select id="horario" class="form-control">
														<option selected="true" disabled="disabled">Seleccione horario</option>   
													 	<option value="volvo">8hrs-16hrs (Corrido)</option>
													 	<option value="volvo">7hrs-15hrs (Corrido)</option>
													 	<option value="volvo">8hrs-13hrs - 15hrs-18hrs</option>
													 	<option value="volvo">9hrs-14hrs - 16hrs-19hrs</option>
													 	<option value="volvo">Abierto - 8hrs</option>
													 	<option value="volvo">Abierto - 6hrs</option>
													</select>
												</div>
											</div>
										</div>

										<div class="mtDivision shadow-division">
											<label class="mtDivision ml15 redIdentifier">Contacto:</label>						

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="domicilio">Domicilio:</label>
												<div class="col-sm-6 col-md-6 col-lg-6">
													<input type="text" class="form-control" id="domicilio" placeholder="Ejemplo: Av. Madero Ote. #567 col. Centro">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="codigoPostal">Código Postal:</label>
												<div class="col-sm-6 col-md-6 col-lg-6">
													<input type="text" class="form-control" id="codigoPostal" placeholder="Ejemplo: 58000">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="estado">Estado:</label>
								     			<div class="col-sm-6 col-md-6 col-lg-6">
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
												<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="municipio">Municipio:</label>
								     			<div class="col-sm-6 col-md-6 col-lg-6">
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
												<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="telefono">Telefono:</label>
								     			<div class="col-sm-6 col-md-6 col-lg-6">
													<input type="text" class="form-control" id="telefono" placeholder="Ejemplo: (443) 123 4567">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="celular">Celular:</label>
								     			<div class="col-sm-6 col-md-6 col-lg-6">
													<input type="text" class="form-control" id="celular" placeholder="Ejemplo: (443) 123 4567">
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="email">Email:</label>
								     			<div class="col-sm-6 col-md-6 col-lg-6">
													<input type="email" class="form-control" id="email" placeholder="Ejemplo: usuario@dominio.com">
												</div>
											</div>
										</div>

										@include("partials/buttonsFormSection")								
									</form>
								</div>
							</div>
				</section>
			</div>
			
			@include("partials/xsFallback")

			@include("partials/footer")
@stop