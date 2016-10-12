<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
  protected $fillable = [
    'nama', 'username', 'email', 'password', 'point'
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];

  public function alamat() {
    return $this->hasOne('App\Alamat', 'user_id');
  }
}
