<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model {
  protected $table = 'bank';
  protected $fillable = [
    'nama', 'kode_bank', 'nomor_rekening', 'atas_nama', 'logo'
  ];
}
