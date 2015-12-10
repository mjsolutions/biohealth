@extends("mainFrame")
@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {
    		$(".borrarPermiso").click(function(event){
    			event.preventDefault();
    			var currentDeletePath = $(this).attr("href");
    			$.fancybox.message.confirm({
			        content:"Esta seguro que desea eliminar éste permiso?",
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
						<label class="col-sm-4 col-md-3 col-lg-3 col-md-offset-1 col-lg-offset-1 redIdentifier">Permiso:</label>
						<label class="col-sm-5 col-md-3 col-lg-3 redIdentifier">Nombre:</label>
						<label class="hidden-sm col-md-4 col-lg-4 redIdentifier">Descripción:</label>
					</div>
					@foreach($permissions as $permission)
					<div class="row rowHover">
						<span class="col-sm-4 col-md-3 col-lg-3 col-md-offset-1 col-lg-offset-1 hideText">{{$permission->name}}</span>							
						<span class="col-sm-5 col-md-3 col-lg-3 hideText">{{$permission->display_name}}</span>
						<span class="hidden-sm col-md-2 col-lg-2 hideText">{{$permission->description}}</span>
						<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="/{{Request::segment(1)}}/editar/{{$permission->id}}">Editar</a></span>
						<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarPermiso" href="/{{Request::segment(1)}}/borrar/{{$permission->id}}">Borrar</a></span>
					</div>
					@endforeach										
				</div>
				@include("partials/pagination")
			</div>
		</section>
	</div>			
	@include("partials/xsFallback")
	@include("partials/footer")
@stop