<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\order\OrderController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\food\FoodController;
use App\Http\Controllers\Sale\SaleController;

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

Route::get('/backup', [DashboardController::class, 'backup']);

// ================================================ Food controler route // ================================================

Route::get('/food', [FoodController::class, 'foodView'])->name('food.view');
Route::get('/stock-in', [FoodController::class, 'foodStockView'])->name('food.stock.view');
Route::post('/create-new-food', [FoodController::class, 'createFood']);
Route::get('/food-edit-view/{id}', [FoodController::class, 'foodEditView']);
Route::post('/food/update/{id}', [FoodController::class, 'foodEdit']);
Route::get('/food/delete/{id}', [FoodController::class, 'foodDelete']);
Route::get('/specific-food-view/{id}', [FoodController::class, 'SpecificFoodView'])->name('specific.food.view');

// ================================================ Order controler route // ================================================

Route::get('/empty', [OrderController::class, 'orderView'])->name('order.view');
Route::get('/menu', [OrderController::class, 'menuView'])->name('menu.view');

Route::get('/booked/table/{id}', [OrderController::class, 'tableBooked']);
Route::get('/add-to-cart/{id}', [OrderController::class, 'addCart']);
Route::get('/cart-view', [OrderController::class, 'cartView'])->name('cart.view');
Route::post('/cart/update-quantity', [OrderController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::get('/remove-to-cart/{id}', [OrderController::class, 'removeCart']);
Route::post('/confirm-order', [OrderController::class, 'confirmOrder']);
Route::get('/delere/order/{reg}', [OrderController::class, 'deleteOrder']);

Route::get('/edit/order/{reg}', [OrderController::class, 'editOrder'])->name('edit.order');
Route::get('/add/item/cart/{reg}', [OrderController::class, 'editCartItem'])->name('edit.cart.item.order');
Route::get('/edit/add/item/cart/{id}/{reg}', [OrderController::class, 'addEditCartItem'])->name('add.edit.cart.item.order');
Route::post('/order/modify/{reg}', [OrderController::class, 'orderModify']);

Route::get('/order-list', [OrderController::class, 'orderList'])->name('order.list.view');
Route::post('/payment/{reg}',[OrderController::class, 'payment']);
Route::get('/due-collection', [OrderController::class, 'dueCollectionView'])->name('due.list');
Route::post('/due-payment/{reg}', [OrderController::class, 'dueCollection']);

// ================================================ sale report route // ================================================

Route::get('/get-invoice/{reg}', [SaleController::class, 'getPdf'])->name('invoice.get');
Route::get('/download-invoice/{reg}', [SaleController::class, 'downloadPdf'])->name('download.pdf');

// ================================================ sale controler route // ================================================

Route::get('/total-sale', [SaleController::class, 'totalSale'])->name('sale.view');
Route::get('/report-due-list', [SaleController::class, 'dueCollectioListView'])->name('due.view');
Route::get('/day-wise-report', [SaleController::class, 'dayWiseReport'])->name('day.wise.report.view');
Route::post('/search-report-date-wise', [SaleController::class, 'SearchReportDateWise']);
Route::get('/download', [SaleController::class, 'download']);
