<div class="hidden-xs row">
	<div class="col-sm-10 col-md-10 col-lg-10 col-centered text-centered">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-centered text-centered">
				<h3>{{$titleSection}}</h3>
			</div>

			@if(isset($showButtonAdd))
			<div class="col-sm-2 col-md-2 col-lg-2 col-sm-offset-9 col-md-offset-9 col-lg-offset-9 text-centered mt-40">
				<a class="btn btn-warning buttonAdd" href="{{Request::url()}}/agregar">Agregar</a>
			</div>
			@endif
		</div>									
		<hr>																											

	</div>								
</div>