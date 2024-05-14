<?php

use App\Company;
use App\CustomersOrders;
use App\User;
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

//Route::get('/', function () {
//    return view('welcome'));
//});

//home page
Route::get('/','Client\ClientController@index')->name('client.home');
//get category page
Route::get('/{slag}/cat','Client\ClientController@category_page')->name('client.category');
//get subcategory page
Route::get('/{slag}/sub','Client\ClientController@subCategory_page')->name('client.subCategory');
//get single product page
Route::get('/{slag}/prot','Client\ClientController@single_product_page')->name('client.product');
//get product color
Route::get('/product-color/{color}','ProductColorController@ajaxShow')->name('product.color');
//get product color
Route::get('/product-size/{size}','ProductSizeController@ajaxShow')->name('product.size');
//add to cart
Route::get('/add-to-cart','Client\ClientController@cart_page')->name('client.add-to-cart');
Route::get('/add-to-cart/{rowId}','AddToCartController@destroy')->name('addToCart.delete');
Route::post('/add-to-cart','AddToCartController@addToCart')->name('addToCart.store');
Route::post('/cart-update/{rowId}','AddToCartController@update')->name('cart.update');
//checkout
Route::get('/checkout','Client\ClientController@checkout_page')->name('client.checkout');
//show payment info
Route::get('/payment-info/{payment}','Client\ClientController@payment_info')->name('client.payment-info');
//review
Route::post('/review/{product}','ReviewController@store')->name('review.store');
//adout us
Route::get('/about-us','Client\ClientController@aboutUs')->name('client.about-us');
//contact us
Route::get('/for-contact','Client\ClientController@contactUs')->name('client.contact-us');
//location
Route::get('/show-location','Client\ClientController@navigationLocation')->name('client.navigation');
//place order
Route::post('/customers-order','CustomersOrdersController@storeOrder')->name('client.order');
//send order notification email
Route::get('/new-order/{orderNo}','MailController@sendOrderNotification')->name('mail.order-notification');
//invoice
Route::get('/invoice/{orderNo}','Client\ClientController@invoice')->name('client.invoice');
//autocomplete search bar
Route::get('/autocomplete-search','Client\ClientController@autocompleteSearch')->name('client.autocomplete-search');
//search product
Route::get('/search','Client\ClientController@searchProduct')->name('client.search-product');
//price filter
Route::get('/min-max-price','Client\ClientController@getMinMaxPrice')->name('client.min-max-price');
Route::get('/filter','Client\ClientController@getFilteredProduct')->name('client.product-filter');
//subscribe by email
Route::post('subscribe','SubscribeByEmailController@subscribe')->name('client.subscribe');
// ads.txr
Route::get('/ads.txt',function (){
    return view('ads-txt');
});

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin','verified']],function (){
    Route::get('/dashboard','Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/dash-category','Admin\AdminController@product_category')->name('admin.category');
    Route::get('/dash-store-product','Admin\AdminController@store_product')->name('admin.store-product');
    Route::get('/dash-all-product','Admin\AdminController@all_products')->name('admin.all-product');
    Route::get('/dash-main-slider','Admin\AdminController@main_slider')->name('admin.main-slider');
    Route::get('/dash-menu-slider','Admin\AdminController@menu_slider')->name('admin.menu-slider');
    Route::get('/dash-text-slider','Admin\AdminController@text_slider')->name('admin.text-slider');
    Route::get('/destroy-text-slider/{textSlider}','TextSliderController@destroy')->name('admin.textSlider-destroy');
    Route::get('/contact-info','Admin\AdminController@contact_info')->name('admin.contact-info');
    Route::get('/navigation','Admin\AdminController@navigation')->name('admin.navigation');
    Route::get('/social-share','Admin\AdminController@setSocialShare')->name('admin.social-share');
    Route::get('/show-map-location','GeolocationController@showLocation')->name('admin.show-map-location');
    Route::get('/setting','Admin\AdminController@setting')->name('admin.setting');
    Route::get('/selected-country','Admin\AdminController@viewSeletedCountry')->name('admin.selected-country');
    Route::get('/selected-payment','Admin\AdminController@viewSeletedPayment')->name('admin.selected-payment');
    Route::get('/all-new-orders','Admin\AdminController@newOrders')->name('admin.new-order');
    Route::get('/all-orders','Admin\AdminController@allOrders')->name('admin.all-order');
    Route::get('/ad','Admin\AdminController@advertisement')->name('admin.ad');
    Route::get('/subscribe','Admin\AdminController@subscribe')->name('admin.subscribe');

    Route::resource('/category','CategoryController', [
        'only' => ['store', 'edit', 'update']
    ]);
    Route::resource('/subCategory','SubCategoryController', [
        'only' => ['store', 'edit', 'update']
    ]);
    Route::resource('/product','ProductController', [
        'only' => ['store', 'show','edit', 'update', 'destroy']
    ]);
    Route::resource('/mainBannerScroll','MainBannerScrollController', [
        'only' => ['store', 'update']
    ]);
    Route::resource('/menuSlider','MenuSliderController', [
        'only' => ['store', 'update']
    ]);
    Route::resource('/textSlider','TextSliderController', [
        'only' => ['store', 'update']
    ]);
    Route::resource('/viewOrder','OrderActionController', [
        'only' => ['edit', 'update', 'destroy']
    ]);

    Route::post('destroy-category/{category}','CategoryController@destroy')->name('category.destroy');
    Route::post('update-category-index','CategoryController@update_category_index')->name('update.category-index');
    Route::post('destroy-subcategory/{subCategory}','SubCategoryController@destroy')->name('subcategory.destroy');
    Route::post('update-subcategory-index','SubCategoryController@update_subcategory_index')->name('update.subcategory-index');
    Route::post('/store-in-logo','GalleryController@store_logo')->name('store.logo');
    Route::post('/modify-contact','ContactInfoController@modifyContact')->name('admin.modify-contact');
    Route::post('/modify-customer-support','CustomerSupportController@modifyCustomerSupport')->name('admin.modify-customer-support');
    Route::post('/add-social-share','SocialShareLinksController@socialShareLinks')->name('admin.add-social-share');
    Route::post('/add-location','GeolocationController@setGeolocation')->name('admin.location');
    Route::post('/company-name','CompanyController@setCompanyInfo')->name('admin.company');
    Route::post('/add-about','AboutCompanyController@about')->name('admin.about');
    Route::put('/user-update/{user}','UserController@userEmailUpdate')->name('admin.user-update');
    Route::post('/country-select','CompanyController@countrySelect')->name('admin.country-select');
    Route::post('/payment-select','CompanyController@paymentSelect')->name('admin.payment-select');
    Route::post('/payment-update/{payment}','CompanyController@paymentUpdate')->name('admin.payment-update');
    Route::post('/update-status/{orderNo}','OrderActionController@updateStatus')->name('admin.order-status');
    Route::post('/set-ad','AdvertisementController@setAdvertisement')->name('admin.setAd');
});
