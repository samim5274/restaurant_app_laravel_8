<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\order\OrderController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\food\FoodController;
use App\Http\Controllers\food\KitchenController;
use App\Http\Controllers\Sale\SaleController;
use App\Http\Controllers\Account\AccountController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [AdminController::class, 'loginView']);
Route::post('/user-login', [AdminController::class, 'login']);
Route::get('/create-user-view', [AdminController::class, 'userCreateView'])->name('user.create.view');
Route::post('/new-user', [AdminController::class, 'createUser']);

Route::group(['middleware' => ['admin']], function () {

    // ================================================ dashboard Controller route // ================================================

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.view');
    Route::get('/dashboard/setting', [DashboardController::class, 'setting'])->name('dashboard.main');
    Route::post('/create-new-table', [DashboardController::class, 'creatTable']);
    Route::post('/table-detail-update/{id}', [DashboardController::class, 'editTable']);
    Route::get('/table-detail-delete/{id}', [DashboardController::class, 'deleteTable']);
    Route::get('/table', [DashboardController::class, 'tableView']);

    Route::get('/backup', [DashboardController::class, 'backup']);

    // ================================================ Food Controller route // ================================================

    Route::get('/food', [FoodController::class, 'foodView'])->name('food.view');
    Route::get('/stock-in', [FoodController::class, 'foodStockView'])->name('food.stock.view');
    Route::post('/create-new-food', [FoodController::class, 'createFood']);
    Route::get('/food-edit-view/{id}', [FoodController::class, 'foodEditView']);
    Route::post('/food/update/{id}', [FoodController::class, 'foodEdit']);
    Route::get('/food/delete/{id}', [FoodController::class, 'foodDelete']);
    Route::get('/specific-food-view/{id}', [FoodController::class, 'SpecificFoodView'])->name('specific.food.view');

    Route::get('/live-search-food-menu', [FoodController::class, 'liveSearch']);

    // ================================================ Order Controller route // ================================================

    Route::get('/empty', [OrderController::class, 'orderView'])->name('order.view');
    Route::get('/menu', [OrderController::class, 'menuView'])->name('menu.view');

    Route::get('/booked/table/{id}', [OrderController::class, 'tableBooked']);
    Route::get('/add-to-cart/{id}', [OrderController::class, 'addCart']);
    Route::get('/add-to-cart-2', [OrderController::class, 'addCart2']);
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

    Route::get('/live-search-order', [OrderController::class, 'liveSearchOrder']);
    Route::get('/live-search-due', [OrderController::class, 'liveSearchDue']);

    // ================================================ sale report route // ================================================

    Route::get('/get-invoice/{reg}', [SaleController::class, 'getPdf'])->name('invoice.get');
    Route::get('/download-invoice/{reg}', [SaleController::class, 'downloadPdf'])->name('download.pdf');
    Route::get('/invoice/print/{reg}', [OrderController::class, 'printInvoice'])->name('invoice.print');

    // ================================================ sale Controller route // ================================================

    Route::get('/total-sale', [SaleController::class, 'totalSale'])->name('sale.view');
    Route::get('/report-due-list', [SaleController::class, 'dueCollectioListView'])->name('due.view');
    Route::get('/day-wise-report', [SaleController::class, 'dayWiseReport'])->name('day.wise.report.view');
    Route::post('/search-report-date-wise', [SaleController::class, 'SearchReportDateWise']);
    Route::get('/download', [SaleController::class, 'download']);
    Route::get('/view/order/{reg}', [SaleController::class, 'viewOrder'])->name('view.order.item.from.report');

    // ================================================ Kitchen Controller route // ================================================

    Route::get('/show-order-item', [KitchenController::class, 'showOrder'])->name('kitchen.order.show');
    Route::get('/list/order/{reg}', [KitchenController::class, 'listOrder'])->name('list.order.view');
    Route::post('/update-kitchen-status/{reg}', [KitchenController::class, 'updateKitchenStatus']);

    Route::get('/live-search-kitchen', [KitchenController::class, 'searchKitchen']);

    // ================================================ Account Controller route // ================================================

    Route::get('/expenses-setting', [AccountController::class, 'setting'])->name('expenses.setting.view');
    Route::post('/add-category', [AccountController::class, 'addCategory']);
    Route::post('/add-sub-category', [AccountController::class, 'addSubCategory']);
    Route::get('/getSubCategory/{id}', [AccountController::class, 'getSubcategory']);
    Route::get('/daily-expenses', [AccountController::class, 'dailyExpenses'])->name('daily.expenses.view');
    Route::post('/add-daily-expenses', [AccountController::class, 'addExpenses']);

    Route::get('/category-report', [AccountController::class, 'catRpt']);
    Route::get('/search-category', [AccountController::class, 'searchCategory']);
    Route::get('/sub-category-report', [AccountController::class, 'subCatRpt']);
    Route::get('/search-sub-category', [AccountController::class, 'searchSubCat']);
    Route::get('/total-day-wise-report', [AccountController::class, 'totalDay']);
    Route::get('/search-total-day', [AccountController::class, 'totalDaySearch']);

    Route::get('/print-expenses', [AccountController::class, 'printExpenses']);
    Route::get('/print-expenses-specific/{id}', [AccountController::class, 'specificPrint']);
});