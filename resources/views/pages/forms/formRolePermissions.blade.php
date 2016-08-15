@extends("mainFrame")
@section("customJS")
	<script type="text/javascript">
    	$( document ).ready(function() {

    		$("#botonAgregar").click(function(event){
    			event.preventDefault();
				$("#submitForm").submit();    			
    		});

    		$('#marcarTodos').change(function() {
    			if($(this).is(":checked")) {
    				$(".checkPermisos").prop('checked', "checked");
    			}
    			else{
    				$(".checkPermisos").removeAttr("checked");
    			}
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
					{!! Form::open(array('route' => array('roles/relacionar-permisos', $role->id), 'class' => 'form-horizontal', 'role' => 'form' , 'id' => 'submitForm')) !!}
						<div class="shadow-division">
							<label class="mtDivision ml15 redIdentifier">Identificación:</label>						
							<div class="form-group">
								<label class="control-label pull-text-left col-sm-2 col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1" for="rol">Rol:</label>
								<div class="col-sm-8 col-md-8 col-lg-8">
									<input disabled value="{{$role->name}}" name="rol" type="text" class="form-control" id="rol" placeholder="Ejemplo: Admin, Propietario">
								</div>
							</div>
						</div>

						<div class="shadow-division mtDivision">
							<label class="mtDivision ml15 redIdentifier">Permisos:</label>						
							<div class="form-group">
								<div class="col-sm-12 col-md-12 col-lg-12 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
									<input type="checkbox" class="mb20" name="marcarTodos" id="marcarTodos" value="1">Marcar todos los permisos<br>
									@foreach($permissions as $permission)									
										<input 
											@foreach($permissionsSelected as $permissionSelected)
												@if($permissionSelected['permission_id'] == $permission['id'])
													checked
												@endif
											@endforeach
										type="checkbox" class="checkPermisos" name="permisos[]" value="{{$permission->id}}"> {{$permission->name}}<br>
									@endforeach
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