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
Route::get('/home/profile', 'HomeController@profile')->name('home.profile');
Route::get('/home/edit', 'HomeController@edit')->name('home.edit');
Route::put('/home/update', 'HomeController@update')->name('home.update');

Route::resource("users", "UserController")->middleware('auth');

Route::put('/firewalls/{id}/approvestaff', 'UserFirewallController@approvestaff')->name('firewalls.approvestaff')->middleware('auth');
Route::put('/firewalls/{id}/approvemgr', 'UserFirewallController@approvemgr')->name('firewalls.approvemgr')->middleware('auth');
Route::resource("firewalls", "UserFirewallController");

Route::put('/firewallaccess/{id}/approvestaffc', 'AccessFirewallController@approvestaffc')->name('firewallaccess.approvestaffc')->middleware('auth');
Route::put('/firewallaccess/{id}/approvestaffw', 'AccessFirewallController@approvestaffw')->name('firewallaccess.approvestaffw')->middleware('auth');
Route::put('/firewallaccess/{id}/approvemgr', 'AccessFirewallController@approvemgr')->name('firewallaccess.approvemgr')->middleware('auth');
Route::put('/firewallaccess/{id}/disapprovemgr', 'AccessFirewallController@disapprovemgr')->name('firewallaccess.disapprovemgr')->middleware('auth');
Route::get('/firewallaccess/export','AccessFirewallController@export')->name('firewallaccess.export')->middleware('auth');
Route::resource("firewallaccess", "AccessFirewallController")->middleware('auth');

Route::put('/useros/{id}/approvestaffc', 'UserOsController@approvestaffc')->name('useros.approvestaffc')->middleware('auth');
Route::put('/useros/{id}/approvestaffw', 'UserOsController@approvestaffw')->name('useros.approvestaffw')->middleware('auth');
Route::put('/useros/{id}/approvemgr', 'UserOsController@approvemgr')->name('useros.approvemgr')->middleware('auth');
Route::put('/useros/{id}/disapprovemgr', 'UserOsController@disapprovemgr')->name('useros.disapprovemgr')->middleware('auth');
Route::get('/useros/export','UserOsController@export')->name('useros.export')->middleware('auth');
Route::resource("useros", "UserOsController")->middleware('auth');

Route::put('/server/{id}/approvestaffc', 'ServerController@approvestaffc')->name('server.approvestaffc')->middleware('auth');
Route::put('/server/{id}/approvestaffw', 'ServerController@approvestaffw')->name('server.approvestaffw')->middleware('auth');
Route::put('/server/{id}/approvemgr', 'ServerController@approvemgr')->name('server.approvemgr')->middleware('auth');
Route::put('/server/{id}/disapprovemgr', 'ServerController@disapprovemgr')->name('server.disapprovemgr')->middleware('auth');
Route::get('/server/export','ServerController@export')->name('server.export')->middleware('auth');
Route::resource("server", "ServerController")->middleware('auth');

Route::put('/orderlink/{id}/approvestaffc', 'OrderLinkController@approvestaffc')->name('orderlink.approvestaffc')->middleware('auth');
Route::put('/orderlink/{id}/approvestaffw', 'OrderLinkController@approvestaffw')->name('orderlink.approvestaffw')->middleware('auth');
Route::put('/orderlink/{id}/approvemgr', 'OrderLinkController@approvemgr')->name('orderlink.approvemgr')->middleware('auth');
Route::put('/orderlink/{id}/disapprovemgr', 'OrderLinkController@disapprovemgr')->name('orderlink.disapprovemgr')->middleware('auth');
Route::get('/orderlink/export','OrderLinkController@export')->name('orderlink.export')->middleware('auth');
Route::resource("orderlink", "OrderLinkController")->middleware('auth');