<?php

use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\HomepageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AdsController;
use App\Http\Controllers\Backend\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for yo  ur application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




//WEBSITE ROUTES( FRONTEND )

//Homepage

Route::get('/',[HomepageController::class,'homepage'])->name('home.page');


//Login-Registration

Route::get('/login/form',[UserController::class,'loginForm'])->name('login.form');
Route::post('/login/user',[UserController::class,'userValidate'])->name('user.login');
Route::get('/registration/form',[UserController::class,'registrationForm'])->name('registration.form');
Route::post('/create/account',[UserController::class,"createUserFrontend"])->name('user.create.frontend');


Route::group(['middleware'=>'user-auth'],function (){


//USER DASHBOARD
//dashboard Main
Route::get('/dashboard',[UserController::class,'userDashboard'])->name('user.dashboard');


//View ADS

Route::get('/view/ads',[AdsController::class,"viewAdsCategoryDashboard"])->name('view.ads.category.dashboard');

//Category-wise Ads
Route::get('/view/ads/surf/{id}',[AdsController::class,'surfAdsView'])->name('surf.ads.view');


Route::get('/advertise/ads',[AdsController::class,'advertisesAds'])->name('advertise.ads');
Route::post('/advertise/ads/create',[AdsController::class,'advertisesAdsPost'])->name('advertise.ads.post');
Route::get('/post/ads',[AdsController::class,'postAdsDashboard'])->name('post.ads.dashboard');


//Withdraw
Route::get('/balance/deposit',[PaymentController::class,'balanceDepositForm'])->name('balance.deposit.form');
Route::post('/balance/deposit/success',[PaymentController::class,'balanceDepositSuccess'])->name('balance.deposit.success');
    Route::get('/deposit/balance/message',[PaymentController::class,'depositBalanceMessage'])->name('deposit.balance.message');


//dashboard Login

Route::get('/user/logout',[UserController::class,'userLogout'])->name('user.logout');

});







//ADMIN PANEL ROUTES ( BACKEND )

Route::group(['prefix'=>'back'],function (){



    Route::get('/login/form',[AdminController::class,'adminLogin'])->name('login.view');
    Route::post('login/admin',[AdminController::class,'adminValidate'])->name('admin.login');

Route::group(['middleware'=>'auth'],function (){

//dashboard
Route::get('/',[DashboardController::class,'viewDashboard'])->name('dashboard');

//Admin
Route::get('/admin/view',[AdminController::class,'viewAdmin'])->name('admin.view');
Route::get('/admin/create/form',[AdminController::class,'viewAdminForm'])->name('admin.form');
Route::post('/admin/create',[AdminController::class,'createAdmin'])->name('admin.create');
Route::get('/admin/delete/{id}',[AdminController::class,'deleteAdmin'])->name('admin.delete');
Route::get('/admin/update/form/{id}',[AdminController::class,'adminUpdateForm'])->name('admin.update.form');
Route::put('/admin/update/post/{id}',[AdminController::class,'adminUpdatePost'])->name('admin.update.post');

//Category
Route::get('/category',[CategoryController::class,'viewCategory'])->name('category.name');
Route::post("/category/create",[CategoryController::class,'createCategory'])->name('category.create');
Route::get('/category/delete/{id}',[CategoryController::class,'categoryDelete'])->name('category.delete');
Route::get('/category/update/{id}',[CategoryController::class,'categoryUpdateForm'])->name('category.update');
Route::put('/category/update/post/{id}',[CategoryController::class,'categoryUpdatePost'])->name('category.update.post');


//Users
Route::get('/user',[UserController::class,'viewUsers'])->name('user.view');
Route::get('/user/createPage',[UserController::class,'viewCreate'])->name('user.create.view');
Route::post('/user/create',[UserController::class,'createUser'])->name('user.create');
Route::get('/user/delete/{id}',[UserController::class,'userDelete'])->name('user.delete');
Route::get('/user/update/form/{id}',[UserController::class,'userUpdateForm'])->name('user.update.form');
Route::put('/user/update/post/{id}',[UserController::class,'userUpdate'])->name('user.update');


//Ads
Route::get('/ads',[AdsController::class,'viewAds'])->name('ads.view');
Route::get('/ads/create',[AdsController::class,'createAds'])->name('ads.form');
Route::post('/ads/create/form',[AdsController::class,'adsCreateForm'])->name('ads.create');
Route::get('ads/delete/{id}',[AdsController::class,'adsDelete'])->name('ads.delete');
Route::get('ads/post/{id}',[AdsController::class,'adsPost'])->name('ads.post');
Route::get('/ads/sort/{id}',[AdsController::class,'adsSort'])->name('ads.sort');


//Payment
    Route::get('/deposit/requests',[PaymentController::class,'depositRequests'])->name('deposit.requests');
Route::post('/deposit/balance/update',[PaymentController::class,'depositBalanceUpdate'])->name('deposit.balance.update');


//Admin Login

Route::get('logout/admin',[AdminController::class,'adminLogout'])->name('admin.logout');



});
});

