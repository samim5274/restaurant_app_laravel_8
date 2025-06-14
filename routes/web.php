<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\dashboard\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ================================================ dashboard controler route // ================================================

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/setting', [DashboardController::class, 'setting']);
Route::post('/create-new-table', [DashboardController::class, 'creatTable']);
Route::post('/table-detail-update/{id}', [DashboardController::class, 'editTable']);
Route::get('/table-detail-delete/{id}', [DashboardController::class, 'deleteTable']);

Route::post('/create-new-food', [DashboardController::class, 'createFood']);
Route::get('/food-edit-view/{id}', [DashboardController::class, 'foodEditView']);
Route::post('/food/update/{id}', [DashboardController::class, 'foodEdit']);
Route::get('/food/delete/{id}', [DashboardController::class, 'foodDelete']);