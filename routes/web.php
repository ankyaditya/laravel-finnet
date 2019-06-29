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
    return view('auth.login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource("users", "UserController");

Route::put('/firewalls/{id}/approvestaff', 'UserFirewallController@approvestaff')->name('firewalls.approvestaff');
Route::put('/firewalls/{id}/approvemgr', 'UserFirewallController@approvemgr')->name('firewalls.approvemgr');
Route::resource("firewalls", "UserFirewallController");

Route::put('/firewallaccess/{id}/approvestaffc', 'AccessFirewallController@approvestaffc')->name('firewallaccess.approvestaffc');
Route::put('/firewallaccess/{id}/approvestaffw', 'AccessFirewallController@approvestaffw')->name('firewallaccess.approvestaffw');
Route::put('/firewallaccess/{id}/approvemgr', 'AccessFirewallController@approvemgr')->name('firewallaccess.approvemgr');
Route::get('/firewallaccess/exporti','AccessFirewallController@exportir');
Route::resource("firewallaccess", "AccessFirewallController");

Route::put('/useros/{id}/approvestaffc', 'UserOsController@approvestaffc')->name('useros.approvestaffc');
Route::put('/useros/{id}/approvestaffw', 'UserOsController@approvestaffw')->name('useros.approvestaffw');
Route::put('/useros/{id}/approvemgr', 'UserOsController@approvemgr')->name('useros.approvemgr');
Route::resource("useros", "UserOsController");