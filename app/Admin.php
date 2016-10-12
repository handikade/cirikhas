<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model {
  protected $table = 'admin';
  protected $fillable = [
    'nama', 'username', 'password', 'level';
  ];

  public function konfirmasi() {
    return $this->hasMany('App\Konfirmasi', 'admin_id')
  }
}
