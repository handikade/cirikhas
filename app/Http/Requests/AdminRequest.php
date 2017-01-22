<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminRequest extends Request {
  public function authorize() {
    return true;
  }

  public function rules()
  {
    return [
        'nama'     => 'required|string|max:30',
        'username' => 'required|unique:admin',
        'level'    => 'required',
        'password' => 'required',
        'logo'     => 'sometimes|image|max:500|mimes:jpeg,jpg,bmp,png',
    ];
  }
}
