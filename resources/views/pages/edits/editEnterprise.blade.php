@extends("mainFrame")
@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {
    		$("#botonAgregar").click(function(event){
    			event.preventDefault();
    			
    			if($("#nombreEmpresa").val() == ""){
    				$("#nombreEmpresa").focus();    				
    			}
    			else if($("#rfc").val() == ""){
					$("#rfc").focus();
    			}
    			else{
    				$("#submitForm").submit();
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
					{!! Form::open(array('route' =>  array('empresas/editar', $enterprise->id), 'class' => 'form-horizontal', 'role' => 'form' , 'id' => 'submitForm')) !!}
						<div class="shadow-division">
							<label class="mtDivision ml15 redIdentifier">Identificación:</label>
							<div class="form-group">
								<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="nombreEmpresa">Nombre:</label>
								<div class="col-sm-8 col-md-8 col-lg-8">
									<input value="{{$enterprise->name_enterprise}}" name="nombre" type="text" class="form-control" id="nombreEmpresa" placeholder="Ejemplo: MegaSalud">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="rfc">RFC:</label>
				     			<div class="col-sm-8 col-md-8 col-lg-8">
									<input value="{{$enterprise->rfc}}" name="rfc" type="text" class="form-control" id="rfc" placeholder="Ejemplo: OOAI901110GQ6">
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