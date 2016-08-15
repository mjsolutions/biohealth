@extends("mainFrame")
@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {
    		$(".borrarEmpleado").click(function(event){
    			event.preventDefault();
    			var currentDeletePath = $(this).attr("href");
    			$.fancybox.message.confirm({
			        content:"Esta seguro que desea eliminar éste empleado?",
			        buttons:{yes: "Si", no: "No"},
			        onYes: function(){
			        	window.location = currentDeletePath;
			        }                  
			    });
    		});
    		@if(isset($messageAlertTitle))
    		$("#alertDivRow").click(function(){
    			$(this).fadeOut(1500);
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
			<div class="row">
				<div class="hidden-xs col-sm-10 col-md-10 col-lg-10 col-centered">
					<div class="row">
						<label class="col-sm-4 col-md-3 col-lg-3 col-md-offset-1 col-lg-offset-1 redIdentifier">Empleado:</label>
						<label class="hidden-sm col-md-3 col-lg-3 redIdentifier">Empresa:</label>
						<label class="col-sm-5 col-md-2 col-lg-4 redIdentifier">Teléfono:</label>
					</div>
					@foreach($pagination as $employee)
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-3 col-md-offset-1 col-lg-offset-1 hideText">{{$employee->name_employee}}</div>							
						<div class="hidden-sm col-md-3 col-lg-3 hideText">{{$employee->enterprise->name_enterprise}}</div>
						<div class="col-sm-5 col-md-2 col-lg-2 hideText">{{$employee->phone}}</div>
						<div class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="/{{Request::segment(1)}}/editar/{{$employee->id}}">Editar</a></div>
						<div class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarEmpleado" href="/{{Request::segment(1)}}/borrar/{{$employee->id}}">Borrar</a></div>
					</div>
					@endforeach										
				</div>
			</div>
		</section>		
		<section class="col-sm-10 col-md-10 col-lg-10 col-sm-offset-2 col-md-offset-2 col-lg-offset-2" id="sectionPagination">
			@include("partials/pagination")
		</section>		
	</div>			
	@include("partials/xsFallback")
	@include("partials/footer")
@stop