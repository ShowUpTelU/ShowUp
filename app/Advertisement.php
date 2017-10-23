<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Bid;
use App\Transaction;
class Advertisement extends Model
{
  use SoftDeletes;
  protected $table = 'advertisements';
  protected $fillable = ['userId','title','desc','price','dueDate'];
  protected $dates = ['deleted_at'];
  public function AdsPhotos(){
    return $this->hasMany('App\AdvertisementPhoto','advertisementsId','id');
  }

  public function User(){
    return $this->belongsTo('App\User','userId','id');
  }

  public function Bids(){
    return $this->hasMany('App\Bid','advertisementId','id');
  }

  public function Bid(){
    return $this->hasOne('App\Bid','advertisementId','id');
  }

  public function checkBid($id,$adsId){
    $result = Bid::where([
      ['userId',$id],
      ['AdvertisementId',$adsId]
      ])->count();
    return $result;
  }

  public function checkTransaction($id){
    return Transaction::where('advertisementId',$id)->count();
  }

  public function Transaction(){
    return $this->hasOne('App\Transaction','advertisementId','id');
  }
}
