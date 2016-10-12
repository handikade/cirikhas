<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model {
  protected $table = 'foto';
  protected $fillable = ['url'];

  public function user() {
    return $this->belongsToMany('App\User', 'produk_foto', 'foto_id', 'user_id');
  }
}
