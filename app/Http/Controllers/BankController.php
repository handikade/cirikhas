<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bank;
use App\Http\Requests\BankRequest;
use Session;
use Storage;

class BankController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $list_bank = Bank::all();
        return view('admin.bank.index', compact('list_bank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankRequest $request) {
        $input = $request->all();

        if($request->hasFile('logo')) {
          $input['logo'] = $this->uploadImage($request);
        }

        Bank::create($input);
        Session::flash('flash_message', 'Data bank berhasil ditambahkan!');
        return redirect('admin/bank');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank) {
        $this->deleteImage($bank);
        $bank->delete();
        Session::flash('flash_message', 'Data bank berhasil dihapus!');
        Session::flash('penting', true);
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
        $exist = Storage::disk('image')->exists($bank->logo);

        if (isset($bank->logo) && $exist) {
            $delete = Storage::disk('image')->delete($bank->logo);
            if ($delete) {
                return true;
            }
            return false;
        }
    }
}
