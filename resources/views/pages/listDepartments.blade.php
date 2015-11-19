@extends("mainFrame")


@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {
    		$(".borrarDepartamento").click(function(event){
    			event.preventDefault();
    			$.fancybox.message.confirm({
			        content:"Esta seguro que desea eliminar éste departamento?",
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
											<label class="col-sm-5 col-md-5 col-lg-5 col-sm-offset-1 col-md-offset-1 redIdentifier">Departamento:</label>
											<label class="col-sm-3 col-md-3 col-lg-3 redIdentifier">Pertenece a:</label>
										</div>		

										<div class="row">
											<span class="col-sm-5 col-md-5 col-lg-5 col-sm-offset-1 col-md-offset-1">Recursos Humanos</span>							
											<span class="col-sm-3 col-md-3 col-lg-3">MegaSalud S.A. de C.V.</span>
											<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></span>
											<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarDepartamento" href="">Borrar</a></span>
										</div>

										<div class="row">
											<span class="col-sm-5 col-md-5 col-lg-5 col-sm-offset-1 col-md-offset-1">Informática y sistemas</span>							
											<span class="col-sm-3 col-md-3 col-lg-3">BioHealth S.A. de C.V.</span>
											<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></span>
											<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarDepartamento" href="">Borrar</a></span>
										</div>

										<div class="row">
											<span class="col-sm-5 col-md-5 col-lg-5 col-sm-offset-1 col-md-offset-1">Productos Nuevos</span>	
											<span class="col-sm-3 col-md-3 col-lg-3">Select Food World S.A. de C.V.</span>						
											<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></span>
											<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarDepartamento" href="">Borrar</a></span>
										</div>									
										
								</div>

								@include("partials/pagination")	

							</div>
				</section>
			</div>
			
			@include("partials/xsFallback")

			@include("partials/footer")
@stop