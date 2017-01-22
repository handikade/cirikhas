<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StokRequest extends Request {
  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'ukuran' => 'required|string',
      'stok' => 'required|integer|min:0',
    ];
  }
}
