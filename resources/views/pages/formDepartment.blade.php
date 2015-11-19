@extends("mainFrame")


@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {
    		
    		
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
										<div class="mtDivision shadow-division">
											<label class="mtDivision ml15 redIdentifier">Identificación:</label>						

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="empresa">Empresa:</label>
												<div class="col-sm-8 col-md-8 col-lg-8">
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
												<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="empresa">Sucursal:</label>
												<div class="col-sm-8 col-md-8 col-lg-8">
													<select id="empresa" class="form-control">
														<option selected="true" disabled="disabled">Seleccione sucursal</option>
													 	<option value="volvo">Matriz</option>
													 	<option value="volvo">Sucursal Morelia</option>
													 	<option value="volvo">Sucursal Patzcuaro</option>
													 	<option value="volvo">Sucursal Erongaricuaro</option>									 	
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="nombreEmpresa">Nombre:</label>
												<div class="col-sm-8 col-md-8 col-lg-8">
													<input type="text" class="form-control" id="nombreEmpresa" placeholder="Ejemplo: Recursos Humanos">
												</div>
											</div>

										</div>

										<div class="form-group mtDivision">							
											<a href="/{{$section}}" class="mtDivision btn btn-danger  col-sm-2 col-md-2 col-lg-2 col-sm-offset-2 col-md-offset-2">Cancelar</a>
											<button class="mtDivision btn btn-primary col-sm-2 col-md-2 col-lg-2 col-sm-offset-4 col-md-offset-4">Agregar</button>							
										</div>		
									</form>
								</div>
							</div>
				</section>
			</div>
			
			@include("partials/xsFallback")

			@include("partials/footer")
@stop