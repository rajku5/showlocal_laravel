<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\sellerController;
use App\Http\Controllers\reviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\userController;
use App\Http\Controllers\RazorpayPaymentController;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/',[homeController::class, 'viewHome'])->name('home');
Route::get('faq',[homeController::class, 'viewFaq'])->name('faq');
Route::get('termsCondition',[homeController::class, 'viewTermsCondition'])->name('TermsCondition');
Route::get('privacy-policy',[homeController::class, 'viewPrivacyPolicy'])->name('PrivacyPolicy');
Route::get('about-us',[homeController::class, 'viewAboutus'])->name('AboutUs');
Route::get('category',[homeController::class, 'viewCategory'])->name('Category');
Route::get('contact-us',[homeController::class, 'viewContactus'])->name('ContactUs');
Route::get('seller-registration',[homeController::class, 'viewSellerRegistration'])->name('SellerRegistration');
Route::post('seller-registration-data',[homeController::class, 'addSellerRegistration'])->name('SellerRegistrationData');


Route::group(['middleware' => 'user'],function () {
    Route::get('/category/{id}',[CategoryController::class, 'ViewSubCategory'])->name('view.subCategory');
    Route::get('/seller-list/{id}',[sellerController::class, 'viewSellerList'])->name('view.seller.list');
    Route::get('/seller-detail/{id}',[sellerController::class, 'viewSellerDetail'])->name('view.seller.detail');
    Route::post('/seller-registration',[sellerController::class, 'viewSellerDetail'])->name('seller.registration');
    Route::post('add-review',[homeController::class,'AddReview'])->name('add-review');
    Route::post('setpincode',[homeController::class, 'setPincode'])->name('user.pincode');
    Route::post('search',[homeController::class, 'getSearch'])->name('user.search');
    Route::get('/user-change-password',[userController::class,'changeUserPassword'])->name('user.change.password');
    Route::post('/user-password-reset',[userController::class,'changeUserPasswordSubmit'])->name('user.password.submit');
    Route::post('/update-wishlist',[userController::class, 'updateWishlist'])->name('user.updateWishlist');
    Route::get('/user-wishlist',[userController::class, 'viewWishlist'])->name('view.user.wishlist');
});
Route::post('register',[AuthController::class,'Register'])->name('user.register');
Route::post('login',[AuthController::class,'Login'])->name('user.login');
Route::get('logout',[AuthController::class,'Logout'])->name('user.logout');
Route::get('/user-account-information',[userController::class,'viewAccountInformation'])->name('view.user.accountinfo');
Route::post('/user-update-information',[userController::class,'updateAccountInformation'])->name('update.user.accountinfo');

Route::get('/admin/login', function () {return view('admin.login');})->name('admin.login');

Route::get('affiliateProgram',[homeController::class, 'viewAffiliateProgram'])->name('AffiliateProgram');
Route::post('affiliateProgramSubmit',[homeController::class,'affiliateProgramSubmit'])->name('AffiliateProgramSubmit');

Route::prefix('seller')->group(function () {
Route::group(['middleware' => 'seller'],function () {
    Route::get('dashboard', [sellerController::class, 'viewDashboard'])->name('dashboard');
    Route::get('qr-code',[sellerController::class,'qrcode'])->name('add-qr-code');
    Route::get('profile',[sellerController::class,'sellerProfile'])->name('seller-profile');
    Route::post('profile-update',[sellerController::class,'updateProfile'])->name('update.seller.profile');
    Route::post('generate-coupon-code',[sellerController::class,'generateCouponCode'])->name('generate.coupon.code');
    Route::get('view-subscriptions', [sellerController::class,'viewSubscription'])->name('seller.view-subscription');
    Route::post('purchase-subscription',[sellerController::class,'purchaseSubscription'])->name('purchase-subscription');
    Route::get('razorpay-payment/{price}', [RazorpayPaymentController::class, 'index']);
    Route::post('razorpay-payment/{plan_id}', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
});
});
Route::get('/seller/login', function () {return view('seller.login');})->name('seller.login');
Route::post('seller/login-submit', [sellerController::class,'sellerLoginSubmit'])->name('seller.submit-login');
Route::get('/coupon-code/{id}', [sellerController::class,'viewCouponCode'])->name('seller.view-coupon-code');


Route::get('/seller/forgot-password', [sellerController::class, 'viewForgotPassword'])->name('seller.forgotPassword');
Route::get('/seller/reset-password', function () {return view('seller.resetPassword');})->name('seller.resetPassword');
Route::post('seller/logout', [sellerController::class,'sellerLogout'])->name('seller.logout');


//Route::get('/seller-detail/{id}',[sellerController::class, 'viewSellerDetail'])->name('sellerDetail');

Route::get('/admin/login', function () {return view('admin.login');})->name('admin.login');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
