<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class KategoriRequest extends Request {
  public function authorize() {
    return true;
  }

  public function rules() {
    return ['nama' => 'required|string|max:30'];
  }
}
