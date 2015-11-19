@extends("mainFrame")


@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {
    		$(".borrarSucursal").click(function(event){
    			event.preventDefault();
    			$.fancybox.message.confirm({
			        content:"Esta seguro que desea eliminar ésta sucursal?",
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
										<label class="col-sm-4 col-md-4 col-lg-4 redIdentifier">Sucursal:</label>
										<label class="col-sm-4 col-md-4 col-lg-4 redIdentifier">Empresa:</label>
										<label class="col-sm-4 col-md-4 col-lg-4 redIdentifier">Teléfono:</label>
									</div>		

									<div class="row">
										<span class="col-sm-4 col-md-4 col-lg-4 ">Sucursal Morelia 1</span>							
										<span class="col-sm-4 col-md-4 col-lg-4">MegaSalud S.A. de C.V.</span>
										<span class="col-sm-2 col-md-2 col-lg-2">(444) 421 4567</span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarSucursal" href="">Borrar</a></span>
									</div>

									<div class="row">
										<span class="col-sm-4 col-md-4 col-lg-4 ">Sucursal Morelia 2</span>							
										<span class="col-sm-4 col-md-4 col-lg-4">MegaSalud S.A. de C.V.</span>
										<span class="col-sm-2 col-md-2 col-lg-2">(444) 421 4567</span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarSucursal" href="">Borrar</a></span>
									</div>

									<div class="row">
										<span class="col-sm-4 col-md-4 col-lg-4 ">Sucursal Apatzingan 1</span>							
										<span class="col-sm-4 col-md-4 col-lg-4">Select Food World S.A. de C.V.</span>
										<span class="col-sm-2 col-md-2 col-lg-2">(444) 421 4567</span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarSucursal" href="">Borrar</a></span>
									</div>

									<div class="row">
										<span class="col-sm-4 col-md-4 col-lg-4">Erongaricuaro 1</span>							
										<span class="col-sm-4 col-md-4 col-lg-4">BioHealth S.A. de C.V.</span>
										<span class="col-sm-2 col-md-2 col-lg-2">(443) 321 4567</span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarSucursal" href="">Borrar</a></span>
									</div>										
										
								</div>

								@include("partials/pagination")								

							</div>
				</section>
			</div>
			
			@include("partials/xsFallback")

			@include("partials/footer")
@stop