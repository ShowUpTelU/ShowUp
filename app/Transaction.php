<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
  use SoftDeletes;
  protected $table = 'transactions';
  protected $fillable = ['bidId','advertisementId'];
  public $timestamps = true;
  protected $dates = ['deleted_at'];

  public function Bid(){
    return $this->belongsTo('App\Bid','bidId','id');
  }

  public function Ads(){
    return $this->belongsTo('App\Advertisement','advertisementId','id');
  }


}
