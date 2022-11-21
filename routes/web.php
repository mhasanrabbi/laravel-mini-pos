<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserGroupsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('groups', [UserGroupsController::class, 'index']);
Route::get('groups/create', [UserGroupsController::class, 'create']);
Route::post('groups', [UserGroupsController::class, 'store']);
Route::delete('groups/{id}', [UserGroupsController::class, 'destroy']);

Route::get('users', [UsersController::class, 'index']);