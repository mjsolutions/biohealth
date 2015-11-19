@extends("mainFrame")


@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {
    		$(".borrarEmpleado").click(function(event){
    			event.preventDefault();
    			$.fancybox.message.confirm({
			        content:"Esta seguro que desea eliminar éste empleado?",
			        buttons:{yes: "Si", no: "No"},
			        onYes: function(){
			        	alert("gracias");				          
			        }                  
			    });
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
								<div class="hidden-xs col-sm-10 col-md-10 col-lg-10 col-centered">

									<div class="row">
										<label class="col-sm-4 col-md-4 col-lg-4 redIdentifier">Empleado:</label>
										<label class="col-sm-3 col-md-3 col-lg-3 redIdentifier">Pertenece a:</label>
										<label class="col-sm-4 col-md-4 col-lg-4 redIdentifier">Horario:</label>
									</div>		

									<div class="row">
										<span class="col-sm-4 col-md-4 col-lg-4">José Ramiro Ignacio Ochoa Alvarez</span>							
										<span class="col-sm-3 col-md-3 col-lg-3">MegaSalud S.A. de C.V.</span>
										<span class="col-sm-3 col-md-3 col-lg-3">L,M,Mi,J-10hrs-16hrs Corrido</span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarEmpleado" href="">Borrar</a></span>
									</div>

									<div class="row">
										<span class="col-sm-4 col-md-4 col-lg-4">Ivone Huerta Aguilar</span>							
										<span class="col-sm-3 col-md-3 col-lg-3">MegaSalud S.A. de C.V.</span>
										<span class="col-sm-3 col-md-3 col-lg-3">L,M,Mi,J-10hrs-16hrs Corrido</span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarEmpleado" href="">Borrar</a></span>
									</div>

									<div class="row">
										<span class="col-sm-4 col-md-4 col-lg-4">Ivone Huerta Aguilar</span>							
										<span class="col-sm-3 col-md-3 col-lg-3">MegaSalud S.A. de C.V.</span>
										<span class="col-sm-3 col-md-3 col-lg-3">L,M,Mi,J-10hrs-16hrs Corrido</span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarEmpleado" href="">Borrar</a></span>
									</div>

									<div class="row">
										<span class="col-sm-4 col-md-4 col-lg-4">Ivone Huerta Aguilar</span>							
										<span class="col-sm-3 col-md-3 col-lg-3">MegaSalud S.A. de C.V.</span>
										<span class="col-sm-3 col-md-3 col-lg-3">L,M,Mi,J-10hrs-16hrs Corrido</span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarEmpleado" href="">Borrar</a></span>
									</div>										
										
								</div>

								@include("partials/pagination")	

							</div>
				</section>
			</div>
			
			@include("partials/xsFallback")

			@include("partials/footer")
@stop