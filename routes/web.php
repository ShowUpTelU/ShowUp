<?php

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
})->name('index');

//Auth
Auth::routes();
Route::get('/profile','UserController@edit')->name('profile');
Route::post('/profile/{user}','UserController@update')->name('addProfile');

//Instagram
Route::resource('instagram','InstagramController');

//Ad
Route::resource('ads','AdvertisementController');
Route::get('deletePhotoAds/{advertisementPhoto}','AdvertisementPhotoController@destroy')->name('deletePhotoAds');
Route::get('adsAll','AdvertisementController@all')->name('ads.all');

//Bid
Route::resource('bid','BidController');

//Transaction
Route::get('/transaction/{id}','TransactionController@store')->name('transaction.store');

// Survey
Route::get('/survey','SurveyController@create')->name('survey');
Route::post('/survey','SurveyController@store')->name('survey');
Route::get('surveyResult','SurveyController@index')->name('survey.result');

Route::get('/home', 'HomeController@index')->name('home');
