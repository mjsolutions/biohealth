@extends("mainFrame")
@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {
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

					<div class="row mt-20">
						<div style="height: 100px;" class="col-sm-8 col-md-7 col-lg-5 col-centered">
								@if(Auth::user()->enterprise->id == 1)
								<img class="welcomeLogo" src="{{asset('/logos/300x100/biohealth-300x100.jpg')}}">
								@endif

								@if(Auth::user()->enterprise->id == 2)
								<img class="welcomeLogo" src="{{asset('/logos/300x100/megasalud-300x100.jpg')}}">
								@endif

								@if(Auth::user()->enterprise->id == 3)
								<img class="welcomeLogo" src="{{asset('/logos/300x100/selectfoodworld-300x100.jpg')}}">
								@endif
						</div>
					</div>


					<div class="row mtDivision">
						<div class="col-sm-10 col-md-10 col-lg-10 col-sm-offset-2 col-md-offset-3 col-lg-offset-3">
							<label class="redIdentifier">Datos Personales:</label>
						</div>
					</div>
				
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-4 col-sm-offset-2 col-md-offset-3 col-lg-offset-3">Nombre: </div>
						<div class="col-sm-6 col-md-4 col-lg-4">{{Auth::user()->name_employee}}</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-4 col-sm-offset-2 col-md-offset-3 col-lg-offset-3 hideText">Número de Empleado: </div>
						<div class="col-sm-6 col-md-4 col-lg-4">{{Auth::user()->id}}</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-4 col-sm-offset-2 col-md-offset-3 col-lg-offset-3">Usuario: </div>
						<div class="col-sm-6 col-md-4 col-lg-4">{{Auth::user()->user}}</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-4 col-sm-offset-2 col-md-offset-3 col-lg-offset-3">Empresa: </div>
						<div class="col-sm-6 col-md-4 col-lg-4">{{Auth::user()->enterprise->name_enterprise}}</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-4 col-sm-offset-2 col-md-offset-3 col-lg-offset-3">Sucursal: </div>
						<div class="col-sm-6 col-md-4 col-lg-4">{{Auth::user()->branch->name_branch}}</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-4 col-sm-offset-2 col-md-offset-3 col-lg-offset-3">Departamento: </div>
						<div class="col-sm-6 col-md-4 col-lg-4">{{Auth::user()->department->name_department}}</div>
					</div>

					<div class="row mtDivision">
						<div class="col-sm-10 col-md-10 col-lg-10 col-sm-offset-2 col-md-offset-3 col-lg-offset-3">
							<label class="redIdentifier">Asistencia:</label>
						</div>
					</div>

					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-4 col-sm-offset-2 col-md-offset-3 col-lg-offset-3">Horario: </div>
						<div class="col-sm-6 col-md-4 col-lg-4">{{Auth::user()->schedule->name_schedule}}</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-4 col-sm-offset-2 col-md-offset-3 col-lg-offset-3">Tiempo Semanal: </div>
						<div class="col-sm-6 col-md-4 col-lg-4">{{Auth::user()->schedule->total_time}}:00</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-4 col-sm-offset-2 col-md-offset-3 col-lg-offset-3">Tiempo Cumplido: </div>
						<div class="col-sm-6 col-md-4 col-lg-4">37:43</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-4 col-sm-offset-2 col-md-offset-3 col-lg-offset-3">Tiempo Restante: </div>
						<div class="col-sm-6 col-md-4 col-lg-4">2:17</div>
					</div>
					<div class="row rowHover">
						<div class="col-sm-4 col-md-3 col-lg-4 col-sm-offset-2 col-md-offset-3 col-lg-offset-3 hideText">Reportes de Actividades: </div>
						<div class="col-sm-6 col-md-4 col-lg-4"><a href="">Consultar</a></div>
					</div>					
									
				</div>
				
			</div>
		</section>
	</div>			
	@include("partials/xsFallback")
	@include("partials/footer")
@stop