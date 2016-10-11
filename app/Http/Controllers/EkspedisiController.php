<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ekspedisi;
use App\Http\Requests\EkspedisiRequest;
use Session;
use Storage;

class EkspedisiController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
      $list_ekspedisi = Ekspedisi::all();
      return view('admin.ekspedisi.index', compact('list_ekspedisi'));
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
    public function store(EkspedisiRequest $request) {
      $input = $request->all();

      if($request->hasFile('logo')) {
        $input['logo'] = $this->uploadImage($request);
      }

      Ekspedisi::create($input);
      Session::flash('flash_message', 'Data ekspedisi berhasil ditambahkan!');
      return redirect('admin/ekspedisi');
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
    public function update(Ekspedisi $ekspedisi, EkspedisiRequest $request) {
        $input = $request->all();

        if ($request->hasFile('logo')) {
            $this->deleteImage($ekspedisi);
            $input['logo'] = $this->uploadImage($request);
        }

        else {
            $input['logo'] = $ekspedisi->logo;
        }

        $ekspedisi->update($input);
        Session::flash('flash_message', 'Data ekspedisi berhasil diupdate!');
        return redirect('admin/ekspedisi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ekspedisi $ekspedisi) {
        $this->deleteImage($ekspedisi);
        $ekspedisi->delete();
        Session::flash('flash_message', 'Data ekspedisi berhasil dihapus!');
        Session::flash('penting', true);
        return redirect('admin/ekspedisi');
    }

    private function uploadImage(EkspedisiRequest $request) {
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

    private function deleteImage(Ekspedisi $ekspedisi) {
        $exist = Storage::disk('image')->exists($ekspedisi->logo);

        if (isset($ekspedisi->logo) && $exist) {
            $delete = Storage::disk('image')->delete($ekspedisi->logo);
            if ($delete) {
                return true;
            }
            return false;
        }
    }
}
