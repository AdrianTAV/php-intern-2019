<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Employees crud routes
Route::get('/about', 'AboutController@index');
Route::get('/employees', 'EmployeesController@show');

Route::get('/employees/add', 'EmployeesController@add');
Route::post('/employees/add', 'EmployeesController@create');

Route::get('/employees/edit/{id}', 'EmployeesController@edit');
Route::put('/employees/{id}', 'EmployeesController@update');

Route::delete('/employees/{id}', 'EmployeesController@delete');

//Comapnies crud routes
Route::get('/companies', 'CompaniesController@show');

Route::get('/companies/add', 'CompaniesController@add');
Route::post('/companies/add', 'CompaniesController@create');

Route::get('/companies/edit/{id}', 'CompaniesController@edit');
Route::put('/companies/{id}', 'CompaniesController@update');

Route::delete('/companies/{id}', 'CompaniesController@delete');


