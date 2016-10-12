<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model {
  protected $table = 'paket';
  protected $fillable = [
    'nama', 'ekspedisi_id', 'ongkos_kirim'
  ];

  public function ekspedisi() {
    return $this->belongsTo('App\Ekspedisi', 'ekspedisi_id');
  }
}
