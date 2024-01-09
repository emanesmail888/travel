<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CheckoutController;

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->withoutMiddleware(['auth']);

Route::post('addToWishList', 'App\Http\Controllers\HomeController@wishList')->name('addToWishList');


Route::get('/wishlist', 'App\Http\Controllers\HomeController@View_wishList');

Route::get('/removeWishList/{id}', 'App\Http\Controllers\HomeController@removeWishList');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],
function(){

Route::get('/', function () {
    return view('admin.index');
})->name('admin.index');
//Route::get('/users', 'App\Http\Controllers\UserController@index');

Route::resource('trip','App\Http\Controllers\TripsController');
Route::resource('category','App\Http\Controllers\CategoriesController');
Route::resource('city','App\Http\Controllers\CityController');
// Route::resource('subCategory','SubCategoryController');
// Route::POST('/admin/store', 'AdminController@store');
// Route::get('/admin', 'AdminController@index');
Route::get('TripEditForm/{id}', 'App\Http\Controllers\TripsController@TripEditForm')->name('TripEditForm');

Route::post('/multiuploads', 'App\Http\Controllers\TripsController@uploadSubmit');

Route::post('/editTrips/{id}', 'App\Http\Controllers\TripsController@editTrips')->name('editTrips');
Route::get('/editTrips/{id}', 'App\Http\Controllers\TripsController@editTrips')->name('editTrips');



Route::get('EditImage/{id}', 'App\Http\Controllers\TripsController@ImageEditForm')->name('ImageEditForm');
Route::post('editProImage', 'App\Http\Controllers\TripsController@editTripImage')->name('editTripImage');




});



//  Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact us');

Route::get('/trip_details/{id}', 'App\Http\Controllers\HomeController@trip_details');
Route::get('allTrips/{id}', 'App\Http\Controllers\HomeController@show');
Route::get('allTripTypes/{name}', 'App\Http\Controllers\HomeController@allTripTypes');

Route::get('/cart', 'App\Http\Controllers\CartController@index');


Route::put('/cart/update/{id}', 'App\Http\Controllers\CartController@update');

Route::get('cart/addItem/{id}', 'App\Http\Controllers\CartController@addItem');
Route::get('/cart/remove/{id}','App\Http\Controllers\CartController@destroy');
Route::post('search', ['as' => 'search', 'uses' => 'App\Http\Controllers\TripsController@search']);

Route::get('logout','App\Http\Controllers\Auth\LoginController@logout');
Route::post('paypal/payment', [App\Http\Controllers\PaymentController::class, 'payment'])->name('paypal');
Route::get('paypal/success', [App\Http\Controllers\CheckoutController::class, 'success'])->name('paypal_success');
Route::get('paypal/cancel', [App\Http\Controllers\CheckoutController::class, 'cancel'])->name('paypal_cancel');

Route::group(['middleware' => 'auth'], function() {
// Route::get('cart/pay-with-paypal', 'App\Http\Controllers\CheckoutController@formValidate');
// Route::get('cart/paypal-success', 'App\Http\Controllers\CheckoutController@paypalSuccess')->name('paypal-success');
// Route::get('cart/paypal-cancel', 'App\Http\Controllers\CheckoutController@paypalCancel')->name('paypal-cancel');

Route::get('/checkout', 'App\Http\Controllers\CheckoutController@index');
Route::post('/formvalidate', 'App\Http\Controllers\CheckoutController@formValidate');
Route::get('/orders', 'App\Http\Controllers\ProfileController@orders');
Route::get('/address', 'App\Http\Controllers\ProfileController@Address');
// Route::post('/address', 'ProfileController@address');

Route::get('/password', 'App\Http\Controllers\ProfileController@password');

Route::post('/updatePassword', 'App\Http\Controllers\ProfileController@updatePassword');
Route::post('/updateAddress', 'App\Http\Controllers\ProfileController@updateAddress');

Route::get('EditProfileImage/{id}', 'App\Http\Controllers\ProfileController@ImageProfileForm')->name('ImageProfileForm');
Route::post('editProfileImage', 'App\Http\Controllers\ProfileController@editProfileImage')->name('editProfileImage');

Route::get('/profile', function() {
    return view('profile.index');
});

    Route::get('/profile.thankyou', function() {
    return view('profile.thankyou');
});

});
























