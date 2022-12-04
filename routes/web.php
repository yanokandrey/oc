<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
//use App\Http\Middleware\Auth;


Route::get('/',[AuthController::class, 'LoginURL'])->name('welcome');

Route::get('/logout',[AuthController::class, 'Logout']);

Route::get('/auth/google/callback',[AuthController::class, 'Login']);

Route::group(['prefix' =>'dashboard', 'middleware' => 'auth', 'middleware' => 'dashboard'], function(){
	Route::get('/basicsWelcome',[DashboardController::class, 'basicsWelcome'])->name('dashboard.basicsWelcome');
	Route::post('/basicsWelcomePost',[DashboardController::class, 'basicsWelcomePost'])->name('dashboard.basicsWelcomePost');

	Route::get('/basicsSEO',[DashboardController::class, 'basicsSEO'])->name('dashboard.basicsSEO');

	Route::get('/steps',[DashboardController::class, 'steps'])->name('dashboard.steps');
	Route::get('/package',[DashboardController::class, 'package'])->name('dashboard.package');
	Route::get('/delivery',[DashboardController::class, 'delivery'])->name('dashboard.delivery');
	Route::get('/payments',[DashboardController::class, 'payments'])->name('dashboard.payments');
});
Route::get('/order/order',[OrderController::class, 'order'])->name('order.order');


