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
								<div class="hidden-xs col-sm-10 col-md-10 col-lg-10 col-centered">

										<div class="row">
											<label class="col-sm-9 col-md-8 col-lg-8 col-md-offset-1 redIdentifier">Empresa:</label>							
										</div>		

										<div class="row">
											<div class="col-sm-9 col-md-8 col-lg-8 col-md-offset-1">Select Food World S.A. de C.V.</div>							
											<div class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></div>
											<div class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarEmpresa" href="">Borrar</a></div>
										</div>

										<div class="row">
											<div class="col-sm-9 col-md-8 col-lg-8 col-md-offset-1">MegaSalud S.A. de C.V.</div>							
											<div class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></div>
											<div class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarEmpresa" href="">Borrar</a></div>
										</div>

										<div class="row">
											<div class="col-sm-9 col-md-8 col-lg-8 col-md-offset-1">Select Food World S.A. de C.V.</div>							
											<div class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></div>
											<div class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarEmpresa" href="">Borrar</a></div>
										</div>										
										
								</div>

								@include("partials/pagination")	

							</div>
				</section>
			</div>
			
			@include("partials/xsFallback")

			@include("partials/footer")
@stop