<div class="hidden-xs row">
	<div class="col-sm-10 col-md-10 col-lg-10 col-centered text-centered">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-centered text-centered">
				<h3>{{$titleSection}}</h3>
			</div>

			@if(isset($showButtonAdd))
			<div class="col-sm-3 col-md-2 col-lg-2 col-sm-offset-9 col-md-offset-9 col-lg-offset-9 text-centered mt-40">
				<a class="btn btn-warning buttonAdd" href="/{{Request::segment(1)}}/agregar">Agregar</a>
			</div>
			@endif

			@if(isset($showButtonChangePassword))
			<div class="col-sm-3 col-md-2 col-lg-2 col-sm-offset-9 col-md-offset-9 col-lg-offset-9 text-centered mt-40">
				<a class="btn btn-warning buttonAdd" href="/{{Request::segment(1)}}/cambiar-clave/{{Auth::user()->id}}">Clave</a>
			</div>
			@endif
		</div>									
		<hr>

		@if(isset($messageAlertTitle))
		<div class="row alertDivRow" id="alertDivRow">
			<div class="col-sm-6 col-md-5 col-lg-5 col-centered text-centered alert alert-success">
				<p class="text-centered">{{$messageAlertTitle}}</p>
			</div>
		</div>
		@endif

	</div>								
</div>