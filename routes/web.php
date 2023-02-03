<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\StepsController;
use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\DeliveryController;
//use App\Http\Middleware\Auth;


Route::get('/',[AuthController::class, 'LoginURL'])->name('welcome');

Route::get('/logout',[AuthController::class, 'Logout']);

Route::get('/auth/google/callback',[AuthController::class, 'Login']);

Route::group(['prefix' =>'dashboard', 'middleware' => 'auth'], function(){
	Route::get('/basicWelcome',[DashboardController::class, 'basicWelcome', 'middleware' => 'dashboard'])->name('dashboard.basicWelcome');
	Route::post('/saveWelcomeParameter',[ParameterController::class, 'saveSettingsWelcome', 'middleware' => 'dashboard'])->name('saveWelcomeParameters');

	Route::get('/basicSEO',[DashboardController::class, 'basicSEO', 'middleware' => 'dashboard'])->name('dashboard.basicSEO');
	Route::post('/saveSeoParameter',[ParameterController::class, 'saveSettingsSeo', 'middleware' => 'dashboard'])->name('saveSeoParameters');

	Route::get('/steps',[DashboardController::class, 'steps', 'middleware' => 'dashboard'])->name('dashboard.steps');
	Route::post('/addStep',[StepsController::class, 'addStep', 'middleware' => 'dashboard'])->name('addStep');
	Route::get('/stepEdit/{id}',[DashboardController::class, 'stepEdit', 'middleware' => 'dashboard'])->name('dashboard.stepEdit');
	Route::post('/stepEditPost',[StepsController::class, 'stepEdit', 'middleware' => 'dashboard'])->name('stepEditPost');
	Route::get('/step/{id}',[DashboardController::class, 'step', 'middleware' => 'dashboard'])->name('dashboard.step');
	Route::post('/addComponent',[ComponentsController::class, 'addComponent', 'middleware' => 'dashboard'])->name('addComponent');
	Route::get('/component/{id}',[ComponentsController::class, 'showComponent', 'middleware' => 'dashboard'])->name('dashboard.component');
	Route::post('/updateComponent',[ComponentsController::class, 'updateComponent', 'middleware' => 'dashboard'])->name('updateComponent');
	Route::get('/deleteComponent/{id}',[ComponentsController::class, 'deleteComponent', 'middleware' => 'dashboard'])->name('dashboard.deleteComponent');
	
	Route::get('/packages',[DashboardController::class, 'packages', 'middleware' => 'dashboard'])->name('dashboard.packages');
	Route::get('/package/{id}',[PackageController::class, 'package', 'middleware' => 'dashboard'])->name('dashboard.package');
	Route::post('/addPackage',[PackageController::class, 'addPackage', 'middleware' => 'dashboard'])->name('addPackage');
	Route::post('/updatePackage',[PackageController::class, 'updatePackage', 'middleware' => 'dashboard'])->name('updatePackage');
	Route::get('/deletePackage/{id}',[PackageController::class, 'deletePackage', 'middleware' => 'dashboard'])->name('dashboard.deletePackage');
	
	Route::get('/deliveries',[DashboardController::class, 'deliveries', 'middleware' => 'dashboard'])->name('dashboard.deliveries');
	Route::get('/delivery/{id}',[DeliveryController::class, 'delivery', 'middleware' => 'dashboard'])->name('dashboard.delivery');
	Route::post('/addDelivery',[DeliveryController::class, 'add', 'middleware' => 'dashboard'])->name('addDelivery');
	Route::post('/updateDelivery',[DeliveryController::class, 'update', 'middleware' => 'dashboard'])->name('updateDelivery');
	Route::get('/deleteDelivery/{id}',[DeliveryController::class, 'delete', 'middleware' => 'dashboard'])->name('dashboard.deleteDelivery');

	
//	Route::get('/package',[DashboardController::class, 'package', 'middleware' => 'dashboard'])->name('dashboard.package');
//	Route::get('/delivery',[DashboardController::class, 'delivery', 'middleware' => 'dashboard'])->name('dashboard.delivery');
	Route::get('/payments',[DashboardController::class, 'payments', 'middleware' => 'dashboard'])->name('dashboard.payments');
});
Route::get('/order/order',[OrderController::class, 'order'])->name('order.order');


