<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
//use App\Http\Middleware\Auth;


Route::get('/',[AuthController::class, 'LoginUrl'])->name('welcome');

Route::get('/logout',[AuthController::class, 'Logout']);

Route::get('/auth/google/callback',[AuthController::class, 'Login']);

Route::get('/dashboard/basicsWelcome',[DashboardController::class, 'basicsWelcome'])->name('dashboard.basicsWelcome');
Route::post('/dashboard/basicsWelcomePost',[DashboardController::class, 'basicsWelcomePost'])->name('dashboard.basicsWelcomePost');

Route::get('/dashboard/basicsSEO',[DashboardController::class, 'basicsSEO'])->name('dashboard.basicsSEO');

Route::get('/dashboard/steps',[DashboardController::class, 'steps'])->name('dashboard.steps');
Route::get('/dashboard/package',[DashboardController::class, 'package'])->name('dashboard.package');
Route::get('/dashboard/delivery',[DashboardController::class, 'delivery'])->name('dashboard.delivery');
Route::get('/dashboard/payments',[DashboardController::class, 'payments'])->name('dashboard.payments');


Route::get('/order/order',[OrderController::class, 'order'])->name('order.order');


