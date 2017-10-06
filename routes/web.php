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
Route::get('/instagram','InstagramController@create')->name('instagram');
Route::post('/instagram','InstagramController@store')->name('addInstagram');
Route::post('/instagram/{instagram}','InstagramController@update')->name('updateInstagram');

//Ads
Route::get('/ads','AdvertisementController@create')->name('ads');
Route::get('/myAds','AdvertisementController@index')->name('myAds');
Route::get('/detailAds/{advertisement}','AdvertisementController@show')->name('detailAds');
Route::post('ads','AdvertisementController@store')->name('addAds');
Route::get('deletePhotoAds/{advertisementPhoto}','AdvertisementPhotoController@destroy')->name('deletePhotoAds');
Route::get('/editAds/{advertisement}','AdvertisementController@edit')->name('editAds');
Route::post('/editAds/{advertisement}','AdvertisementController@update')->name('updateAds');
Route::get('/deleteAds/{advertisement}','AdvertisementController@destroy')->name('deleteAds');

// Survey
Route::get('/survey','SurveyController@create')->name('survey');
Route::post('/survey','SurveyController@store')->name('survey');
Route::get('surveyResult','SurveyController@index')->name('survey.result');

Route::get('/home', 'HomeController@index')->name('home');
