<aside class="hidden-xs col-sm-2 col-md-2 col-lg-2 frameSet" id="menu">
	<ul class="nav nav-stacked">
	  <li @if($section == "inicio") class="active" @endif>			<a class="hideText" href="{{url("inicio")}}">Inicio</a></li>
	  <li @if($section == "empresas") class="active" @endif>		<a class="hideText" href="{{url("empresas")}}">Empresas</a></li>
	  <li @if($section == "sucursales") class="active" @endif>		<a class="hideText" href="{{url("sucursales")}}">Sucursales</a></li>
	  <li @if($section == "departamentos") class="active" @endif>	<a class="hideText" href="{{url("departamentos")}}">Departamentos</a></li>
	  <li @if($section == "horarios") class="active" @endif>		<a class="hideText" href="{{url("horarios")}}">Horarios</a></li>
	  <li @if($section == "empleados") class="active" @endif>		<a class="hideText" href="{{url("empleados")}}">Empleados</a></li>
	  <li @if($section == "roles") class="active" @endif>			<a class="hideText" href="{{url("roles")}}">Roles</a></li>
	  <li @if($section == "permisos") class="active" @endif>		<a class="hideText" href="{{url("permisos")}}">Permisos</a></li>
	  <li @if($section == "asistencia") class="active" @endif>		<a class="hideText" href="{{url("asistencia")}}">Asistencia</a></li>
	</ul>
</aside>