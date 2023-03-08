<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;

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
Route::group(['namespace' => 'Front'], function () {
    Route::get('/', function (){
        return redirect('admin');
    });
//    Route::get('/', 'indexController@indexShow');
//    Route::get('search/{search}', 'indexController@searchItem');
//    Route::get('search', 'indexController@getsearch');
//    Route::get('searchprice', 'indexController@searchPrice');
//    Route::get('product', 'indexController@product');
//    Route::get('product-render-{id}', 'indexController@productDetail');
//    Route::get('list-product-render-{id}', 'indexController@listProduct');
//    Route::get('blog-{id}', 'indexController@blog');
//    Route::group(['prefix' => 'cart'], function () {
//        Route::get('/', 'cartController@cartShow');
//        Route::post('/', 'cartController@addItem');
//        Route::get('delete/{id}', 'cartController@deleteItem');
//        Route::get('pay', 'cartController@pay');
//        Route::get('pay/online', 'cartController@payOnline');
//        Route::post('pay/online', 'cartController@payOnlineSuccess');
//        Route::post('pay', 'cartController@payPost');
//        Route::get('detail/{id}', 'cartController@detail');
//        Route::get('detail-star/{id}/{star}', 'cartController@detailStar');
//    });
//    // Đơn hàng đã đặt
//    Route::get('order-placed', 'cartController@orderPlaced');
//    Route::post('review', 'indexController@productReview');
//
//    // page
//    Route::get('gioi-thieu', function (){
//       return view('front.gioi_thieu');
//    });
//    Route::get('lien-he', function (){
//        return view('front.lien_he');
//    });
});

// URL admin
Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'admin', 'middleware' => 'checklogin'], function () {
//        Route::get('/', 'indexController@indexShow');
        Route::get('/', function (){
            return redirect('admin/contacts');
        });

        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', 'indexController@profileInfo');
            Route::post('/', 'indexController@profileUpdate');
        });

        Route::group(['prefix' => 'contacts'], function (){
            Route::get('/', 'ContactController@index');
            Route::get('store', 'ContactController@showStore');
            Route::post('store', 'ContactController@store');
            Route::get('edit', 'ContactController@showEdit');
            Route::post('update', 'ContactController@update');
            Route::get('delete', 'ContactController@deleteItem');
            Route::get('download', 'ContactController@downloadExcel');
        });

        Route::group(['prefix' => 'teams'], function (){
            Route::get('/', 'TeamController@index');
            Route::get('store', 'TeamController@showStore');
            Route::post('store', 'TeamController@store');
            Route::get('edit', 'TeamController@showEdit');
            Route::post('update', 'TeamController@update');
            Route::get('delete', 'TeamController@deleteItem');
        });

//        Route::group(['prefix' => 'category'], function () {
//            Route::get('/', 'categoryController@listAll');
//            Route::post('/', 'categoryController@addItem');
//            Route::get('update', 'categoryController@updateItem');
//            Route::get('delete/{id}', 'categoryController@deleteItem');
//        });
//        Route::group(['prefix' => 'product'], function () {
//            Route::get('/', 'productController@listAll');
//            Route::get('add', 'productController@addShow');
//            Route::post('add', 'productController@addItem');
//            Route::get('update/{id}', 'productController@updateShow');
//            Route::post('update/{id}', 'productController@updateItem');
//            Route::get('delete/{id}', 'productController@deleteItem');
//        });
//        Route::group(['prefix' => 'blog'], function () {
//            Route::get('/', 'blogController@listAll');
//            Route::get('add', 'blogController@addShow');
//            Route::post('add', 'blogController@addItem');
//            Route::get('update/{id}', 'blogController@updateShow');
//            Route::post('update/{id}', 'blogController@updateItem');
//            Route::get('delete/{id}', 'blogController@deleteItem');
//        });
//        Route::group(['prefix' => 'cart'], function () {
//            Route::get('/', 'cartController@listAll');
//            Route::get('delete/{id}', 'cartController@deleteItem');
//            Route::get('detail/{id}', 'cartController@detailItem');
//            Route::get('update/{id}/{status}', 'cartController@updateStatus');
//        });
//        Route::group(['prefix' => 'coupons'], function (){
//           Route::get('/', 'CouponController@index');
//           Route::post('/', 'CouponController@storeItem');
//           Route::post('update', 'CouponController@updateItem');
//           Route::get('delete/{id}', 'CouponController@deleteItem');
//        });
    });

    //-------------------------------------------
    Route::group(['prefix' => 'login', 'middleware' => 'checklogout'], function () {
        Route::get('/', 'indexController@showLogin');
        Route::post('/', 'indexController@checkLogin');
    });
    Route::get('logout', 'indexController@logout');
    Route::get('register', 'indexController@showRegister');
    Route::post('register', 'indexController@register');
});
