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

Route::get('/needAuth',function(){
  return 'Youre not admin';
})->name('needAuth');

//Auth
Auth::routes();

//public Ads
Route::get('adsAll','AdvertisementController@all')->name('ads.all');
Route::get('adsDetail/{ad}','AdvertisementController@show')->name('ads.detail');

// Survey
Route::get('/survey','SurveyController@create')->name('survey');
Route::post('/survey','SurveyController@store')->name('survey');
Route::get('surveyResult','SurveyController@index')->name('survey.result');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
  Route::get('/profile','UserController@edit')->name('profile');
  Route::post('/profile/{user}','UserController@update')->name('addProfile');

  //Instagram
  Route::resource('instagram','InstagramController');

  //Ad
  Route::resource('ads','AdvertisementController');
  Route::get('deletePhotoAds/{advertisementPhoto}','AdvertisementPhotoController@destroy')->name('deletePhotoAds');

  //Bid
  Route::resource('bid','BidController');

  //Transaction
  Route::post('/transaction/','TransactionController@store')->name('transaction.store');

  Route::get('/checkout','TransactionController@checkout')->name('transaction.checkout');
  Route::get('transactionDone','TransactionController@done')->name('transaction.done');

  //Transaction Confirmation
  Route::get('confirmation/{confirmation}/detail','TransactionConfirmationController@create')->name('confirmation.create');
  Route::post('confirmation/','TransactionConfirmationController@store')->name('confirmation.store');
  Route::get('confirmationClient/{id}/{type}','TransactionConfirmationController@updateClient')->name('confirmation.updateClient');
  Route::get('confirmationDone/','TransactionConfirmationController@showDone')->name('confirmation.done');

  //Order
  Route::get('myOrder','TransactionConfirmationController@showOrder')->name('order.myOrder');
  Route::get('myOrder/accept','TransactionConfirmationController@showAccClient')->name('order.myAcc');
  Route::get('myOrder/done','TransactionConfirmationController@showDoneClient')->name('order.done');


});

Route::middleware('checkAdmin')->group(function () {
  Route::get('bidWinner','TransactionController@index')->name('transaction.index')->middleware('checkAdmin');
  Route::get('/account','UserController@index')->name('account.index');
  Route::get('/account/{user}','UserController@publicShow')->name('account.show');
  Route::get('confirmation/','TransactionConfirmationController@index')->name('confirmation.index');
  Route::get('confirmationAdmin/{id}','TransactionConfirmationController@updateAdmin')->name('confirmation.updateAdmin');
  Route::get('confirmationTask/','TransactionConfirmationController@showTask')->name('confirmation.task');
});
