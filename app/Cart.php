<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
  protected $table = 'cart';

  protected $fillable = [
    'user_id', 'stok_id',
  ];

  public function stok() {
    return $this->belongsTo('App\Stok', 'stok_id');
  }
}
