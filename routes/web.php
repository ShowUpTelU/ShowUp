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
Route::get('adsAll','AdvertisementController@all')->name('ads.all');

Route::middleware('auth')->group(function () {
  Route::get('/profile','UserController@edit')->name('profile');
  Route::post('/profile/{user}','UserController@update')->name('addProfile');
  Route::get('/account','UserController@index')->name('account.index');
  Route::get('/account/{user}','UserController@publicShow')->name('account.show');
  //Instagram
  Route::resource('instagram','InstagramController');

  //Ad
  Route::resource('ads','AdvertisementController');
  Route::get('deletePhotoAds/{advertisementPhoto}','AdvertisementPhotoController@destroy')->name('deletePhotoAds');
  Route::get('adsDetail/{ad}','AdvertisementController@show')->name('ads.detail');

  //Bid
  Route::resource('bid','BidController');

  //Transaction
  Route::post('/transaction/','TransactionController@store')->name('transaction.store');
  Route::get('bidWinner','TransactionController@index')->name('transaction.index');
  Route::get('/checkout','TransactionController@checkout')->name('transaction.checkout');
  Route::get('transactionDone','TransactionController@done')->name('transaction.done');

  //Transaction Confirmation
  Route::get('confirmation/{confirmation}/detail','TransactionConfirmationController@create')->name('confirmation.create');
  Route::post('confirmation/','TransactionConfirmationController@store')->name('confirmation.store');
  Route::get('confirmation/','TransactionConfirmationController@index')->name('confirmation.index');
  Route::get('confirmationAdmin/{id}','TransactionConfirmationController@updateAdmin')->name('confirmation.updateAdmin');
  Route::get('confirmationClient/{id}/{type}','TransactionConfirmationController@updateClient')->name('confirmation.updateClient');
  Route::get('confirmationTask/','TransactionConfirmationController@showTask')->name('confirmation.task');
  Route::get('confirmationDone/','TransactionConfirmationController@showDone')->name('confirmation.done');

  //Order
  Route::get('myOrder','TransactionConfirmationController@showOrder')->name('order.myOrder');
  Route::get('myOrder/accept','TransactionConfirmationController@showAccClient')->name('order.myAcc');
  Route::get('myOrder/done','TransactionConfirmationController@showDoneClient')->name('order.done');

  // Survey
  Route::get('/survey','SurveyController@create')->name('survey');
  Route::post('/survey','SurveyController@store')->name('survey');
  Route::get('surveyResult','SurveyController@index')->name('survey.result');

  Route::get('/home', 'HomeController@index')->name('home');

});
