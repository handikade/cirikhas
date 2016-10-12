<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model {
    protected $table = 'alamat';
    protected $fillable = [
      'user_id', 'alamat', 'nama_penerima', 'hp_penerima'
    ];

    public function user() {
      return $this->belongsTo('App\User', 'user_id');
    }

    public function pembelian() {
      return $this->hasOne('App/Pembelian', 'alamat_id');
    }
}
