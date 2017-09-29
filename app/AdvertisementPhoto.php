<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertisementPhoto extends Model
{
  protected $table = 'advertisement_photos';
  protected $fillable = ['advertisementsId','path'];
  public $timestamps = false;
}
