<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ParameterController;
//use App\Http\Middleware\Auth;


Route::get('/',[AuthController::class, 'LoginURL'])->name('welcome');

Route::get('/logout',[AuthController::class, 'Logout']);

Route::get('/auth/google/callback',[AuthController::class, 'Login']);

Route::group(['prefix' =>'dashboard', 'middleware' => 'auth'], function(){
	Route::get('/basicWelcome',[DashboardController::class, 'basicWelcome', 'middleware' => 'dashboard'])->name('dashboard.basicWelcome');
	Route::post('/saveWelcomeParameter',[ParameterController::class, 'saveSettingsWelcome', 'middleware' => 'dashboard'])->name('saveWelcomeParameters');

	Route::get('/basicSEO',[DashboardController::class, 'basicSEO', 'middleware' => 'dashboard'])->name('dashboard.basicSEO');

	Route::get('/steps',[DashboardController::class, 'steps', 'middleware' => 'dashboard'])->name('dashboard.steps');
	Route::get('/package',[DashboardController::class, 'package', 'middleware' => 'dashboard'])->name('dashboard.package');
	Route::get('/delivery',[DashboardController::class, 'delivery', 'middleware' => 'dashboard'])->name('dashboard.delivery');
	Route::get('/payments',[DashboardController::class, 'payments', 'middleware' => 'dashboard'])->name('dashboard.payments');
});
Route::get('/order/order',[OrderController::class, 'order'])->name('order.order');


