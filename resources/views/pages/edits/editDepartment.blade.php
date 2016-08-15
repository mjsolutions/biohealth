@extends("mainFrame")
@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {
    		$("#botonAgregar").click(function(event){
    			event.preventDefault();
    			if($("#empresa option:selected").text() == "Seleccione empresa"){
					$("#empresa").focus();
    			}    			
    			else if($("#sucursal option:selected").text() == "Seleccione sucursal"){
					$("#sucursal").focus();
    			}
    			else if($("#nombreDepartamento").val() == ""){
					$("#nombreDepartamento").focus();
    			}
    			else{
    				$("#submitForm").submit();
    			}
    		});

    		$('#empresa').change(function(){
				var enterpriseId = $(this).val();
				$.ajax({
					url: "/api/getBranchesByEnterpriseId/"+enterpriseId,
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
					{!! Form::open(array('route' => array('departamentos/editar', $department->id), 'class' => 'form-horizontal', 'role' => 'form' , 'id' => 'submitForm')) !!}
						<div class="shadow-division">
							<label class="mtDivision ml15 redIdentifier">Identificación:</label>						
							<div class="form-group">
								<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="empresa">Empresa:</label>
								<div class="col-sm-8 col-md-8 col-lg-8">
									<select name="empresa" id="empresa" class="form-control">
										<option selected="true" disabled="disabled">Seleccione empresa</option>
									 	@foreach($enterprises as $enterprise)
									 	<option value="{{$enterprise->id}}" @if($enterprise->id == $department->enterprise_id) selected @endif>{{$enterprise->name_enterprise}}</option>
									 	@endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="sucursal">Sucursal:</label>
								<div class="col-sm-8 col-md-8 col-lg-8">
									<select name="sucursal" id="sucursal" class="form-control">
										<option selected="true" disabled="disabled">Seleccione sucursal</option>
										@foreach($branches as $branch)
									 	<option value="{{$branch->id}}" @if($branch->id == $department->branch_id) selected @endif>{{$branch->name_branch}}</option>
									 	@endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="nombreDepartamento">Nombre:</label>
								<div class="col-sm-8 col-md-8 col-lg-8">
									<input value="{{$department->name_department}}" name="nombre" type="text" class="form-control" id="nombreDepartamento" placeholder="Ejemplo: Recursos Humanos">
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