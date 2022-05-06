<?php

use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [UserController::class,'index'])->name('users.index');

Route::prefix('users')->controller(UserController::class)->group(function () {

    Route::get('/', 'index')->name('users.index');

    Route::get('add-user', 'addUser')->name('users.add');
    Route::post('add-user', 'createUser')->name('users.create');

    Route::get('edit-user/{id}', 'editUser')->name('users.edit');
    Route::put('edit-user/{id}', 'updateUser')->name('users.update');

    Route::get('detail-user/{id}', 'detailUser')->name('users.detail');
    Route::delete('delete-user/{id}', 'deleteUser')->name('users.delete');
});

