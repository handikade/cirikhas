<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BankRequest extends Request {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'nama'            => 'required|string|max:30',
            'nomor_rekening'  => 'required|numeric|digits_between:1,30',
            'atas_nama'       => 'required|string|max:50',
            'logo'            => 'sometimes|image|max:500|mimes:jpeg,jpg,bmp,png',
        ];
    }
}
