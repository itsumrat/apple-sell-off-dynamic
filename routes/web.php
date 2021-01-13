<?php

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

// Route::get('/', function () {
//     return view('frontend.home');
// });
Route::prefix('api')->group(function () {
    //Customer Login
    Route::post('/register', 'Customer\CustomerController@register');
    Route::post('/login', 'Customer\CustomerController@login');
    Route::post('/update_profile', 'Customer\CustomerController@update_profile');
    Route::get('/user_info', 'Customer\CustomerController@user_info');
    Route::get('/logout', 'Customer\CustomerController@logout');
    Route::post('/add_to_cart', 'Api\FrontEndController@add_to_cart');
    Route::get('/cart_list', 'Api\FrontEndController@cart_list');
    Route::get('/remove_cart_item/{id}', 'Api\FrontEndController@remove_cart_item');
    Route::get('/increase_quantity/{id}/{type}', 'Api\FrontEndController@increase_quantity');

    Route::get('/customer_address', 'Customer\CustomerController@customer_address');
    Route::post('/customer_address_store', 'Customer\CustomerController@customer_address_store');
    Route::get('/address', 'Customer\CustomerController@address');
    Route::post('/confirm_order', 'Customer\CustomerController@confirm_order');
    Route::get('/invoice/{id}', 'Customer\CustomerController@invoice');
});

Route::get('admin', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('vendor', 'Auth\LoginController@vedorLoginForm')->name('vedor.login');
Route::post('postLogin', 'Auth\LoginController@login')->name('postLogin');

// Auth::routes(['verify' => false]);
Auth::routes(['login' => false, 'register' => false, 'verify' => false]);
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', 'WebController\Backend\RoleController');
    Route::resource('permissions', 'WebController\Backend\PermissionController');
    // user part
    Route::resource('users', 'WebController\Backend\UserController');
    Route::get('customers', 'WebController\Backend\UserController@customer')->name('customer');
    Route::get('vendors', 'WebController\Backend\UserController@vendor')->name('vendor');
    Route::get('staff/{id}', 'WebController\Backend\UserController@staff')->name('staff');
    Route::post('updateStatus', 'WebController\Backend\UserController@updateStatus')->name('updateStatus');

    // product part
    Route::resource('maincategory', 'WebController\Backend\MainCategoryController');
    Route::resource('producttypes', 'WebController\Backend\ProductTypeController');
    Route::resource('subcategory', 'WebController\Backend\SubCategoryController');
    Route::resource('childcategory', 'WebController\Backend\ChildCategoryController');
    Route::get('getSubcategory/{id}', 'WebController\Backend\ChildCategoryController@getSubcategory');
    Route::get('getChildcategory/{id}', 'WebController\Backend\ProductController@getChildCategoy');
    Route::resource('brands', 'WebController\Backend\BrandController');
    Route::resource('shipping', 'WebController\Backend\ShippingController');
    Route::resource('products', 'WebController\Backend\ProductController');
    Route::get('deleteImageGallery/{proId}/{imgId}', 'WebController\Backend\ProductController@deleteImageGallery')->name('deleteImageGallery');

    Route::resource('general_setting', 'WebController\Backend\GeneralSettingController');
    Route::resource('faqs_setting', 'WebController\Backend\FaqsSettingController');
    Route::resource('faqs_category', 'WebController\Backend\FaqCategoryController');
    Route::resource('home_page_setting', 'WebController\Backend\HomePageSettingController');
    Route::resource('colors', 'WebController\Backend\ColorController');
    Route::resource('sizes', 'WebController\Backend\SizeController');
    Route::resource('rams', 'WebController\Backend\RamController');
    Route::resource('processors', 'WebController\Backend\ProcessorController');
    Route::resource('graphicscards', 'WebController\Backend\GraphicsCardController');
    Route::resource('harddrives', 'WebController\Backend\HardDriveController');

    //Slider
    Route::resource('slider', 'WebController\Backend\SliderController');
    Route::post('updateSliderStatus', 'WebController\Backend\SliderController@updateSliderStatus')->name('updateSliderStatus');
    // logo
    Route::resource('logo', 'WebController\Backend\LogoController');
    Route::post('updatelogoStatus', 'WebController\Backend\LogoController@updatelogoStatus')->name('updatelogoStatus');
    //offer Banner
    Route::resource('offerbanner', 'WebController\Backend\OfferBannerController');
    Route::post('updateOfferStatus', 'WebController\Backend\OfferBannerController@updateOfferStatus')->name('updateOfferStatus');

    // order part start
    Route::resource('orders', 'WebController\Backend\OrderController');
    Route::get('postStatus/{id}/{status}', 'WebController\Backend\OrderController@postStatus');

    // Location Route
    Route::resource('region', 'WebController\Backend\RegionController');

    // City Route
    Route::resource('city', 'WebController\Backend\CityController');
    Route::get('getCity/{id}', 'WebController\Backend\AreaController@getCity');

    // Area Route
    Route::resource('area', 'WebController\Backend\AreaController');

    Route::get('invoiceOrderPdf', 'Api\OrderPostController@invoiceOrderPdf')->name('invoiceOrderPdf');

});


Route::get('{any}', function () {
    return view('frontend.home');
})->where('any', '.*');
