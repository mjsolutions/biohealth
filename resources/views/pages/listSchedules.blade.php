@extends("mainFrame")


@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {
    		$(".borrarHorario").click(function(event){
    			event.preventDefault();
    			$.fancybox.message.confirm({
			        content:"Esta seguro que desea eliminar éste horario?",
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
										<label class="col-sm-5 col-md-5 col-lg-5 col-sm-offset-1 col-md-offset-1 redIdentifier">Horario:</label>
										<label class="col-sm-4 col-md-4 col-lg-4 redIdentifier">Tipo:</label>
									</div>		

									<div class="row">
										<span class="col-sm-5 col-md-5 col-lg-5 col-sm-offset-1 col-md-offset-1">8Hrs  - 14 Hrs Corrido L-V</span>							
										<span class="col-sm-1 col-md-1 col-lg-1">Fijo</span>
										<span class="col-sm-1 col-md-1 col-lg-1 col-sm-offset-2 col-md-offset-2 pull-text-right"><a href="">Editar</a></span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarHorario" href="">Borrar</a></span>
									</div>

									<div class="row">
										<span class="col-sm-5 col-md-5 col-lg-5 col-sm-offset-1 col-md-offset-1">8Hrs  - 14 Hrs Corrido L,Mi,V</span>							
										<span class="col-sm-1 col-md-1 col-lg-1">Variable</span>
										<span class="col-sm-1 col-md-1 col-lg-1 col-sm-offset-2 col-md-offset-2 pull-text-right"><a href="">Editar</a></span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarHorario" href="">Borrar</a></span>
									</div>

									<div class="row">
										<span class="col-sm-5 col-md-5 col-lg-5 col-sm-offset-1 col-md-offset-1">8Hrs  - 14 Hrs Corrido L,M,Mi,J,V</span>	
										<span class="col-sm-1 col-md-1 col-lg-1">Rotativo</span>						
										<span class="col-sm-1 col-md-1 col-lg-1 col-sm-offset-2 col-md-offset-2 pull-text-right"><a href="">Editar</a></span>
										<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarHorario" href="">Borrar</a></span>
									</div>										
										
								</div>

								@include("partials/pagination")	

							</div>
				</section>
			</div>
			
			@include("partials/xsFallback")

			@include("partials/footer")
@stop