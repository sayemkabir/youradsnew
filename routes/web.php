<?php

use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\Frontend\TicketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ApiController;
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
Route::get('/password/recovery/',[UserController::class,'passwordRecovery'])->name('password.recovery');
Route::post('/password/recovery/validate',[UserController::class,'passwordRecoveryValidate'])->name('password.recovery.validate');
Route::get('/password/recovery/form/{token}',[UserController::class,'passwordRecoveryForm'])->name('password.form');
Route::put('/password/update',[UserController::class,'passwordUpdate'])->name('password.update');
Route::get('/user/email/validate/message/{id}',[UserController::class,'userEmailValidationMessage'])->name('user.email.validation.message');




Route::group(['middleware'=>'user-auth'],function (){


    //HomePage Auth

//    Route::get('/auth',[HomepageController::class,'homepageAuth'])->name('home.page.auth');



//USER DASHBOARD
//dashboard Main
Route::get('/dashboard',[UserController::class,'userDashboard'])->name('user.dashboard');


//View ADS

Route::get('/view/ads',[AdsController::class,"viewAdsCategoryDashboard"])->name('view.ads.category.dashboard');

//Category-wise Ads
Route::get('/view/ads/surf/{id}',[AdsController::class,'surfAdsView'])->name('surf.ads.view');

//User Create Ads
Route::get('/advertise/ads',[AdsController::class,'advertisesAds'])->name('advertise.ads');
Route::post('/advertise/ads/create',[AdsController::class,'advertisesAdsPost'])->name('advertise.ads.post');
Route::get('/post/ads',[AdsController::class,'postAdsDashboard'])->name('post.ads.dashboard');
Route::get('/post-fetch/{id}',[ApiController::class,'postAdsFetch'])->name('post.ad.fetch');


//Ad Click Extend
Route::get('/ad/clicks/extend/{id}',[AdsController::class,'extendAdClicks'])->name('ad.click.extend');
Route::put('/ad/update/extend/{id}',[AdsController::class,'updateAdClicks'])->name('ad.update.extend');


//Deposit
Route::get('/balance/deposit',[PaymentController::class,'balanceDepositForm'])->name('balance.deposit.form');
Route::post('/balance/deposit/success',[PaymentController::class,'balanceDepositSuccess'])->name('balance.deposit.success');
    Route::get('/deposit/balance/message',[PaymentController::class,'depositBalanceMessage'])->name('deposit.balance.message');


//Deposit From Main Balance
Route::get('/balance/deposit/fromMain',[PaymentController::class,'depositFormMain'])->name('balance.deposit.form.main');
Route::post('/balance/deposit/credit',[PaymentController::class,'depositMainBalance'])->name('deposit.main.balance.credit');

//Deposit Categories
Route::get('balance/deposit/categories',[PaymentController::class,'depositCategory'])->name('deposit.category');

    //Withdraw
    Route::get('/balance/withdraw',[PaymentController::class,'balanceWithdraw'])->name('balance.withdraw.form');
    Route::post('/balance/withdraw/success',[PaymentController::class,'balanceWithdrawSuccess'])->name('balance.withdraw.success');
    Route::get('/balance/withdraw/message',[PaymentController::class,'balanceWithdrawMessage'])->name('balance.withdraw.message');


//dashboard Login

Route::get('/user/logout',[UserController::class,'userLogout'])->name('user.logout');

//User Profile

    Route::get('/user/profile',[UserController::class,'userProfile'])->name('user.profile');
    Route::put('/user/details/update',[UserController::class,'userUpdateFrontend'])->name('user.update.frontend');
    Route::put('/user/details/wallet/update',[UserController::class,'userWalletUpdateFrontend'])->name('user.wallet.update.frontend');
    Route::put('/user/details/photo/update',[UserController::class,'userPhotoUpdateFrontend'])->name('user.photo.update.frontend');
    Route::post('/user/email/verification/mailer',[UserController::class,'userEmailVerificationMailer'])->name('user.email.verification.mailer');


//Tickets
Route::post('/ticket/create',[TicketController::class,'userTicket'])->name('user.ticket');

});







//ADMIN PANEL ROUTES ( BACKEND )

Route::group(['prefix'=>'back'],function (){



    Route::get('/login/form',[AdminController::class,'adminLogin'])->name('login.view');
    Route::post('login/admin',[AdminController::class,'adminValidate'])->name('admin.login');
    Route::get('ads/post/{id}',[AdsController::class,'adsPost'])->name('ads.post');
    Route::get('ads/credit/{id}',[AdsController::class,'adsCredit'])->name('ads.credit');


    Route::group(['middleware'=>'auth'],function (){

//dashboard
Route::get('/',[DashboardController::class,'viewDashboard'])->name('dashboard');
//Route::get('/welcome',[DashboardController::class,'welcome'])->name('welcome');

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
Route::get('/ads/sort/{id}',[AdsController::class,'adsSort'])->name('ads.sort');


//Payment
Route::get('/deposit/requests',[PaymentController::class,'depositRequests'])->name('deposit.requests');
Route::get('/deposit/balance/update/{id}',[PaymentController::class,'depositBalanceUpdate'])->name('deposit.balance.update');
Route::get('/deposit/balance/update/deny/{id}',[PaymentController::class,'depositBalanceUpdateDeny'])->name('deposit.balance.update.deny');
Route::get('/deposit/balance/update/deny/balance/{id}',[PaymentController::class,'depositBalanceUpdateDenyBalance'])->name('deposit.balance.update.deny.balance');
//Route::get('/balance/update/ads/{id}',[PaymentController::class,'balanceUpdateAds'])->name('balance.update.ads');

Route::get('/withdraw/requests',[PaymentController::class,'withdrawRequests'])->name('withdraw.requests');
Route::get('/withdraw/balance/update/{id}',[PaymentController::class,'withdrawBalanceUpdate'])->name('withdraw.balance.update');
Route::get('/withdraw/balance/update/deny/{id}',[PaymentController::class,'withdrawBalanceUpdateDeny'])->name('withdraw.balance.update.deny');
Route::get('/withdraw/balance/update/deny/balance/{id}',[PaymentController::class,'withdrawBalanceUpdateDenyBalance'])->name('withdraw.balance.update.deny.balance');


//Admin Login

Route::get('logout/admin',[AdminController::class,'adminLogout'])->name('admin.logout');

//Report Generate

Route::get('/report/withdraw',[PaymentController::class,'reportWithdraw'])->name('report.withdraw');
Route::get('/report/deposit',[PaymentController::class,'reportDeposit'])->name('report.deposit');

//Ticket
Route::get('/tickets',[TicketController::class,'ticketView'])->name('ticket.view');
Route::get('/ticket/delete/{id}',[TicketController::class,'ticketDelete'])->name('ticket.delete');


});
});

// now()->format('Y-m-d h:i:s')
