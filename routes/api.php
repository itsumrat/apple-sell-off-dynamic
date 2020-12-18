<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/*========================
  Front End
==========================*/

Route::post('signIn', 'Auth\LoginController@signIn');
Route::post('signUp', 'Auth\RegisterController@signUp');

// filtering part route
Route::get('main-category-menu', 'Api\HomePageController@mainCategoryMenu');
Route::get('get-size-filter', 'Api\HomePageController@getSizeFilter');
Route::get('get-processor-filter', 'Api\HomePageController@getProcessorFilter');
Route::get('get-ram-filter', 'Api\HomePageController@getRamFilter');
Route::get('get-harddrive-filter', 'Api\HomePageController@getHarddriveFilter');
Route::get('get-graphicscard-filter', 'Api\HomePageController@getGraphicscardFilter');
Route::get('get-color-filter', 'Api\HomePageController@getColorFilter');

Route::get('appleproducts', 'Api\HomePageController@appleproducts');
Route::get('audioproducts', 'Api\HomePageController@audioproducts');
Route::get('/product/{id}', 'Api\HomePageController@singleProduct');

Route::get('search-products/{search}', 'Api\HomePageController@searchProducts');


/*=====================
    Slider
=======================*/
Route::get('slider', 'Api\HomePageController@homeSlider');
Route::get('home_page_setting', 'Api\FrontEndController@home_page_setting');
Route::get('suggested_product', 'Api\FrontEndController@suggested_product');
Route::get('categories_product', 'Api\FrontEndController@categories_product');
Route::get('general_setting', 'Api\FrontEndController@general_setting');
Route::get('faqs_setting', 'Api\FrontEndController@faqs_setting');

/*===============
offer banner
=================*/
Route::get('offer', 'Api\HomePageController@offerBanner');


/*=====================
Product Category
=======================*/
Route::get('subcategory/{id}', 'Api\FrontEndController@subCategory');
Route::get('/childcategory/{id}/{mainCat}', 'Api\FrontEndController@childCategory');

Route::group(['middleware' => 'auth:api'], function () {
    // customer part
    Route::get('customer', 'Api\CustomerController@customer');
    Route::post('deliveryAddress', 'Api\CustomerController@deliveryAddress');
    Route::post('cutomerProfileUpdate', 'Api\CustomerController@cutomerProfileUpdate');
    Route::post('cutomerPasswordUpdate', 'Api\CustomerController@cutomerPasswordUpdate');

    // order part
    Route::post('orderPost', 'Api\OrderPostController@orderPost');
    Route::get('invoiceOrder', 'Api\OrderPostController@invoiceOrder');
    Route::get('invoiceOrderPdf/{id}', 'Api\OrderPostController@invoiceOrderPdf');
    Route::get('customerOrderlist', 'Api\OrderPostController@customerOrderlist');
    Route::get('viewOrderlist/{id}', 'Api\OrderPostController@viewOrderlist');
});
