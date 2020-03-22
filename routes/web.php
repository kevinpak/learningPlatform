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

Route::get('/', 'MainController@home')->name('home');

Auth::routes();

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();
    
    return Redirect::to('/');
})->name('logout');


/**
 * Courses
 */
Route::get('/courses', 'CoursesController@index')->name('courses.index');
Route::get('/courses/{id}', 'CoursesController@show')->name('courses.show');
Route::get('/courses/category/{id}', 'CoursesController@category')->name('courses.category');


/**
 * Instructor Routes
 */
Route::get('/instructor/courses', 'InstructorController@index')->name('instructor.index');
Route::get('/instructor/course/{id}/manage', 'InstructorController@edit')->name('instructor.courses.edit');
Route::put('/instructor/course/{id}/save', 'InstructorController@update')->name('instructor.courses.update');
Route::get('/instructor/course/new', 'InstructorController@create')->name('instructor.courses.create');
Route::post('/instructor/course/store', 'InstructorController@store')->name('instructor.courses.store');
Route::get('/instructor/course/{id}/pricing', 'InstructorController@pricing')->name('instructor.courses.pricing');
Route::post('/instructor/course/{id}/pricing/store', 'InstructorController@pricingStore')->name('instructor.courses.pricing.store');
Route::get('/instructor/course/{id}/participants', 'InstructorController@participants')->name('instructor.courses.participants');

/**
 * Participant
 */
Route::get('/participant/courses', 'ParticipantController@courses')->name('participant.courses');


/**
 * Cart 
 */
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/clear', 'CartController@clear')->name('cart.clear');
Route::get('/cart/{course}', 'CartController@store')->name('cart.store');
Route::get('/cart/{course}/destroy', 'CartController@destroy')->name('cart.destroy');

/**
 * Wish List
 */
Route::get('/wishlist/{course}', 'WishListController@store')->name('wishlist.store');
Route::get('/wishlist/{course}/destroy', 'WishListController@destroy')->name('wishlist.destroy');
Route::get('/wishlist/{course}/switch', 'WishListController@switchToCart')->name('wishlist.switch');

/**
 * ForLater
 */
Route::get('/forLater/{course}', 'SaveForLaterController@store')->name('forLater.store');
Route::get('/forLater/{course}/destroy', 'SaveForLaterController@destroy')->name('forLater.destroy');
Route::get('/forLater/{course}/switch', 'SaveForLaterController@switchToCart')->name('forLater.switch');

/**
 * Checkout
 */
Route::get('/checkout', 'CheckoutController@paiement')->name('checkout.paiement');
Route::post('/checkout/charge', 'CheckoutController@charge')->name('checkout.charge');
Route::get('/checkout/success', 'CheckoutController@success')->name('checkout.success');