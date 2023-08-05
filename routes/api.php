<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\userController;
use App\Http\Controllers\sellerController;
use App\Http\Controllers\reviewController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/category-list', [CategoryController::class, 'categoryList']);
Route::post('/add-category', [CategoryController::class, 'addCategory']);
Route::post('/update-category', [CategoryController::class, 'updateCategory']);
Route::delete('/delete-category', [CategoryController::class, 'deleteCategory']);

Route::get('/category/dropdown-category-list', [CategoryController::class, 'getDropDownCategoryList']);
Route::get('/category/dropdown-sub-category-list', [CategoryController::class, 'getDropDownSubCategoryList']);

Route::get('/category/sub-category-list', [CategoryController::class, 'getSubCategoryList']);
Route::post('/category/add-sub-category', [CategoryController::class, 'addSubCategory']);
Route::post('/category/update-sub-category', [CategoryController::class, 'updateSubCategory']);
Route::delete('/category/delete-sub-category', [CategoryController::class, 'deleteSubCategory']);

Route::get('/category/sub-sub-category-list', [CategoryController::class, 'getSubSubCategoryList']);
Route::post('/category/add-sub-sub-category', [CategoryController::class, 'addSubSubCategory']);
Route::post('/category/update-sub-sub-category', [CategoryController::class, 'updateSubSubCategory']);
Route::delete('/category/delete-sub-sub-category', [CategoryController::class, 'deleteSubSubCategory']);

Route::get('/accessUserAgent', [userController::class, 'ImpressionCount']);

//seller list page api

Route::post('/seller/getSellerListInfo', [sellerController::class, 'getSellerListInfo']);

//seller create
Route::post('Seller-create', [sellerController::class, 'seller_create']);


//seller detail page api

Route::get('/seller/sellerDetail/{id}', [sellerController::class, 'getSellerDetail']);

Route::get('/get-seller-list-by-location', function () {

    $post=DB::select("CALL seller_list_stored_procedure");
    dd($post);
});




// user account information api
Route::get('/user/userDetail/{id}', [userController::class, 'getUserDetail']);
Route::post('/user/userDetail/{id}', [userController::class, 'updateUserData']);

// user forgot password api
Route::post('/user/forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');

// user change password api
Route::post('/user/change-password', [ResetPasswordController::class, 'resetUserPassword']);

// mobile api

// category api
Route::get('get-category-list', [CategoryController::class, 'getCategoryList']);
Route::get('get-sub-category-list/{id?}', [CategoryController::class, 'getSubCategoryData']);
Route::get('get-sub-sub-category-list/{id?}', [CategoryController::class, 'getSubSubCategoryData']);

// offer list api
Route::get('get-offer-list',[homeController::class,'getOfferList']);


//  use auth api
Route::post('user-login',[userController::class,'userLogin']);
Route::post('user-register',[userController::class,'userRegister']);
Route::post('user-change-password/{id?}',[userController::class,'updatePasswordChange']);

Route::post('get-generate-otp',[userController::class, 'generateOtp']);
Route::post('verify-generate-otp',[userController::class, 'verifyOtp']);

Route::post('user-review-list',[userController::class,'userRegister']);

Route::get('/show-map',[sellerController::class,'showMap']);
Route::get('/send-mail',[AuthController::class,'sendMail']);

// review api
Route::post('add-review',[reviewController::class,'addReview']);
Route::get('user-review-list/{id?}',[reviewController::class,'getUserReviewList']);

Route::get('/reel/get-reel-list',[homeController::class,'getReelList']);
Route::post('/reel/create-reel',[homeController::class,'createReel']);

