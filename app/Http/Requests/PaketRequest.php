<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PaketRequest extends Request {
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
            'nama'         => 'required|string|max:30',
            'ekspedisi_id' => 'required',
            'ongkos_kirim' => 'required|numeric|digits_between:1,10',
        ];
    }
}
