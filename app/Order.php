<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
  protected $table = 'order';

  public function user() {
    return $this->belongsTo('App\User', 'user_id');
  }

  public function bank() {
    return $this->belongsTo('App\Bank', 'bank_id');
  }
}
