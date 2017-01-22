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

  public function cart() {
    return $this->hasMany('App\Cart', 'user_id');
  }

  public function alamat() {
    return $this->hasMany('App\Alamat', 'user_id');
  }
}
