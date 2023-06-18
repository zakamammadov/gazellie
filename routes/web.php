<?php
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\User_Controller;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\Frontend\CatController;
use App\Http\Controllers\Frontend\ProdController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\PageController;

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
// frontend start
Route::get('/',[HomePageController::class,'index'])->name('home');
Route::get('/category/{cat_slug}',[CatController::class,'index'])->name('category');
Route::get('/product/{prod_slug}',[ProdController::class,'index'])->name('product');

Route::group(['prefix' => 'cart'], function () {
    Route::get('/', [CartController::class,'index'])->name('cart');
    Route::post('/add',  [CartController::class,'add'])->name('cart.add');
    Route::get('/delete/{row_id}', [CartController::class,'destroy'])->name('cart.destroy');
    Route::post('/remove_all', [CartController::class,'remove_all'])->name('cart.remove_all');
    Route::post('/edit/{row_id}', [CartController::class,'edit'])->name('cart.edit');
});

Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('/checkout',  [CheckoutController::class,'pay'])->name('pay');


Route::group(['prefix' => 'user'], function () {
    Route::get('/login-form', [User_Controller::class,'log_reg_form'])->name('user.log_reg_form');
    Route::get('/login', [User_Controller::class,'login_form'])->name('user.login');
    Route::post('/login',  [User_Controller::class,'login']);
    Route::get('/register', [User_Controller::class,'register_form'])->name('user.register');
    Route::post('/register', [User_Controller::class,'register']);
    Route::get('/activation/{key}',  [User_Controller::class,'activation'])->name('activation');
    Route::post('/logout', [User_Controller::class,'logout'])->name('user.logout');
});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::get('/about',[PageController::class,'about'])->name('about');




//frontend end

// admin
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

Route::get('/test/mail', function () {
    $user = \App\Models\User::find(1);

    return new App\Mail\UserRegisterMail($user);
});
