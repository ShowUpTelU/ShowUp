<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
  protected $table = 'transactions';
  protected $fillable = ['clientId','businessId','status','price'];
  public $timestamps = true;
}
