<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\userController;
use App\Http\Controllers\DemoController;

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
Auth::routes();

Route::get('/', function () {
    return view('layouts.blank');
})->name('dashboard')->middleware('auth');
Route::get('/test', function () {
    return view('layouts.test');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/error',function(){
    return view('error');
})->name('error');
Route::group(['middleware' => ['auth']], function() {
    Route::get('/product', [ProductController::class, 'index'])->middleware('auth')->name('products.index');
    Route::get('/create', [ProductController::class, 'create']);
    Route::post('product/insert/', [ProductController::class, 'insert'])->name('products.create');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/update/{id}', [ProductController::class, 'update']);
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
    Route::get('/status/{id}', [ProductController::class, 'status']);
    //user
    Route::get('/users', [userController::class, 'index'])->name('users')->withoutMiddleware('auth');
    Route::get('users/create', [userController::class, 'create'])->name('users');
    Route::post('users/insert', [userController::class, 'insert']);
    Route::get('users/edit/{id}', [userController::class, 'edit']);
    Route::post('users/update/{id}', [userController::class, 'update']);
    Route::get('users/delete/{id}', [userController::class, 'delete']);
    Route::get('users/remove_role/{id}', [userController::class, 'remove_role']);
    Route::get('users/roles/{id}', [userController::class, 'roles']);
    Route::post('users/assign_role/{id}', [userController::class, 'assign_role']);
     Route::get('users/permissions/{id}', [userController::class, 'permissions']);
    Route::post('users/assign_permission/{id}', [userController::class, 'assign_permission']);
    //role_permission
    Route::get('/roles', [RoleController::class, 'index'])->name('roles')->middleware('rolesCheck');
    Route::get('roles/create', [RoleController::class, 'create']);
    Route::post('roles/insert', [RoleController::class, 'insert']);
    Route::get('roles/edit/{id}', [RoleController::class, 'edit']);
    Route::post('roles/update/{id}', [RoleController::class, 'update']);
    Route::get('roles/delete/{id}', [RoleController::class, 'delete']);
    Route::get('roles/permission/{id}', [RoleController::class, 'permission']);
    Route::post('roles/addpermission/{id}', [RoleController::class, 'addpermission']);
    // permission
    Route::get('/permissions', [permissionController::class, 'index'])->name('permissions');
    Route::get('/permissions/create', [permissionController::class, 'create']);
    Route::post('/insert', [permissionController::class, 'insert']);
    Route::get('permissions/edit/{id}', [permissionController::class, 'edit']);
    Route::post('permissions/update/{id}', [permissionController::class, 'update']);
    Route::get('permissions/delete/{id}', [permissionController::class, 'delete']);

    //demo
    Route::get('/demo',[DemoController::class,'index'])->name('demo.index');
    Route::post('/demo/insert',[DemoController::class,'insert']);
    Route::get('/demo/edit/{id}',[DemoController::class,'edit'])->middleware('can:create Permission');
    Route::get('/demo/delete/{id}',[DemoController::class,'delete']);
});



