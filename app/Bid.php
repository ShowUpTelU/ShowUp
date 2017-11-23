<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable = ['userId','advertisementId'];

    public function User(){
      return $this->belongsTo('App\User','userId','id');
    }

    public function Advertisement(){
      return $this->belongsTo('App\Advertisement','advertisementId','id');
    }

    public function Transaction(){
      return $this->hasOne('App\Transaction','bidId','id');
    }
}
