<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\order\OrderController;
use App\Http\Controllers\admin\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ================================================ dashboard controler route // ================================================

Route::get('/login', [AdminController::class, 'loginView']);
Route::post('/user-login', [AdminController::class, 'login']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.view');
Route::get('/dashboard/setting', [DashboardController::class, 'setting'])->name('dashboard.main');
Route::post('/create-new-table', [DashboardController::class, 'creatTable']);
Route::post('/table-detail-update/{id}', [DashboardController::class, 'editTable']);
Route::get('/table-detail-delete/{id}', [DashboardController::class, 'deleteTable']);

Route::get('/table', [DashboardController::class, 'tableView']);
Route::get('/food', [DashboardController::class, 'foodView'])->name('food.view');

Route::post('/create-new-food', [DashboardController::class, 'createFood']);
Route::get('/food-edit-view/{id}', [DashboardController::class, 'foodEditView']);
Route::post('/food/update/{id}', [DashboardController::class, 'foodEdit']);
Route::get('/food/delete/{id}', [DashboardController::class, 'foodDelete']);

Route::get('/order', [OrderController::class, 'orderView'])->name('order.view');
Route::get('/menu', [OrderController::class, 'menuView'])->name('menu.view');

Route::get('/booked/table/{id}', [OrderController::class, 'tableBooked']);
Route::get('/add-to-cart/{id}', [OrderController::class, 'addCart']);
Route::get('/cart-view', [OrderController::class, 'cartView'])->name('cart.view');