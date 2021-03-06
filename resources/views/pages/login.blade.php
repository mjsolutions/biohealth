<!DOCTYPE html>
<html>
	<head>
		<title>Iniciar Sesión</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="{{asset('/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('/assets/fancybox/jquery.fancybox.css')}}" rel="stylesheet">
		<link href="{{asset('/assets/css/estilo.css')}}" rel="stylesheet">

		<script src="{{asset('/assets/jquery/jquery.min.js')}}"></script>
		<script src="{{asset('/assets/bootstrap/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('/assets/fancybox/jquery.fancybox.js')}}"></script>

	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->	    


	    <script type="text/javascript">
	    	$( document ).ready(function() {

	    		$("#abuttonEntrar").click(function(event){
	    			event.preventDefault();
	    			if($("#usuario").val() == ""){
						$("#usuario").focus();
	    			}
	    			else if($("#clave").val() == ""){
						$("#clave").focus();
	    			}
	    			else{
	    				$("#submitForm").submit();
	    			}	    			
	    		});

	    		$("#usuario, #clave").focus(function(){
	    			$("#errorDiv").hide();
	    		});   		

	    	});
	    </script>

	</head>
	<body style="background-color:white;">

		<div class="container" style="box-shadow: 0px 0px 0px;">
			<div class="row" style="margin-top:80px;">
				<div class="hidden-xs col-sm-8 col-md-8 col-lg-6 col-centered text-centered">
					<h1>Iniciar Sesión</h1>
					<hr>					
				</div>
			</div>


			<div class="row">

				<div class="hidden-xs col-sm-8 col-md-8 col-lg-6 col-sm-offset-2 col-md-offset-2 col-lg-offset-3">
					{!! Form::open(array('route' => 'login', 'class' => 'form-horizontal', 'role' => 'form' , 'id' => 'submitForm')) !!}
						<div class="mtDivision shadow-division">
							<div class="form-group">
								<label class="mtDivision control-label pull-text-left col-sm-5 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="usuario">Usuario:</label>
								<div class="mtDivision col-sm-5 col-md-6 col-lg-6">
									<input name="usuario" type="text" class="form-control text-centered" id="usuario">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-5 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="clave">Clave:</label>
								<div class="col-sm-5 col-md-6 col-lg-6">
									<input name="clave" type="password" class="form-control text-centered" id="clave">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-5 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="clave">No cerrar sesíon:</label>
								<div class="col-sm-5 col-md-6 col-lg-6">
									<input name="recuerdame" type="checkbox" id="recuerdame">
								</div>
							</div>

							<div class="row">
								<button class="btn btn-primary col-sm-2 col-md-2 col-lg-2 col-sm-offset-5 col-md-offset-5" id="buttonEntrar">Entrar</button>
							</div>
						</div>						
					</form>

					@if (count($errors) > 0)
					<div class="row mtDivision" id="errorsDiv" >
						<div class="col-sm-12 col-md-12 col-lg-12 text-centered">
							@foreach($errors->all() as $error)							
								<span class="smallEmployee redIdentifier">{{$error}}</span> <br>
							@endforeach
						</div>
					</div>							
					@endif

					@if(Session::has('error'))
					<div class="row mtDivision" id="errorDiv">
						<div class="col-sm-12 col-md-12 col-lg-12 text-centered">
							<span class="smallEmployee redIdentifier">Número de empleado o clave incorrectos.</span> <br>
							<span class="smallEmployee redIdentifier">Favor de intentarlo de nuevo.</span>
						</div>
					</div>
					@endif

				</div>
			</div>

			<div class="row text-centered col-centered">
				<div class="col-xs-12 hidden-sm hidden-md hidden-lg mtDivision">
					<span>Esta sección no está habilitada para ser visualizada desde celulares.</span> <br>
					<span>Favor de abrir en dispositivo Tablet o PC</span>
				</div>
			</div>

			<!-- <div class="row mtDivision text-centered col-centered" id="divFooter">
				<div class="col-sm-12 col-md-12 col-lg-12 mtDivision">
					<p class="text-centered">BioHealth© - 2015 Todos los Derechos Reservados</p>
				</div>				
		</div> -->
		</div>	
	</body>
</html>