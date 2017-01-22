<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BankRequest extends Request {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'nama'            => 'required|string|max:30',
            'kode_bank'       => 'required|numeric|digits:3',
            'nomor_rekening'  => 'required|numeric|digits_between:1,30',
            'atas_nama'       => 'required|string|max:30',
            'logo'            => 'required|image|max:500|mimes:jpeg,jpg,bmp,png',
        ];
    }
}
