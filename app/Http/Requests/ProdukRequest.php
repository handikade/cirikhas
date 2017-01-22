<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProdukRequest extends Request {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'bahan' => 'required|string',
            'perawatan' => 'required|string',
            'diskon' => 'required|integer|min:0|max:100',
            'harga' => 'required|integer|min:0',
            'foto_utama' => 'sometimes|image|max:500|mimes:jpeg,jpg,bmp,png',
            'foto_satu' => 'sometimes|image|max:500|mimes:jpeg,jpg,bmp,png',
            'foto_dua' => 'sometimes|image|max:500|mimes:jpeg,jpg,bmp,png',
            'foto_tiga' => 'sometimes|image|max:500|mimes:jpeg,jpg,bmp,png'
        ];
    }
}
