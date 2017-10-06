<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
  protected $table = 'advertisements';
  protected $fillable = ['userId','title','desc','price'];

  public function AdsPhotos(){
    return $this->hasMany('App\AdvertisementPhoto','advertisementsId','id');
  }
}
