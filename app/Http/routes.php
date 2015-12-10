<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

////////////////////Rutas para Miscelanea////////////////////
Route::get('/', ['middleware' => 'auth', 'uses' => 'HomeController@index']);
Route::get('login','LoginController@index');
Route::post('login', ['as' => 'login' , 'uses' => 'LoginController@login']);
Route::get('logout','LoginController@logout');
Route::get('inicio', ['middleware' => 'auth', 'uses' => 'HomeController@index']);
Route::get('inicio/cambiar-clave/{id}', ['middleware' => 'auth', 'uses' => 'HomeController@showChangePassword'])->where('id', '[0-9]+');
Route::post('inicio/cambiar-clave/{id}', ['as' => 'inicio/cambiar-clave' , 'uses' => 'HomeController@changePassword'])->where('id', '[0-9]+');
Route::get('inicio/{operationCode?}', ['middleware' => 'auth', 'uses' => 'HomeController@index']);
Route::get('checador','CheckController@index');
Route::post('checador', ['as' => 'checador' , 'uses' => 'CheckController@check']);
Route::post('reporte', ['as' => 'reporte' , 'uses' => 'CheckController@submitActivityReport']);


////////////////////Rutas para el API////////////////////
Route::get('api/getCountiesByStateId/{stateId}', ['middleware' => 'auth', 'uses' => 'api@getCountiesByStateId']);
Route::get('api/getBranchesByEnterpriseId/{enterpriseId}', ['middleware' => 'auth', 'uses' => 'api@getBranchesByEnterpriseId']);
Route::get('api/getDepartmentsByBranchId/{branchId}', ['middleware' => 'auth', 'uses' => 'api@getDepartmentsByBranchId']);
Route::get('api/getServerTime', ['middleware' => 'auth', 'uses' => 'api@getServerTime']);


////////////////////Rutas para seccion Empresas////////////////////
Route::get('empresas', ['middleware' => 'auth', 'uses' => 'EnterprisesController@index']);
Route::get('empresas/agregar', ['middleware' => 'auth', 'uses' => 'EnterprisesController@showAddForm']);
Route::post('empresas/agregar', ['middleware' => 'auth', 'as' => 'empresas/agregar' , 'uses' => 'EnterprisesController@store']);
Route::get('empresas/borrar/{id}', ['middleware' => 'auth', 'uses' => 'EnterprisesController@delete'])->where('id', '[0-9]+');
Route::get('empresas/editar/{id}', ['middleware' => 'auth', 'uses' => 'EnterprisesController@showEditForm'])->where('id', '[0-9]+');
Route::post('empresas/editar/{id}', ['middleware' => 'auth', 'as' => 'empresas/editar' , 'uses' => 'EnterprisesController@update'])->where('id', '[0-9]+');
Route::get('empresas/{operationCode?}', ['middleware' => 'auth', 'uses' => 'EnterprisesController@index']);


////////////////////Rutas para seccion Sucursales////////////////////
Route::get('sucursales', ['middleware' => 'auth', 'uses' => 'BranchesController@index']);
Route::get('sucursales/agregar', ['middleware' => 'auth', 'uses' => 'BranchesController@showAddForm']);
Route::post('sucursales/agregar', ['middleware' => 'auth', 'as' => 'sucursales/agregar' , 'uses' => 'BranchesController@store']);
Route::get('sucursales/borrar/{id}', ['middleware' => 'auth', 'uses' => 'BranchesController@delete'])->where('id', '[0-9]+');
Route::get('sucursales/editar/{id}', ['middleware' => 'auth', 'uses' => 'BranchesController@showEditForm'])->where('id', '[0-9]+');
Route::post('sucursales/editar/{id}', ['middleware' => 'auth', 'as' => 'sucursales/editar' , 'uses' => 'BranchesController@update'])->where('id', '[0-9]+');
Route::get('sucursales/{operationCode?}', ['middleware' => 'auth', 'uses' => 'BranchesController@index']);


////////////////////Rutas para seccion Departamentos////////////////////
Route::get('departamentos', ['middleware' => 'auth', 'uses' => 'DepartmentsController@index']);
Route::get('departamentos/agregar', ['middleware' => 'auth', 'uses' => 'DepartmentsController@showAddForm']);
Route::post('departamentos/agregar', ['middleware' => 'auth', 'as' => 'departamentos/agregar' , 'uses' => 'DepartmentsController@store']);
Route::get('departamentos/borrar/{id}', ['middleware' => 'auth', 'uses' => 'DepartmentsController@delete'])->where('id', '[0-9]+');
Route::get('departamentos/editar/{id}', ['middleware' => 'auth', 'uses' => 'DepartmentsController@showEditForm'])->where('id', '[0-9]+');
Route::post('departamentos/editar/{id}', ['middleware' => 'auth', 'as' => 'departamentos/editar' , 'uses' => 'DepartmentsController@update'])->where('id', '[0-9]+');
Route::get('departamentos/{operationCode?}', ['middleware' => 'auth', 'uses' => 'DepartmentsController@index']);


