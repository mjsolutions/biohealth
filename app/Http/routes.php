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
Route::post('empresas/editar/{id}', ['middleware' => 'auth', 'as' => 'empresas/editar' , 'uses' => 'EnterprisesController@update']);
Route::get('empresas/{operationCode?}', ['middleware' => 'auth', 'uses' => 'EnterprisesController@index']);


////////////////////Rutas para seccion Sucursales////////////////////
Route::get('sucursales', ['middleware' => 'auth', 'uses' => 'BranchesController@index']);
Route::get('sucursales/agregar', ['middleware' => 'auth', 'uses' => 'BranchesController@showAddForm']);
Route::post('sucursales/agregar', ['middleware' => 'auth', 'as' => 'sucursales/agregar' , 'uses' => 'BranchesController@store']);
Route::get('sucursales/borrar/{id}', ['middleware' => 'auth', 'uses' => 'BranchesController@delete'])->where('id', '[0-9]+');
Route::get('sucursales/editar/{id}', ['middleware' => 'auth', 'uses' => 'BranchesController@showEditForm'])->where('id', '[0-9]+');
Route::post('sucursales/editar/{id}', ['middleware' => 'auth', 'as' => 'sucursales/editar' , 'uses' => 'BranchesController@update']);
Route::get('sucursales/{operationCode?}', ['middleware' => 'auth', 'uses' => 'BranchesController@index']);


////////////////////Rutas para seccion Departamentos////////////////////
Route::get('departamentos', ['middleware' => 'auth', 'uses' => 'DepartmentsController@index']);
Route::get('departamentos/agregar', ['middleware' => 'auth', 'uses' => 'DepartmentsController@showAddForm']);
Route::post('departamentos/agregar', ['middleware' => 'auth', 'as' => 'departamentos/agregar' , 'uses' => 'DepartmentsController@store']);
Route::get('departamentos/borrar/{id}', ['middleware' => 'auth', 'uses' => 'DepartmentsController@delete'])->where('id', '[0-9]+');
Route::get('departamentos/editar/{id}', ['middleware' => 'auth', 'uses' => 'DepartmentsController@showEditForm'])->where('id', '[0-9]+');
Route::post('departamentos/editar/{id}', ['middleware' => 'auth', 'as' => 'departamentos/editar' , 'uses' => 'DepartmentsController@update']);
Route::get('departamentos/{operationCode?}', ['middleware' => 'auth', 'uses' => 'DepartmentsController@index']);


////////////////////Rutas para seccion Horarios////////////////////
Route::get('horarios', ['middleware' => 'auth', 'uses' => 'SchedulesController@index']);
Route::get('horarios/agregar', ['middleware' => 'auth', 'uses' => 'SchedulesController@showAddForm']);
Route::post('horarios/agregar', ['middleware' => 'auth', 'as' => 'horarios/agregar' , 'uses' => 'SchedulesController@store']);
Route::get('horarios/borrar/{id}', ['middleware' => 'auth', 'uses' => 'SchedulesController@delete'])->where('id', '[0-9]+');
Route::get('horarios/editar/{id}', ['middleware' => 'auth', 'uses' => 'SchedulesController@showEditForm'])->where('id', '[0-9]+');
Route::post('horarios/editar/{id}', ['middleware' => 'auth', 'as' => 'horarios/editar' , 'uses' => 'SchedulesController@update']);
Route::get('horarios/{operationCode?}', ['middleware' => 'auth', 'uses' => 'SchedulesController@index']);


////////////////////Rutas para seccion empleados////////////////////
Route::get('empleados', ['middleware' => 'auth', 'uses' => 'EmployeesController@index']);
Route::get('empleados/agregar', ['middleware' => 'auth', 'uses' => 'EmployeesController@showAddForm']);
Route::post('empleados/agregar', ['middleware' => 'auth', 'as' => 'empleados/agregar' , 'uses' => 'EmployeesController@store']);
Route::get('empleados/borrar/{id}', ['middleware' => 'auth', 'uses' => 'EmployeesController@delete'])->where('id', '[0-9]+');
Route::get('empleados/editar/{id}', ['middleware' => 'auth', 'uses' => 'EmployeesController@showEditForm'])->where('id', '[0-9]+');
Route::post('empleados/editar/{id}', ['middleware' => 'auth', 'as' => 'empleados/editar' , 'uses' => 'EmployeesController@update']);
Route::get('empleados/{operationCode?}', ['middleware' => 'auth', 'uses' => 'EmployeesController@index']);


////////////////////Rutas para seccion Reportes////////////////////
Route::get('asistencia','AssistanceController@index');

