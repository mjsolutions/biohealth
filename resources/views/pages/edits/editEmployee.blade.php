@extends("mainFrame")
@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {

    		$("#botonAgregar").click(function(event){
    			event.preventDefault();
    			
    			if($("#nombre").val() == ""){
    				$("#nombre").focus();    				
    			}
    			else if($("#usuario").val() == ""){
    				$("#usuario").focus();    				
    			}
    			else if($("#clave").val() == ""){
    				$("#clave").focus();
    			}
    			else if($("#confirmClave").val() == ""){
    				$("#confirmClave").focus();
    			}
    			else if($("#confirmClave").val() != $("#clave").val()){
    				alert("El campo clave y el campo Confirmar clave no son iguales");
    				$("#clave").focus();
    			}
    			else if($("#empresa option:selected").text() == "Seleccione empresa"){
					$("#empresa").focus();
    			}
    			else if($("#sucursal option:selected").text() == "Seleccione sucursal"){
					$("#sucursal").focus();
    			}
    			else if($("#departamento option:selected").text() == "Seleccione departamento"){
					$("#departamento").focus();
    			}
    			else if($("#horario option:selected").text() == "Seleccione horario"){
					$("#horario").focus();
    			}
    			else if($("#domicilio").val() == ""){
    				$("#domicilio").focus();    				
    			}
    			else if($("#codigoPostal").val() == ""){
    				$("#codigoPostal").focus();    				
    			}
    			else if($("#estado option:selected").text() == "Seleccione estado"){
					$("#estado").focus();
    			}
    			else if($("#municipio option:selected").text() == "Seleccione municipio"){
					$("#municipio").focus();
    			}
    			else if($("#telefono").val() == ""){
    				$("#telefono").focus();    				
    			}
    			else if($("#celular").val() == ""){
    				$("#celular").focus();    				
    			}
    			else if($("#email").val() == ""){
    				$("#email").focus();    				
    			}
	   			else{
    				$("#submitForm").submit();
    			}			
    		});

			$('#estado').change(function(){
				var stateId = $(this).val();
				$.ajax({
					url: "{{url('/api/getCountiesByStateId/')}}"+stateId,
					success: function(response){
						var counties = response;
						var countiesSelect ='<option selected="true" disabled="disabled">Seleccione municipio</option>';
						for(i=0; i<counties.length; i++){
							countiesSelect+='<option value="'+counties[i].id+'">'+counties[i].nombre+'</option>';
						}
						$("#municipio").html(countiesSelect);
					}
				});				
			});

			$('#empresa').change(function(){
				var enterpriseId = $(this).val();
				$.ajax({
					url: "{{url('/api/getBranchesByEnterpriseId/')}}"+enterpriseId,
					success: function(response){
						var branches = response;
						var branchesSelect ='<option selected="true" disabled="disabled">Seleccione sucursal</option>';
						for(i=0; i<branches.length; i++){
							branchesSelect+='<option value="'+branches[i].id+'">'+branches[i].name_branch+'</option>';
						}
						$("#sucursal").html(branchesSelect);
					}
				});				
			});

			$('#sucursal').change(function(){
				var branchId = $(this).val();
				$.ajax({
					url: "{{url('/api/getDepartmentsByBranchId/')}}"+branchId,
					success: function(response){
						var departments = response;
						var departmentsSelect ='<option selected="true" disabled="disabled">Seleccione departamento</option>';
						for(i=0; i<departments.length; i++){
							departmentsSelect+='<option value="'+departments[i].id+'">'+departments[i].name_department+'</option>';
						}
						$("#departamento").html(departmentsSelect);
					}
				});				
			});

			@if (count($errors) > 0)
				$.fancybox({
					content: $('#errorsDiv').show(),
		    	    scrolling: 'no',
		    	    padding: 10	        
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
			@include("partials/errorsModal")					
			<div class="row">
				<div class="hidden-xs col-sm-8 col-md-8 col-lg-8 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
					{!! Form::open(array('route' => array('empleados/editar', $employee->id), 'class' => 'form-horizontal', 'role' => 'form' , 'id' => 'submitForm')) !!}
						<div class="shadow-division">
							<label class="mtDivision ml15 redIdentifier">Identificación:</label>						

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="nombre">Nombre completo:</label>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<input value="{{$employee->name_employee}}" name="nombre" type="text" class="form-control" id="nombre" placeholder="Ejemplo: Juan Carlos Silva Perez">
								</div>
							</div>							
						</div>
						
						<div class="mtDivision shadow-division">	
							<label class="mtDivision ml15 redIdentifier">Empresa:</label>
							
							<div class="form-group">
								<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="empresa">Empresa:</label>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<select name="empresa" id="empresa" class="form-control">
										<option selected="true" disabled="disabled">Seleccione empresa</option>   
									 	@foreach($enterprises as $enterprise)
									 	<option value="{{$enterprise->id}}" @if($enterprise->id == $employee->enterprise_id) selected @endif >{{$enterprise->name_enterprise}}</option>
									 	@endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="empresa">Sucursal:</label>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<select name="sucursal" id="sucursal" class="form-control">
										<option selected="true" disabled="disabled">Seleccione sucursal</option>   													 										 	
										@foreach($branches as $branch)
									 	<option value="{{$branch->id}}" @if($branch->id == $employee->branch_id) selected @endif >{{$branch->name_branch}}</option>
									 	@endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="departamento">Departamento:</label>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<select name="departamento" id="departamento" class="form-control">
										<option selected="true" disabled="disabled">Seleccione departamento</option>   
										@foreach($departments as $department)
									 	<option value="{{$department->id}}" @if($department->id == $employee->department_id) selected @endif >{{$department->name_department}}</option>
									 	@endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="horario">Horario:</label>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<select name="horario" id="horario" class="form-control">
										<option selected="true" disabled="disabled">Seleccione horario</option>   
									 	@foreach($schedules as $schedule)
									 	<option value="{{$schedule->id}}" @if($schedule->id == $employee->schedule_id) selected @endif >{{$schedule->name_schedule}}</option>
									 	@endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="horario">Rol:</label>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<select name="rol" id="rol" class="form-control">
										<option selected="true" disabled="disabled">Seleccione rol</option>   
									 	@foreach($roles as $role)
									 	<option value="{{$role->id}}" @if($role->id == $employee->role_id) selected @endif >{{$role->display_name}}</option>
									 	@endforeach
									</select>
								</div>
							</div>
						</div>

						<div class="mtDivision shadow-division">
							<label class="mtDivision ml15 redIdentifier">Contacto:</label>						

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="domicilio">Domicilio:</label>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<input value="{{$employee->address}}" name="domicilio" type="text" class="form-control" id="domicilio" placeholder="Ejemplo: Av. Madero Ote. #567 col. Centro">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="codigoPostal">Código Postal:</label>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<input value="{{$employee->postalcode}}" name="codigoPostal" type="text" class="form-control" id="codigoPostal" placeholder="Ejemplo: 58000">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="estado">Estado:</label>
				     			<div class="col-sm-6 col-md-6 col-lg-6">
									<select name="estado" id="estado" class="form-control">
										<option selected="true" disabled="disabled">Seleccione estado</option>   
									 	@foreach($states as $state)
									 	<option value="{{$state->id}}" @if($state->id == $employee->state_id) selected @endif >{{$state->nombre}}</option>
									 	@endforeach							 	
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="municipio">Municipio:</label>
				     			<div class="col-sm-6 col-md-6 col-lg-6">
									<select name="municipio" id="municipio" class="form-control">
										<option selected="true" disabled="disabled">Seleccione municipio</option>													 	
										@foreach($counties as $county)
									 	<option value="{{$county->id}}" @if($county->id == $employee->county_id) selected @endif >{{$county->nombre}}</option>
									 	@endforeach	
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="telefono">Telefono:</label>
				     			<div class="col-sm-6 col-md-6 col-lg-6">
									<input value="{{$employee->phone}}" name="telefono" type="text" class="form-control" id="telefono" placeholder="Ejemplo: 4431234567">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="celular">Celular:</label>
				     			<div class="col-sm-6 col-md-6 col-lg-6">
									<input value="{{$employee->cellphone}}" name="celular" type="text" class="form-control" id="celular" placeholder="Ejemplo: 4431234567">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1" for="email">Email:</label>
				     			<div class="col-sm-6 col-md-6 col-lg-6">
									<input value="{{$employee->email}}" name="correo" type="email" class="form-control" id="email" placeholder="Ejemplo: usuario@dominio.com">
								</div>
							</div>
						</div>
						@include("partials/buttonsFormSection")								
					{!! Form::close() !!}
				</div>
			</div>
		</section>
	</div>			
	@include("partials/xsFallback")
	@include("partials/footer")
@stop