////////////////////Rutas para seccion Horarios////////////////////
Route::get('horarios', ['middleware' => 'auth', 'uses' => 'SchedulesController@index']);
Route::get('horarios/agregar', ['middleware' => 'auth', 'uses' => 'SchedulesController@showAddForm']);
Route::post('horarios/agregar', ['middleware' => 'auth', 'as' => 'horarios/agregar' , 'uses' => 'SchedulesController@store']);
Route::get('horarios/borrar/{id}', ['middleware' => 'auth', 'uses' => 'SchedulesController@delete'])->where('id', '[0-9]+');
Route::get('horarios/editar/{id}', ['middleware' => 'auth', 'uses' => 'SchedulesController@showEditForm'])->where('id', '[0-9]+');
Route::post('horarios/editar/{id}', ['middleware' => 'auth', 'as' => 'horarios/editar' , 'uses' => 'SchedulesController@update'])->where('id', '[0-9]+');
Route::get('horarios/{operationCode?}', ['middleware' => 'auth', 'uses' => 'SchedulesController@index']);


////////////////////Rutas para seccion empleados////////////////////
Route::get('empleados', ['middleware' => 'auth', 'uses' => 'EmployeesController@index']);
Route::get('empleados/agregar', ['middleware' => 'auth', 'uses' => 'EmployeesController@showAddForm']);
Route::post('empleados/agregar', ['middleware' => 'auth', 'as' => 'empleados/agregar' , 'uses' => 'EmployeesController@store']);
Route::get('empleados/borrar/{id}', ['middleware' => 'auth', 'uses' => 'EmployeesController@delete'])->where('id', '[0-9]+');
Route::get('empleados/editar/{id}', ['middleware' => 'auth', 'uses' => 'EmployeesController@showEditForm'])->where('id', '[0-9]+');
Route::post('empleados/editar/{id}', ['middleware' => 'auth', 'as' => 'empleados/editar' , 'uses' => 'EmployeesController@update'])->where('id', '[0-9]+');
Route::get('empleados/{operationCode?}', ['middleware' => 'auth', 'uses' => 'EmployeesController@index']);


////////////////////Rutas para seccion roles////////////////////
Route::get('roles', ['middleware' => 'auth', 'uses' => 'RolesController@index']);
Route::get('roles/agregar', ['middleware' => 'auth', 'uses' => 'RolesController@showAddForm']);
Route::post('roles/agregar', ['middleware' => 'auth', 'as' => 'roles/agregar' , 'uses' => 'RolesController@store']);
Route::get('roles/borrar/{id}', ['middleware' => 'auth', 'uses' => 'RolesController@delete'])->where('id', '[0-9]+');
Route::get('roles/editar/{id}', ['middleware' => 'auth', 'uses' => 'RolesController@showEditForm'])->where('id', '[0-9]+');
Route::post('roles/editar/{id}', ['middleware' => 'auth', 'as' => 'roles/editar' , 'uses' => 'RolesController@update'])->where('id', '[0-9]+');

Route::get('roles/relacionar-permisos/{id}', ['middleware' => 'auth', 'uses' => 'RolesController@showRelatePermissionsForm'])->where('id', '[0-9]+');
Route::post('roles/relacionar-permisos/{id}', ['middleware' => 'auth', 'as' => 'roles/relacionar-permisos' , 'uses' => 'RolesController@relatePermissions'])->where('id', '[0-9]+');


Route::get('roles/{operationCode?}', ['middleware' => 'auth', 'uses' => 'RolesController@index']);


////////////////////Rutas para seccion permisos////////////////////
Route::get('permisos', ['middleware' => 'auth', 'uses' => 'PermissionsController@index']);
Route::get('permisos/agregar', ['middleware' => 'auth', 'uses' => 'PermissionsController@showAddForm']);
Route::post('permisos/agregar', ['middleware' => 'auth', 'as' => 'permisos/agregar' , 'uses' => 'PermissionsController@store']);
Route::get('permisos/borrar/{id}', ['middleware' => 'auth', 'uses' => 'PermissionsController@delete'])->where('id', '[0-9]+');
Route::get('permisos/editar/{id}', ['middleware' => 'auth', 'uses' => 'PermissionsController@showEditForm'])->where('id', '[0-9]+');
Route::post('permisos/editar/{id}', ['middleware' => 'auth', 'as' => 'permisos/editar' , 'uses' => 'PermissionsController@update'])->where('id', '[0-9]+');
Route::get('permisos/{operationCode?}', ['middleware' => 'auth', 'uses' => 'PermissionsController@index']);


////////////////////Rutas para seccion Reportes////////////////////
Route::get('asistencia','AssistanceController@index');

