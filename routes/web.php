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

Route::get('/', 'HomeController@indexAction');

Route::get('/dashboard', 'DashBoardController@indexAction');

Route::resource('/expense-reports', 'ExpenseReportController');

Route::get('/expense-reports/{id}/delete', 'ExpenseReportController@confirmDelete');

Route::get('/expense-reports/{expenseReport}/expenses/create', 'ExpenseController@create');

Route::post('/expense-reports/{expenseReport}/created', 'ExpenseController@store');

Route::get('/expense-reports/{id}/confirm-send-mail', 'ExpenseReportController@confirmSendMail');
Route::post('/expense-reports/{id}/send', 'ExpenseReportController@sendMail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
