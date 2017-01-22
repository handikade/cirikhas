<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdminRequest;
use App\Admin;
use Session;

class AdminController extends Controller {
  public function index() {
    $list_admin = Admin::all();
    return view('admin.admin.index', compact('list_admin'));
  }

  public function create() {
    return view('admin.admin.create');
  }

  public function store(AdminRequest $request, Admin $admin) {
    $input = $request->all();

    $admin = new Admin;
    $admin->nama = $input['nama'];
    $admin->username = $input['username'];
    $admin->level = $input['level'];
    $admin->password = bcrypt($input['password']);

    if($request->hasFile('logo')) {
      $input['logo'] = $this->uploadImage($request);
      $admin->logo = $input['logo'];
    }

    $admin->save();

    Session::flash('flash_message', 'Data admin berhasil ditambahkan!');
    return redirect('admin/admin');
  }

  public function show($id) {

  }

  public function edit($id) {

  }

  public function update(Request $request, $id) {

  }

  public function destroy(Admin $admin) {
    $this->deleteImage($admin);
    $admin->delete();
    Session::flash('flash_message', 'Data admin berhasil dihapus!');
    Session::flash('penting', true);
    return redirect('admin/admin');
  }

  public function dashboard() {
    return view('admin.admin.dashboard');
  }

  private function uploadImage(AdminRequest $request) {
    $image = $request->file('logo');
    $ext = $image->getClientOriginalExtension();

    if($request->file('logo')->isValid()) {
      $title = date('YmdHis') . '.' . $ext;
      $path = 'images';
      $request->file('logo')->move($path, $title);

      return $title;
    }
    return false;
  }

  private function deleteImage(Admin $admin) {
    $exist = Storage::disk('images')->exists($admin->logo);

    if (isset($admin->logo) && $exist) {
      return Storage::disk('images')->delete($admin->logo);
    }
  }
}
