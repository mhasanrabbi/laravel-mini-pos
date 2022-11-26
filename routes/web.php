<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\ProductsStockController;
use App\Http\Controllers\UserPurchasesController;
use App\Http\Controllers\Reports\SaleReportController;
use App\Http\Controllers\Reports\PaymentReportController;
use App\Http\Controllers\Reports\ReceiptReportController;
use App\Http\Controllers\Reports\PurchaseReportController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@authenticate')->name('login.confirm');

Route::group(['middleware' => 'auth'], function () {

    Route::get('dashboard', function () {
        return view('welcome');
    })->name('dashboard');

    Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

    Route::get('groups', [UserGroupsController::class, 'index']);
    Route::get('groups/create', [UserGroupsController::class, 'create']);
    Route::post('groups', [UserGroupsController::class, 'store']);
    Route::delete('groups/{id}', [UserGroupsController::class, 'destroy']);

    Route::resource('users', UsersController::class);

    # Route for Sales and Invoices
    Route::get('users/{id}/sales', [UserSalesController::class, 'index'])->name('user.sales');
    Route::post('users/{id}/invoices', [UserSalesController::class, 'createInvoice'])->name('user.sales.store');

    Route::get('users/{id}/invoices/{invoice_id}', [UserSalesController::class, 'invoice'])->name('user.sales.invoice_details');
    Route::delete('users/{id}/invoices/{invoice_id}', [UserSalesController::class, 'destroy'])->name('user.sales.destroy');
    Route::post('users/{id}/invoices/{invoice_id}', [UserSalesController::class, 'addItem'])->name('user.sales.invoices.add_item');
    Route::delete('users/{id}/invoices/{invoice_id}/{item_id}', [UserSalesController::class, 'destroyItem'])->name('user.sales.invoices.delete_item');

    #Route for Purchases
    Route::get('users/{id}/purchases', [UserPurchasesController::class, 'index'])->name('user.purchases');
    Route::post('users/{id}/purchases', [UserPurchasesController::class, 'createInvoice'])->name('user.purchases.store');
    Route::get('users/{id}/purchases/{invoice_id}', [UserPurchasesController::class, 'invoice'])->name('user.purchases.invoice_details');
    Route::delete('users/{id}/purchases/{invoice_id}', [UserPurchasesController::class, 'destroy'])->name('user.purchases.destroy');
    Route::post('users/{id}/purchases/{invoice_id}', [UserPurchasesController::class, 'addItem'])->name('user.purchases.add_item');
    Route::delete('users/{id}/purchases/{invoice_id}/{item_id}', [UserPurchasesController::class, 'index'])->name('user.purchases.delete_item');

    # Route for Payments
    Route::get('users/{id}/payments', [UserPaymentsController::class, 'index'])->name('user.payments');
    Route::post('users/{id}/payments/{invoice_id?}', [UserPaymentsController::class, 'store'])->name('user.payments.store');
    Route::delete('users/{id}/payments/{payment_id}', [UserPaymentsController::class, 'destroy'])->name('user.payments.destroy');

    # Route for receipts
    Route::get('users/{id}/receipts', [UserReceiptsController::class, 'index'])->name('user.receipts');
    Route::post('users/{id}/receipts/{invoice_id?}', [UserReceiptsController::class, 'store'])->name('user.receipts.store');
    Route::delete('users/{id}/receipts/{receipt_id}', [UserReceiptsController::class, 'destroy'])->name('user.receipts.destroy');

    #Route for Categories
    Route::resource('categories', CategoriesController::class, ['except' => 'show']);

    # Route for Products
    Route::resource('products', ProductsController::class);

    # Route for Product Stock
    Route::get('stocks', [ProductsStockController::class, 'index'])->name('stocks');

    #Route for Sales and Purchases Reports
    Route::get('reports/sales', [SaleReportController::class, 'index'])->name('reports.sales');
    Route::get('reports/purchases', [PurchaseReportController::class, 'index'])->name('reports.purchases');
    Route::get('reports/payments', [PaymentReportController::class, 'index'])->name('reports.payments');
    Route::get('reports/receipts', [ReceiptReportController::class, 'index'])->name('reports.receipts');
});