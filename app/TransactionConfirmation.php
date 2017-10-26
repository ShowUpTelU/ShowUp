<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionConfirmation extends Model
{
    use SoftDeletes;
    protected $fillable = ['transactionId','type','photo'];
    protected $dates = ['deleted_at'];

    public function Transaction(){
      return $this->belongsTo('App\Transaction','transactionId','id');
    }
}
