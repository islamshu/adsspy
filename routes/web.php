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

Route::get('/', 'HomeController@frontend');
Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
Route::post('paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));
Route::post('user-register','UserController@register')->name('user-register');
Route::get('chose_payment','UserController@chose_payment')->name('chose_payment');
Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>'auth'], function() {
    Route::get('/',function(){
        return view('dashboard.index');
    })->name('index.dashboard');
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('general', 'GeneralController');
    Route::get('social', 'GeneralController@social');
    Route::resource('first_section', 'FirstController');
    Route::resource('video_section', 'VideoController');
    Route::resource('about_section', 'AboutController');
    Route::resource('product', 'ProductController');
    Route::resource('price', 'PriceController');
    Route::resource('blog', 'BlogController');
    Route::get('contact_section','ContactController@index')->name('contact_section.index');
    Route::post('contact_section','ContactController@store')->name('contact_section.store');

    
    
    Route::get('update_product_status', 'ProductController@update_status')->name('product.update.status');
    Route::get('update_price_status', 'PriceController@update_status')->name('price.update.status');
    Route::get('update_blog_status', 'BlogController@update_status')->name('blog.update.status');
    Route::get('post_special_status', 'PostController@post_special_status')->name('post.update.special');

    
    Route::resource('posts','PostController');

    
    
    
    Route::get('social', 'GeneralController@social');
    });

Route::get('/home', 'HomeController@index')->name('home');
Route::get('export', 'UploadController@export')->name('export');
Route::get('importExportView', 'UploadController@importExportView');
Route::post('import', 'UploadController@import')->name('import');

Route::post('test_form','HomeController@test_form')->name('test_form');

Route::get('posts','HomeController@index')->name('post_index');
Route::get('blogs','HomeController@blogs')->name('blogs.front');

// Route::get('index2','HomeController@index2')->name('post_index2');

Route::get('fillter_serach','HomeController@fillter_serach')->name('fillter_serach');
Route::get('blog/{slug}','HomeController@blog')->name('blog.single');
Route::post('search_form','HomeController@search_form')->name('search_form');

Route::get('dawnload-resoures/{post_id}','HomeController@downaload')->name('dawnload.post');


