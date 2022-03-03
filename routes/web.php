<?php

use App\Http\Controllers\UserListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Companies\CompaniesHomeController;


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
    return view('top');
});

Route::get('/users/user_list', [UserListController::class,'index'])
    ->name('users.user_list');

Route::get('/users/{userList}', [UserListController::class,'show'])
    ->name('users.show')
    ->where('userList','[0-9]+');

Route::get('/users/create', [UserListController::class,'create'])
    ->name('users.create');

Route::post('/users/store', [UserListController::class,'store'])
->name('users.store');

Route::get('/users/{userList}/edit', [UserListController::class,'edit'])
    ->name('users.edit')
    ->where('userList','[0-9]+');

Route::patch('/users/{userList}/update', [UserListController::class,'update'])
    ->name('users.update')
    ->where('userList','[0-9]+');

Route::delete('/users/{userList}/destroy', [UserListController::class, 'destroy'])
    ->name('users.destroy')
    ->where('userList', '[0-9]+');

//ログイン

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// マルチログイン
Route::prefix('companies')
    ->namespace('App\Http\Controllers\Companies')
    ->name('companies.')
    ->group(function(){
    Auth::routes();

    Route::get('/home', [CompaniesHomeController::class,'index'])
        ->name('companies_home');
});
