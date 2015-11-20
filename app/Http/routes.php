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

Route::get('empresas','EnterprisesController@index');
Route::get('empresas/agregar','EnterprisesController@showAddForm');


Route::get('sucursales','BranchesController@index');
Route::get('sucursales/agregar','BranchesController@showAddForm');


Route::get('departamentos','DepartmentsController@index');
Route::get('departamentos/agregar','DepartmentsController@showAddForm');


Route::get('horarios','SchedulesController@index');
Route::get('horarios/agregar','SchedulesController@showAddForm');


Route::get('empleados','EmployeesController@index');
Route::get('empleados/agregar','EmployeesController@showAddForm');



Route::get('reportes','ReportsController@index');

