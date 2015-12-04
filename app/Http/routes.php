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

Route::get('/', function () {
    return view("login");
});

Route::get('login','LoginController@index');
Route::get('inicio','HomeController@index');
Route::get('checador','CheckController@index');
Route::post('checador', ['as' => 'checador' , 'uses' => 'CheckController@check']);
Route::post('reporte', ['as' => 'reporte' , 'uses' => 'CheckController@submitActivityReport']);

////////////////////Rutas para el API////////////////////
Route::get('api/getCountiesByStateId/{stateId}','api@getCountiesByStateId');
Route::get('api/getBranchesByEnterpriseId/{enterpriseId}','api@getBranchesByEnterpriseId');
Route::get('api/getDepartmentsByBranchId/{branchId}','api@getDepartmentsByBranchId');
Route::get('api/getServerTime','api@getServerTime');

////////////////////Rutas para seccion Empresas////////////////////
Route::get('empresas','EnterprisesController@index');
Route::get('empresas/agregar','EnterprisesController@showAddForm');
Route::post('empresas/agregar', ['as' => 'empresas/agregar' , 'uses' => 'EnterprisesController@store']);
Route::get('empresas/borrar/{id}','EnterprisesController@delete')->where('id', '[0-9]+');
Route::get('empresas/editar/{id}','EnterprisesController@showEditForm')->where('id', '[0-9]+');
Route::post('empresas/editar/{id}', ['as' => 'empresas/editar' , 'uses' => 'EnterprisesController@update']);
Route::get('empresas/{operationCode?}','EnterprisesController@index');

////////////////////Rutas para seccion Sucursales////////////////////
Route::get('sucursales','BranchesController@index');
Route::get('sucursales/agregar','BranchesController@showAddForm');
Route::post('sucursales/agregar', ['as' => 'sucursales/agregar' , 'uses' => 'BranchesController@store']);
Route::get('sucursales/borrar/{id}','BranchesController@delete')->where('id', '[0-9]+');
Route::get('sucursales/editar/{id}','BranchesController@showEditForm')->where('id', '[0-9]+');
Route::post('sucursales/editar/{id}', ['as' => 'sucursales/editar' , 'uses' => 'BranchesController@update']);
Route::get('sucursales/{operationCode?}','BranchesController@index');

////////////////////Rutas para seccion Departamentos////////////////////
Route::get('departamentos','DepartmentsController@index');
Route::get('departamentos/agregar','DepartmentsController@showAddForm');
Route::post('departamentos/agregar', ['as' => 'departamentos/agregar' , 'uses' => 'DepartmentsController@store']);
Route::get('departamentos/borrar/{id}','DepartmentsController@delete')->where('id', '[0-9]+');
Route::get('departamentos/editar/{id}','DepartmentsController@showEditForm')->where('id', '[0-9]+');
Route::post('departamentos/editar/{id}', ['as' => 'departamentos/editar' , 'uses' => 'DepartmentsController@update']);
Route::get('departamentos/{operationCode?}','DepartmentsController@index');

////////////////////Rutas para seccion Horarios////////////////////
Route::get('horarios','SchedulesController@index');
Route::get('horarios/agregar','SchedulesController@showAddForm');
Route::post('horarios/agregar', ['as' => 'horarios/agregar' , 'uses' => 'SchedulesController@store']);
Route::get('horarios/borrar/{id}','SchedulesController@delete')->where('id', '[0-9]+');
Route::get('horarios/editar/{id}','SchedulesController@showEditForm')->where('id', '[0-9]+');
Route::post('horarios/editar/{id}', ['as' => 'horarios/editar' , 'uses' => 'SchedulesController@update']);
Route::get('horarios/{operationCode?}','SchedulesController@index');

////////////////////Rutas para seccion empleados////////////////////
Route::get('empleados','EmployeesController@index');
Route::get('empleados/agregar','EmployeesController@showAddForm');
Route::post('empleados/agregar', ['as' => 'empleados/agregar' , 'uses' => 'EmployeesController@store']);
Route::get('empleados/borrar/{id}','EmployeesController@delete')->where('id', '[0-9]+');
Route::get('empleados/editar/{id}','EmployeesController@showEditForm')->where('id', '[0-9]+');
Route::post('empleados/editar/{id}', ['as' => 'empleados/editar' , 'uses' => 'EmployeesController@update']);
Route::get('empleados/{operationCode?}','EmployeesController@index');

////////////////////Rutas para seccion Reportes////////////////////
Route::get('reportes','ReportsController@index');

