<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable {
  protected $table = 'admin';
  protected $fillable = [
    'nama', 'username', 'level',
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];

  public function setNamaAttribute($nama) {
    $this->attributes['nama'] = strtolower($nama);
  }

  public function getNamaAttribute($nama) {
    return ucwords($nama);
  }

  public function konfirmasi() {
    return $this->hasMany('App\Konfirmasi', 'admin_id');
  }
}
