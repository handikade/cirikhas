<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VoucherRequest extends Request {
  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'kode' => 'required|string|max:20|alpha_num',
      'sasaran' => 'required',
      'tipe' => 'required',
      'nominal' => 'integer|min:0',
      'persentase' => 'integer|min:0|max:100',
      'mulai' => 'required|date',
      'berakhir' => 'required|date',
    ];
  }
}
