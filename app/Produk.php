<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model {
  protected $table = 'produk';
  protected $fillable = [
    'nama', 'deskripsi', 'bahan', 'perawatan', 'diskon', 'harga', 'brand_id'
  ];

  public function setNamaAttribute($nama) {
    $this->attributes['nama'] = strtolower($nama);
  }

  public function getNamaAttribute($nama) {
    return ucwords($nama);
  }

  public function setDeskripsiAttribute($deskripsi) {
    $this->attributes['deskripsi'] = strtolower($deskripsi);
  }

  public function getDeskripsiAttribute($deskripsi) {
    return ucfirst($deskripsi);
  }

  public function setBahanAttribute($bahan) {
    $this->attributes['bahan'] = strtolower($bahan);
  }

  public function getBahanAttribute($bahan) {
    return ucfirst($bahan);
  }

  public function setPerawatanAttribute($perawatan) {
    $this->attributes['perawatan'] = strtolower($perawatan);
  }

  public function getPerawatanAttribute($perawatan) {
    return ucfirst($perawatan);
  }

  public function kategori() {
    return $this->belongsToMany('App\Kategori', 'produk_kategori', 'produk_id', 'kategori_id');
  }

  public function foto() {
    return $this->hasMany('App\Foto', 'produk_id');
  }

  public function stok() {
    return $this->hasMany('App\Stok', 'produk_id');
  }

  public function brand() {
    return $this->belongsTo('App\Brand', 'brand_id');
  }
}
