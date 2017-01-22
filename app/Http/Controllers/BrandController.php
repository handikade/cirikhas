<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Brand;
use App\Http\Requests\BrandRequest;
use Session;

class BrandController extends Controller {
    public function index() {
      $list_brand = Brand::orderBy('id', 'DESC')->paginate(5);
      return view('admin.brand.index', compact('list_brand'));
    }

    public function create() {
      return view('admin.brand.create');
    }

    public function store(BrandRequest $request) {
      $input = $request->all();

      Brand::create($input);
      Session::flash('flash_message', 'Data brand berhasil ditambahkan!');
      return redirect('admin/brand');
    }

    public function edit(Brand $brand) {
      return view('admin.brand.edit', compact('brand'));
    }

    public function update(Brand $brand, BrandRequest $request) {
      $input = $request->all();
      $brand->update($input);
      Session::flash('flash_message', 'Data brand berhasil diedit!');
      return redirect('admin/brand');
    }

    public function destroy(Brand $brand) {
      $brand->delete();
      Session::flash('flash_message', 'Data brand berhasil dihapus!');
      Session::flash('penting', true);
      return redirect('admin/brand');
    }
}
