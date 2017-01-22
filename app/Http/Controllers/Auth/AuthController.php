<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/';
    protected $no_hp = 'no_hp';
    protected $nama = 'nama';

    public function __construct() {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    protected function validator(array $data) {
        return Validator::make($data, [
            'nama' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'no_hp' => 'required|numeric|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function create(array $data) {
        return User::create([
            'nama' => $data['nama'],
            'no_hp' => $data['no_hp'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
