@extends("mainFrame")
@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {    		
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
						<label class="col-sm-11 col-md-11 col-lg-11 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 redIdentifier">Datos Personales:</label>
					</div>
				
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">Nombre: </div>
						<div class="col-sm-6 col-md-7 col-lg-7">{{Auth::user()->name_employee}}</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 hideText">Número de Empleado: </div>
						<div class="col-sm-6 col-md-7 col-lg-7">{{Auth::user()->id}}</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">Usuario: </div>
						<div class="col-sm-6 col-md-7 col-lg-7">{{Auth::user()->user}}</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">Empresa: </div>
						<div class="col-sm-6 col-md-7 col-lg-7">{{Auth::user()->enterprise->name_enterprise}}</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">Sucursal: </div>
						<div class="col-sm-6 col-md-7 col-lg-7">{{Auth::user()->branch->name_branch}}</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">Departamento: </div>
						<div class="col-sm-6 col-md-7 col-lg-7">{{Auth::user()->department->name_department}}</div>
					</div>

					<div class="row mtDivision">
						<label class="col-sm-11 col-md-11 col-lg-11 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 redIdentifier">Asistencia:</label>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">Horario: </div>
						<div class="col-sm-6 col-md-7 col-lg-7">{{Auth::user()->schedule->name_schedule}}</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">Tiempo Semanal: </div>
						<div class="col-sm-6 col-md-7 col-lg-7">{{Auth::user()->schedule->total_time}}:00</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">Tiempo Cumplido: </div>
						<div class="col-sm-6 col-md-7 col-lg-7">37:43</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">Tiempo Restante: </div>
						<div class="col-sm-6 col-md-7 col-lg-7">2:17</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 hideText">Reportes de Actividades: </div>
						<div class="col-sm-6 col-md-7 col-lg-7"><a href="">Consultar</a></div>
					</div>
				
				</div>
				
			</div>
		</section>
	</div>			
	@include("partials/xsFallback")
	@include("partials/footer")
@stop