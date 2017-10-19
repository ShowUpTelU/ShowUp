<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
  use SoftDeletes;
  protected $table = 'transactions';
  protected $fillable = ['clientId','businessId','status','price','confirmPhoto','note'];
  public $timestamps = true;
  protected $dates = ['deleted_at'];
}
