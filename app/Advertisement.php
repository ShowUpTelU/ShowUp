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
  protected $fillable = ['userId','title','desc','price'];
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

  public function checkBid($id,$adsId){
    $result = Bid::where([
      ['userId',$id],
      ['AdvertisementId',$adsId]
      ])->count();
    return $result;
    // if(isset($result)){
    //   return 10;
    // }else {
    //   return 5;
    // }
  }

  public function checkTransaction($id){
    return Transaction::where('advertisementId',$id)->count();
  }
}
