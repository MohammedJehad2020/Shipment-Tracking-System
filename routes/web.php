<?php

use App\Http\Controllers\GoodsController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShipmentsController;
use App\Http\Controllers\Users\UsersController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
], function () {

    Route::get('/', function () {
        return view('auth.authPages.loginPage');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/master', function () {
        return view('home');
    })->middleware(['auth', 'verified'])->name('master');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::resource('users', UsersController::class);
        Route::post('/delete-users', [UsersController::class, "del_ids"])->name("users.del_ids");
        

        Route::get('/role-users/{id}', [RoleController::class, 'roleUsers'])->name('role.users');
        Route::post('/delete-role-users', [RoleController::class, "del_ids"])->name("role.users.del_ids");
        Route::delete('/delete-role-user/{id}/{roleId}', [RoleController::class, "destroy"])->name("role.user.delete");

        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionsController::class);
        Route::post('/delete-permissions', [PermissionsController::class, "del_ids"])->name("permissions.del_ids");


        #Goods
        Route::post('/delete-goods', [GoodsController::class, "del_ids"])->name("goods.del_ids");
        Route::resource('goods', GoodsController::class);
        #Shipments
        Route::post('/delete-shipments', [ShipmentsController::class, "del_ids"])->name("shipments.del_ids");
        Route::resource('shipments', ShipmentsController::class);

    });
    require __DIR__ . '/auth.php';
});
