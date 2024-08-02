<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductCategoriesController;
use App\Http\Controllers\ProductSubcategoriesController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\TrustedpartnersController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductAttributeController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\WebuserController;
use App\Http\Controllers\SeederController;

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
})->name('welcome');

Auth::routes([
    'register' => false,
]);

//Dashboard of the Website
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

//Seeders for Credentials
Route::post('/dbseed', 'App\Http\Controllers\SeederController@dbseed')->name('dbseed');

Route::group(['middleware' => 'auth'], function () {

    //Admin Profile Navigations
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    //For Product Navigations
    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::post('/product',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
    Route::get('/product/changeStatus/{id}/{status}',[ProductController::class, 'changeStatus'])->name('product_changeStatus'); //For status toggle

    //For Product Categories
    Route::get('/productcat',[ProductCategoriesController::class,'index'])->name('productcat.index');
    Route::post('/productcat',[ProductCategoriesController::class,'store'])->name('productcat.store');
    Route::get('/productcat/edit/{id}',[ProductCategoriesController::class,'edit'])->name('productcat.edit');
    Route::post('/productcat/update/{id}',[ProductCategoriesController::class,'update'])->name('productcat.update');
    Route::get('/productcat/delete/{id}',[ProductCategoriesController::class,'delete'])->name('productcat.delete');
    Route::get('/prodcat/prodcatshow/{id}',[ProductCategoriesController::class,'prodcatshow'])->name('productcat.prodcatshow');

    //For Product Sub-Categories
    Route::get('/productsubcat',[ProductSubcategoriesController::class,'index'])->name('productsubcat.index');
    Route::post('/productsubcat',[ProductSubcategoriesController::class,'store'])->name('productsubcat.store');
    Route::get('/productsubcat/edit/{id}',[ProductSubcategoriesController::class,'edit'])->name('productsubcat.edit');
    Route::post('/productsubcat/update/{id}',[ProductSubcategoriesController::class,'update'])->name('productsubcat.update');
    Route::get('/productsubcat/delete/{id}',[ProductSubcategoriesController::class,'delete'])->name('productsubcat.delete');
    Route::get('/productsubcat/productsubcatshow/{id}',[ProductSubcategoriesController::class,'prodsubcatshow'])->name('productsubcat.prodcatshow');

    Route::group(['middleware' => ['role:Superadmin']], function () {
         //User Roles and Permissions
        Route::get('/user/permissions',[PermissionController::class,'index'])->name('permission.index');
        Route::post('/user/permissions',[PermissionController::class,'store'])->name('permission.store');
        Route::get('/user/permissions/edit/{id}',[PermissionController::class,'edit'])->name('permission.edit');
        Route::post('/user/permissions/update/{id}',[PermissionController::class,'update'])->name('permission.update');
        Route::get('/user/permissions/delete/{id}',[PermissionController::class,'delete'])->name('permission.delete');
        Route::get('/user/roles',[RoleController::class,'index'])->name('role.index');
        Route::post('/user/roles',[RoleController::class,'store'])->name('role.store');
        Route::get('/user/roles/edit/{id}',[RoleController::class,'edit'])->name('role.edit');
        Route::post('/user/roles/update/{id}',[RoleController::class,'update'])->name('role.update');
        Route::get('/user/roles/delete/{id}',[RoleController::class,'delete'])->name('role.delete');

        //Admin user Navigations
        Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
        Route::get('/users/delete/{id}',[UserController::class,'deleteUser'])->name('user.delete');
        Route::get('/users/edit/{id}',[UserController::class,'edit'])->name('users.edit');
        Route::post('/users/update/{id}',[UserController::class,'update'])->name('users.update');
    });

    //For Checkout Backend
    Route::get('checkoutb', [CheckoutController::class, 'checkoutb'])->name('checkoutb.index');
    Route::get('/checkout/edit/{id}',[CheckoutController::class,'edit'])->name('checkoutb.edit');
    Route::post('/checkout/update/{id}',[CheckoutController::class,'update'])->name('checkoutb.update');
    Route::get('/checkout/delete/{id}',[CheckoutController::class,'delete'])->name('checkoutb.delete');

    //For Banners
    Route::get('/banner',[BannerController::class,'index'])->name('banner.index');
    Route::post('/banner',[BannerController::class,'store'])->name('banner.store');
    Route::get('/banner/edit/{id}',[BannerController::class,'edit'])->name('banner.edit');
    Route::post('/banner/update/{id}',[BannerController::class,'update'])->name('banner.update');
    Route::get('/banner/delete/{id}',[BannerController::class,'delete'])->name('banner.delete');

    //For Trusted Partners
    Route::get('/trusted',[TrustedpartnersController::class,'index'])->name('trustedpartners.index');
    Route::post('/trusted',[TrustedpartnersController::class,'store'])->name('trustedpartners.store');
    Route::get('/trusted/edit/{id}',[TrustedpartnersController::class,'edit'])->name('trustedpartners.edit');
    Route::post('/trusted/update/{id}',[TrustedpartnersController::class,'update'])->name('trustedpartners.update');
    Route::get('/trusted/delete/{id}',[TrustedpartnersController::class,'delete'])->name('trustedpartners.delete');

    //For Webusers Backend
    Route::get('/webuser',[WebuserController::class,'index'])->name('webuser.index');
    Route::post('/webuser',[WebuserController::class,'store'])->name('webuser.store');
    Route::get('/webuser/edit/{id}',[WebuserController::class,'edit'])->name('webuser.edit');
    Route::post('/webuser/update/{id}',[WebuserController::class,'update'])->name('webuser.update');
    Route::get('/webuser/delete/{id}',[WebuserController::class,'delete'])->name('webuser.delete');

    //For attributes of the products
    Route::get('/productattribute',[ProductAttributeController::class,'index'])->name('attribute.index');
    Route::post('/productattribute',[ProductAttributeController::class,'store'])->name('attribute.store');
    Route::get('/productattribute/edit/{id}',[ProductAttributeController::class,'edit'])->name('attribute.edit');
    Route::post('/productattribute/update/{id}',[ProductAttributeController::class,'update'])->name('attribute.update');
    Route::get('/productattribute/delete/{id}',[ProductAttributeController::class,'delete'])->name('attribute.delete');
});

//For Frontend
Route::get('frontend/index',[FrontendController::class, 'index'])->name('frontend.index');
Route::get('frontend/about',[FrontendController::class, 'about'])->name('frontend.about');
Route::get('frontend/showcat/{name}',[FrontendController::class, 'showcat'])->name('frontend.showcat');
Route::get('frontend/showsubcat/{name}',[FrontendController::class, 'showsubcat'])->name('frontend.showsubcat');
Route::get('frontend/proddetail/{id}',[FrontendController::class, 'productdetail'])->name('frontend.productdetail');
Route::get('frontend/showallproducts',[FrontendController::class, 'showallproducts'])->name('frontend.showallproducts');

//Ajax request for attributes of size and color related to categories
Route::get('/filter-products-by-size',[FrontendController::class,'filtersize'])->name('frontend.filtersize');
Route::get('/filter-products-by-color',[FrontendController::class,'filtercolor'])->name('frontend.filtercolor');

//Ajax request for sorting products related to categories
Route::get('/sort-price-asc',[FrontendController::class,'sortasc'])->name('frontend.sortasc');
Route::get('/sort-price-desc',[FrontendController::class, 'sortdesc'])->name('frontend.sortdesc');
Route::get('/sort-latest',[FrontendController::class, 'sortlatest'])->name('frontend.sortlatest');

//Ajax request for sorting and filtering of products related to subcategory
Route::get('/filter-products-by-subsize',[FrontendController::class,'subfiltersize'])->name('frontend.subfiltersize');
Route::get('/filter-products-by-subcolor',[FrontendController::class,'subfiltercolor'])->name('frontend.subfiltercolor');
Route::get('/sort-price-subasc',[FrontendController::class,'subsortasc'])->name('frontend.subsortasc');
Route::get('/sort-price-subdesc',[FrontendController::class, 'subsortdesc'])->name('frontend.subsortdesc');
Route::get('/sort-sublatest',[FrontendController::class, 'subsortlatest'])->name('frontend.subsortlatest');

//AJAX request for sorting and filtering of all products
Route::get('/sort-price-allasc',[FrontendController::class,'allsortasc'])->name('frontend.allsortasc');
Route::get('/sort-price-alldesc',[FrontendController::class,'allsortdesc'])->name('frontend.allsortdesc');
Route::get('/sort-price-alllatest',[FrontendController::class,'allsortlatest'])->name('frontend.allsortlatest');
Route::get('/filter-products-by-allsize',[FrontendController::class,'allfiltersize'])->name('frontend.allfiltersize');
Route::get('/filter-products-by-allcolor',[FrontendController::class,'allfiltercolor'])->name('frontend.allfiltercolor');

//For Payment Gateway Integration
Route::get('/stripe/success',[StripeController::class,'success'])->name('stripe.success');
Route::get('/stripe/cancel',[StripeController::class,'cancel'])->name('stripe.cancel');

//For Webuser login and logout
Route::get('/webuserlogout', [FrontendController::class,'logout'])->name('frontend.logout');
Route::get('/webuserlogin', [FrontendController::class,'login'])->name('frontend.login');
Route::get('/webuserregister', [FrontendController::class,'register'])->name('frontend.register');
Route::post('/webusersignin', [FrontendController::class, 'signin'])->name('frontend.signin');
Route::post('/webusersignup', [FrontendController::class, 'signup'])->name('frontend.signup');

//Route Grouping for only authenticated users
Route::middleware('webuser.check')->group(function () {
    //For Cart
    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

    //Only access to checkout when cart > 0, i.e, only if cart has more than one item
    Route::middleware('cart.check')->group(function () {
        //For Checkout Frontend
        Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
        Route::post('checkout',[CheckoutController::class,'store'])->name('checkout.store');
    });
});
