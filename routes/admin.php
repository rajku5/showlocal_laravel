<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sellerController;
use App\Http\Controllers\reviewController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AuthController;


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', function (){
        return redirect()->route('admin.login');
    });

    Route::get('login', function () {return view('admin.login');})->name('login');
    Route::post('login', [AuthController::class,'adminLogin'])->name('submit-login');
    Route::post('logout', [AuthController::class,'adminLogout'])->name('logout');

    //  inner page
    Route::group(['middleware' => 'admin'],function () {
        Route::get('dashbaord', [adminController::class, 'viewDashboard'])->name('dashboard');
        //  category section
        Route::get('category', function () {return view('admin.category');})->name('category');
        Route::get('sub-category', function () {return view('admin.subCategory');})->name('subCategory');
        Route::get('sub-sub-category', function () {return view('admin.subSubCategory');})->name('subsubcategory');

        //  seller section
        Route::get('seller-list',[sellerController::class, 'getSellerList'] )->name('view.seller.list');
        Route::get('create-seller',[sellerController::class, 'viewAdminCreateSeller'])->name('view.create.seller');
        Route::get('edit-seller/{id}',[sellerController::class, 'viewAdmineditSeller'])->name('view.edit.seller');
        Route::post('edit-seller',[sellerController::class, 'editAdminSeller'])->name('edit.seller');

        Route::get('delete-seller/{id}',[sellerController::class, 'deleteAdminSeller'])->name('delete.seller');

        Route::post('create-seller',[sellerController::class, 'createAdminSeller'])->name('create.seller');

        //  review section
        Route::get('review-list',[reviewController::class, 'getReviewList'] )->name('review.list');
        Route::get('about-us',[adminController::class, 'viewAboutUsPage'] )->name('about-us');
        Route::get('terms-condition',[adminController::class, 'viewTermsConditionPage'] )->name('terms-condition');
        Route::get('privacy-policy',[adminController::class, 'viewPrivacyPolicyPage'] )->name('privacy-policy');
        Route::post('/page/{type}',[adminController::class, 'pageCreate'] )->name('page-update');

        // setting section
        Route::get('setting',[adminController::class, 'viewSettingPage'] )->name('setting');

        // news feed section
        Route::get('news-offer',[adminController::class, 'createNewsOffer'] )->name('news-offer');
        Route::post('news-offer-submit',[adminController::class, 'newsOfferSubmit'] )->name('news-offer-submit');
        // banner section
        Route::get('banner',[adminController::class, 'viewBannerPage'] )->name('banner');
        Route::get('create-banner',[adminController::class, 'createBannerPage'] )->name('create-banner');
        Route::post('create-banner-submit',[adminController::class, 'submitCreateBanner'] )->name('submit.create-banner');
        Route::get('edit-banner/{id}',[adminController::class, 'editBannerPage'] )->name('edit-banner');
        Route::post('edit-banner-submit',[adminController::class, 'submitEditBanner'] )->name('submit.edit-banner');
        Route::post('delete-banner/{id}',[adminController::class, 'deleteBanner'] )->name('delete-banner');
        //subscription section
        Route::get('subscription-list',[adminController::class, 'viewSubscriptionList'] )->name('subscription-list');
        Route::get('add-subscription', function () {return view('admin.addSubscription');})->name('add-subscription');
        Route::post('/add-subscription-data',[adminController::class, 'addSubscription'] )->name('add-subscription-data');
        Route::get('edit-subscription/{id}',[adminController::class, 'editSubscription'] )->name('edit-subscription');
        Route::post('edit-subscription-data',[adminController::class, 'editSubscriptionData'] )->name('edit-subscription-data');
        Route::post('delete-subscription',[adminController::class, 'deleteSubscription'] )->name('delete-subscription');
        Route::post('activate-subscription',[adminController::class, 'activateSubscription'] )->name('activate-subscription');
        Route::get('active-subscriber',[adminController::class, 'activeSubscribers'] )->name('active-subscriber');
    });
});
