<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Slider;
use Session;
use Storage;

class SliderController extends Controller {
    public function index() {
      $list_slider = Slider::all();
      return view('admin.slider.index', compact('list_slider'));
    }

    public function store(Request $request) {
      if($request->hasFile('slider')) {
        $image = $request->file('slider');
        $slider = new Slider;
        $slider->url = $this->upload($image);
        $slider->save();
      }

      Session::flash('flash_message', 'Data slider berhasil ditambahkan!');
      return redirect('admin/slider');
    }

    public function destroy(Slider $slider) {
      $slider->delete();
      Session::flash('flash_message', 'Data slider berhasil dihapus!');
      Session::flash('penting', true);
      $this->delete($slider);
      return redirect('admin/slider');
    }

    private function upload($image) {
      $ext = $image->getClientOriginalExtension();
      if($image->isValid()) {
        $title = date('YmdHis') . '.' . $ext;
        $path = 'images/sliders';
        $image->move($path, $title);

        return $title;
      }
      return false;
    }

    private function delete(Slider $slider) {
      return Storage::disk('sliders')->delete($slider->url);
    }
}
