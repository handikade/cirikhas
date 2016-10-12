<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ekspedisi extends Model {
  protected $table = 'ekspedisi';
  protected $fillable = [
    'nama', 'logo'
  ];

  public function paket() {
    return $this->hasMany('App\Paket', 'ekspedisi_id');
  }
}
