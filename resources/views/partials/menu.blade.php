<aside class="hidden-xs col-sm-2 col-md-2 col-lg-2 frameSet" id="menu">
	<ul class="nav nav-stacked">
	  <li @if($section == "home") class="active" @endif>			<a href="{{url("inicio")}}">Inicio</a></li>
	  <li @if($section == "empresas") class="active" @endif>		<a href="{{url("empresas")}}">Empresas</a></li>
	  <li @if($section == "sucursales") class="active" @endif>		<a href="{{url("sucursales")}}">Sucursales</a></li>
	  <li @if($section == "departamentos") class="active" @endif>	<a href="{{url("departamentos")}}">Departamentos</a></li>
	  <li @if($section == "horarios") class="active" @endif>		<a href="{{url("horarios")}}">Horarios</a></li>
	  <li @if($section == "empleados") class="active" @endif>		<a href="{{url("empleados")}}">Empleados</a></li>
	  <li @if($section == "reportes") class="active" @endif>		<a href="{{url("reportes")}}">Reportes</a></li>
	</ul>
</aside>