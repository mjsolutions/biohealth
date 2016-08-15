<div class="hidden-xs row frameSet" id="listonHeader">
	<div class="col-sm-9 col-md-9 col-lg-9 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 text-centered mt12">
		<span>{{Auth::user()->name_employee}} : {{Auth::user()->department->name_department}}</span>
	</div>
	<div class="col-sm-1 col-md-1 col-lg-1 mt12">
		<span><a id="salirLink" href="/logout">Salir</a></span>
	</div>
</div>