<?php
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;

use App\Http\Middleware\Admin;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    Route::redirect('/', 'adminlogin');
    Route::group(['middleware' => 'admin'], function () {

//users routes start
Route::group(['prefix' => 'users'], function () {
        Route::match(['get','post'],'/', [UserController::class, 'index'])->name('admin.users');
        Route::get('/create',[UserController::class,'form'])->name('back.user.create');
        Route::get('/edit/{id}',[UserController::class,'form'])->name('back.user.edit');
        Route::post('/save/{id?}', [UserController::class,'save'])->name('back.user.save');
        Route::get('/delete/{id}',[UserController::class,'destroy'])->name('back.user.delete');
    });
//users routes end

//category routes start
Route::group(['prefix' => 'category'], function () {
Route::match(['get','post'],'/', [CategoryController::class, 'index'])->name('admin.categories');
Route::get('/create',[CategoryController::class,'form'])->name('back.category.create');
Route::get('/edit/{id}',[CategoryController::class,'form'])->name('back.category.edit');
Route::post('/save/{id?}', [CategoryController::class,'save'])->name('back.category.save');
Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('back.category.delete');
});
//category routes end


//product routes start
Route::group(['prefix' => 'product'], function () {
    Route::match(['get','post'],'/', [ProductController::class, 'index'])->name('admin.product');
    Route::get('/create',[ProductController::class,'form'])->name('back.product.create');
    Route::get('/edit/{id}',[ProductController::class,'form'])->name('back.product.edit');
    Route::post('/save/{id?}', [ProductController::class,'save'])->name('back.product.save');
    Route::get('/delete/{id}',[ProductController::class,'destroy'])->name('back.product.delete');
    });
    //product routes end



        Route::get('/homepage/', [HomeController::class, 'index'])->name('admin.homepage');

    });
    Route::match(['get', 'post'], '/adminlogin',[UserController::class, 'AdminLogin'])->name('admin.login');
    Route::get('/logout/', [UserController::class, 'logout'])->name('admin.logout');
});

