<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\UserPurchasesController;


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
    Route::get('users/{id}/sales', [UserSalesController::class, 'index'])->name('user.sales');

    Route::get('users/{id}/purchases', [UserPurchasesController::class, 'index'])->name('user.purchases');

    Route::get('users/{id}/payments', [UserPaymentsController::class, 'index'])->name('user.payments');
    Route::post('users/{id}/payments', [UserPaymentsController::class, 'store'])->name('user.payments.store');
    Route::delete('users/{id}/payments/{payment_id}', [UserPaymentsController::class, 'destroy'])->name('user.payments.destroy');

    Route::get('users/{id}/receipts', [UserReceiptsController::class, 'index'])->name('user.receipts');

    Route::resource('categories', CategoriesController::class, ['except' => 'show']);

    Route::resource('products', ProductsController::class);
});