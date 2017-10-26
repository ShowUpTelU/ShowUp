<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable = ['userId','advertisementId','note','price'];

    public function Users(){
      return $this->belongsTo('App\User','userId','id');
    }

    public function Advertisements(){
      return $this->belongsTo('App\Advertisement','AdvertisementId','id');
    }

    public function Transaction(){
      return $this->hasOne('App\Transaction','bidId','id');
    }
}
