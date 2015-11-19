<!DOCTYPE html>
<html>
	<head>
		<title>Bienvenido: Ignacio Ochoa Alvarez</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="{{asset('/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('/assets/fancybox/jquery.fancybox.css')}}" rel="stylesheet">
		<link href="{{asset('/assets/fancybox/fancybox.message.css')}}" rel="stylesheet">
		<link href="{{asset('/assets/css/estilo.css')}}" rel="stylesheet">

		<script src="{{asset('/assets/jquery/jquery.min.js')}}"></script>
		<script src="{{asset('/assets/bootstrap/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('/assets/fancybox/jquery.fancybox.js')}}"></script>		
		<script src="{{asset('/assets/fancybox/fancybox.message.js')}}"></script>

	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->

	    <script type="text/javascript">
	    	$( document ).ready(function() {
	    		
	    		
	    	});
	    </script>	    
	    
	</head>
	<body>

		<div class="container">

			@include("partials/header")

			<div id="wrapper">
				<aside class="hidden-xs col-sm-2 col-md-2 col-lg-2 frameSet" id="menu">
					<ul class="nav nav-stacked">
					  <li class=""><a href="#">Inicio</a></li>
					  <li><a href="#">Empresas</a></li>
					  <li><a href="#">Sucursales</a></li>
					  <li class="active"><a href="#">Departamentos</a></li>
					  <li><a href="#">Horarios</a></li>
					  <li><a href="#">Empleados</a></li>
					  <li><a href="#">Reportes</a></li>
					</ul>
				</aside>

				<section class="col-sm-10 col-md-10 col-lg-10 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
					
							<div class="hidden-xs row">
								<div class="col-sm-10 col-md-10 col-lg-10 col-centered text-centered">
									<h3>Lista de Empresas</h3>
									<hr>					
								</div>
							</div>


							<div class="row">
								<div class="hidden-xs col-sm-10 col-md-10 col-lg-10 col-centered">

										<div class="row">
											<label class="col-sm-9 col-md-8 col-lg-8 col-md-offset-1 redIdentifier">Empresa:</label>							
										</div>		

										<div class="row">
											<div class="col-sm-9 col-md-8 col-lg-8 col-md-offset-1">Select Food World S.A. de C.V.</div>							
											<div class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></div>
											<div class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarEmpresa" href="">Borrar</a></div>
										</div>

										<div class="row">
											<div class="col-sm-9 col-md-8 col-lg-8 col-md-offset-1">MegaSalud S.A. de C.V.</div>							
											<div class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></div>
											<div class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarEmpresa" href="">Borrar</a></div>
										</div>

										<div class="row">
											<div class="col-sm-9 col-md-8 col-lg-8 col-md-offset-1">Select Food World S.A. de C.V.</div>							
											<div class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a href="">Editar</a></div>
											<div class="col-sm-1 col-md-1 col-lg-1 pull-text-right"><a class="borrarEmpresa" href="">Borrar</a></div>
										</div>										
										
								</div>

								<div class="hidden-xs row mtDivision mb100">
									<div class="col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 text-center">
										<ul class="pagination">
											<li><a href="">&lt;&lt;</a></li>
											<li><a href="">&lt;</a></li>
											<li><a href="">1</a></li>
											<li><a href="">2</a></li>
											<li><a href="">3</a></li>
											<li><a href="">4</a></li>
											<li><a href="">5</a></li>
											<li><a href="">&gt;</a></li>
											<li><a href="">&gt;&gt;</a></li>
										</ul>								
									</div>
								</div>
							</div>

							
				</section>

				

			</div>
			
			@include("partials/xsFallback")

			@include("partials/footer")
			
		</div>	
	</body>
</html>