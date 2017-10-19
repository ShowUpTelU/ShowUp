<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
  use SoftDeletes;
  protected $table = 'transactions';
  protected $fillable = ['clientId','advertisementId','status','price','confirmPhoto','note'];
  public $timestamps = true;
  protected $dates = ['deleted_at'];

  public function Users(){
    return $this->belongsTo('App\User','clientId','id');
  }
}
