<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Bid;
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
    return $this->hasMany('App\Bid','id');
  }

  public function checkBid($id){
    $result = Bid::where('userId',$id)->first();
    if($result){
      return true;
    }else {
      return false;
    }
  }
}
