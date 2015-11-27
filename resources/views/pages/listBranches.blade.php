@extends("mainFrame")
@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {
    		$(".borrarSucursal").click(function(event){
    			event.preventDefault();
    			var currentDeletePath = $(this).attr("href");
    			$.fancybox.message.confirm({
			        content:"Esta seguro que desea eliminar ésta sucursal?",
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
						<label class="col-sm-4 col-md-3 col-lg-3 col-md-offset-1 col-lg-offset-1 redIdentifier">Sucursal:</label>
						<label class="col-sm-5 col-md-3 col-lg-3 redIdentifier">Empresa:</label>
						<label class="hidden-sm col-md-4 col-lg-4 redIdentifier">Teléfono:</label>
					</div>
					@foreach($branches as $branch)
					<div class="row rowHover">
						<span class="col-sm-4 col-md-3 col-lg-3 col-md-offset-1 col-lg-offset-1 hideText">{{$branch->name_branch}}</span>							
						<span class="col-sm-5 col-md-3 col-lg-3 hideText">{{$branch->enterprise->name_enterprise}}</span>
						<span class="hidden-sm col-md-2 col-lg-2 hideText">{{$branch->phone}}</span>
						<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></span>
						<span class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarSucursal" href="/{{Request::segment(1)}}/borrar/{{$branch->id}}">Borrar</a></span>
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