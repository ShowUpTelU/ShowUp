<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{
  protected $table = 'instagrams';
  protected $fillable = ['userId','accountName','followers','link','active'];
  public $timestamps = false;
}
