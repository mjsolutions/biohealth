@if (count($errors) > 0)
	<div id="errorsDiv" class="row">
		<div style="min-width:350px" class="alert alert-danger">
			<ul>
			    @foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>
@endif