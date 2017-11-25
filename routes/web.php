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
})->name('welcome');
//PUBLIC
Auth::routes();
//Ads
Route::resource('/advertisement','AdvertisementController');
Route::get('notAdmin','HomeController@notAdmin')->name('notAdmin');
// Survey
Route::get('/survey','SurveyController@create')->name('survey');
Route::post('/survey','SurveyController@store')->name('survey');
Route::get('surveyResult','SurveyController@index')->name('survey.result');

Route::group(['middleware' => ['auth']], function () {
  //User
  Route::get('/profile','UserController@edit')->name('user.edit');
  Route::post('/profile','UserController@update')->name('user.update');
  //Ads
  Route::get('myAdvertisement','AdvertisementController@myAds')->name('advertisement.mine');
  //Ads Photos
  Route::get('/adsPhoto/delete/{id}','AdvertisementPhotoController@destroy')->name('adsPhoto.destroy');
  //Bid
  Route::post('bid','BidController@store')->name('bid.store');
  Route::get('bid/waiting','BidController@waiting')->name('bid.waiting');
  Route::get('bid/confirmation','BidController@confirmation')->name('bid.confirmation');
  Route::get('bid/ongoing','BidController@ongoing')->name('bid.ongoing');
  Route::get('bid/done','BidController@done')->name('bid.done');
  Route::put('bid/setDone/{bid}','BidController@setDone')->name('bid.setDone');

  //Transaction
  Route::resource('/transaction','TransactionController');
  Route::get('transaction/self/show','TransactionController@selfShow')->name('transaction.self.show');
  Route::get('transaction/self/done','TransactionController@selfDone')->name('transaction.self.done');

  Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['middleware' => ['admin']], function () {
  Route::get('admin','HomeController@admin')->name('home.admin');
  //User
  Route::get('list/users','UserController@index')->name('user.index');
  //Advertisement
  Route::get('list/advertisement','AdminController@advertisement')->name('admin.advertisement');
  Route::get('list/advertisement/{advertisement}','AdminController@advertisementShow')->name('admin.advertisementShow');
  //Bid
  Route::get('list/bid/ongoing','AdminController@bidOngoing')->name('admin.bidOngoing');
  Route::get('list/bid/done','AdminController@bidDone')->name('admin.bidDone');
  Route::get('list/bid/paid','AdminController@bidPaid')->name('admin.bidPaid');
  Route::put('list/bid/pay/{bid}','AdminController@bidPay')->name('admin.bidPay');
  //Transaction
  Route::get('list/transaction/unpaid','AdminController@transactionUnpaid')->name('admin.transactionUnpaid');
  Route::get('list/transaction/confirmation','AdminController@transactionConfirmation')->name('admin.transactionConfirmation');
  Route::get('list/transaction/paid','AdminController@transactionPaid')->name('admin.transactionPaid');
  Route::post('list/transaction/paid','AdminController@transactionPaidUpdate')->name('admin.transaction.paid');
});
