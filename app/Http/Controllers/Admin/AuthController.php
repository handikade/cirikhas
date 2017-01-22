<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {
  use AuthenticatesAndRegistersUsers, ThrottlesLogins;

  protected $guard = 'admin';
  protected $username = 'username';
  protected $redirectTo = 'admin/dashboard';
  protected $redirectAfterLogout = 'admin/login';

  public function __construct() {
      $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
  }

  public function getLogin() {
    if(Auth::guard('admin')->check()) {
      return redirect('admin/dashboard');
    }

    else {
      return view('admin.auth.login');
    }
  }

  protected function validator(array $data) {
      return Validator::make($data, [
          'nama' => 'required|max:255',
          'username' => 'required|max:15|unique:admin',
          'password' => 'required|min:4|confirmed',
      ]);
  }

  protected function create(array $data) {
      return Admin::create([
          'nama' => $data['nama'],
          'username' => $data['username'],
          'password' => bcrypt($data['password']),
      ]);
  }
}
