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

Route::get('api/getCountiesByStateId/{stateId}','api@getCountiesByStateId');
Route::get('api/getBranchesByEnterpriseId/{enterpriseId}','api@getBranchesByEnterpriseId');
Route::get('api/getDepartmentsByBranchId/{branchId}','api@getDepartmentsByBranchId');

Route::get('login','LoginController@index');
Route::get('inicio','HomeController@index');

Route::get('empresas','EnterprisesController@index');
Route::get('empresas/agregar','EnterprisesController@showAddForm');
Route::post('empresas/agregar', ['as' => 'empresas/agregar' , 'uses' => 'EnterprisesController@store']);
Route::get('empresas/borrar/{id}','EnterprisesController@delete')->where('id', '[0-9]+');
Route::get('empresas/{operationCode?}','EnterprisesController@index');

Route::get('sucursales','BranchesController@index');
Route::get('sucursales/agregar','BranchesController@showAddForm');
Route::post('sucursales/agregar', ['as' => 'sucursales/agregar' , 'uses' => 'BranchesController@store']);
Route::get('sucursales/borrar/{id}','BranchesController@delete')->where('id', '[0-9]+');
Route::get('sucursales/{operationCode?}','BranchesController@index');

Route::get('departamentos','DepartmentsController@index');
Route::get('departamentos/agregar','DepartmentsController@showAddForm');
Route::post('departamentos/agregar', ['as' => 'departamentos/agregar' , 'uses' => 'DepartmentsController@store']);
Route::get('departamentos/borrar/{id}','DepartmentsController@delete')->where('id', '[0-9]+');
Route::get('departamentos/{operationCode?}','DepartmentsController@index');

Route::get('horarios','SchedulesController@index');
Route::get('horarios/agregar','SchedulesController@showAddForm');
Route::post('horarios/agregar', ['as' => 'horarios/agregar' , 'uses' => 'SchedulesController@store']);
Route::get('horarios/borrar/{id}','SchedulesController@delete')->where('id', '[0-9]+');
Route::get('horarios/{operationCode?}','SchedulesController@index');

Route::get('empleados','EmployeesController@index');
Route::get('empleados/agregar','EmployeesController@showAddForm');
Route::post('empleados/agregar', ['as' => 'empleados/agregar' , 'uses' => 'EmployeesController@store']);
Route::get('empleados/borrar/{id}','EmployeesController@delete')->where('id', '[0-9]+');
Route::get('empleados/{operationCode?}','EmployeesController@index');



Route::get('reportes','ReportsController@index');

