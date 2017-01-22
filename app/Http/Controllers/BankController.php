<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BankRequest;
use App\Bank;
use Session;
use Storage;

class BankController extends Controller {
  public function index() {
    $list_bank = Bank::all();
    return view('admin.bank.index', compact('list_bank'));
  }

  public function create() {
    return view('admin.bank.create');
  }

  public function store(BankRequest $request) {
    $input = $request->all();

    if($request->hasFile('logo')) {
      $input['logo'] = $this->uploadImage($request);
    }

    Bank::create($input);
    Session::flash('flash_message', 'Data bank berhasil ditambahkan!');
    return redirect('admin/bank');
  }

  public function edit(Bank $bank) {
    return view('admin.bank.edit', compact('bank'));
  }

  public function update(Bank $bank, BankRequest $request) {
    $input = $request->all();

    if ($request->hasFile('logo')) {
      $this->deleteImage($bank);
      $input['logo'] = $this->uploadImage($request);
    }

    else {
      $input['logo'] = $bank->logo;
    }

    $bank->update($input);
    Session::flash('flash_message', 'Data bank berhasil diupdate!');
    return redirect('admin/bank');
  }

  public function destroy(Bank $bank) {
    $this->deleteImage($bank);
    $bank->delete();
    Session::flash('flash_message', 'Data bank berhasil dihapus!');
    return redirect('admin/bank');
  }

  private function uploadImage(BankRequest $request) {
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

  private function deleteImage(Bank $bank) {
    $exist = Storage::disk('images')->exists($bank->logo);

    if (isset($bank->logo) && $exist) {
      return Storage::disk('images')->delete($bank->logo);
    }
  }
}
