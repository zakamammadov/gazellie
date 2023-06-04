<?php
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\HomeController;
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

        Route::match(['get','post'],'/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/create',[UserController::class,'form'])->name('back.user.create');
        Route::get('/edit/{id}',[UserController::class,'form'])->name('back.user.edit');
        Route::post('/save/{id?}', [UserController::class,'save'])->name('back.user.save');
        Route::get('/delete/{id}',[UserController::class,'destroy'])->name('back.user.delete');



//users routes end



        Route::get('/homepage/', [HomeController::class, 'index'])->name('admin.homepage');

    });



    Route::match(['get', 'post'], '/adminlogin',[UserController::class, 'AdminLogin'])->name('admin.login');
    Route::get('/logout/', [UserController::class, 'logout'])->name('admin.logout');
});

