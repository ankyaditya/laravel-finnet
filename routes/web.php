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

Route::resource("users", "UserController")->middleware('auth');

Route::put('/firewalls/{id}/approvestaff', 'UserFirewallController@approvestaff')->name('firewalls.approvestaff')->middleware('auth');
Route::put('/firewalls/{id}/approvemgr', 'UserFirewallController@approvemgr')->name('firewalls.approvemgr')->middleware('auth');
Route::resource("firewalls", "UserFirewallController");

Route::put('/firewallaccess/{id}/approvestaffc', 'AccessFirewallController@approvestaffc')->name('firewallaccess.approvestaffc')->middleware('auth');
Route::put('/firewallaccess/{id}/approvestaffw', 'AccessFirewallController@approvestaffw')->name('firewallaccess.approvestaffw')->middleware('auth');
Route::put('/firewallaccess/{id}/approvemgr', 'AccessFirewallController@approvemgr')->name('firewallaccess.approvemgr')->middleware('auth');
Route::put('/firewallaccess/{id}/disapprovemgr', 'AccessFirewallController@disapprovemgr')->name('firewallaccess.disapprovemgr')->middleware('auth');
Route::get('/firewallaccess/exporti','AccessFirewallController@exportir')->middleware('auth');
Route::resource("firewallaccess", "AccessFirewallController")->middleware('auth');

Route::put('/useros/{id}/approvestaffc', 'UserOsController@approvestaffc')->name('useros.approvestaffc')->middleware('auth');
Route::put('/useros/{id}/approvestaffw', 'UserOsController@approvestaffw')->name('useros.approvestaffw')->middleware('auth');
Route::put('/useros/{id}/approvemgr', 'UserOsController@approvemgr')->name('useros.approvemgr')->middleware('auth');
Route::put('/useros/{id}/disapprovemgr', 'UserOsController@disapprovemgr')->name('useros.disapprovemgr')->middleware('auth');
Route::resource("useros", "UserOsController")->middleware('auth');