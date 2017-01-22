<!-- Slider Index -->

@extends('admin.template')

@section('main')
@include('_partial.flash_message')
  <!-- Page-Title -->
  <div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Slider</h4>
    </div>
  </div>
  <!-- Akhir Page-Title -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Daftar Slider</h3>
        </div>
        <div class="panel-body">

        <!-- Button Tambah Slider -->
        <a href="#" data-toggle="modal" data-target="#tambah-slider" class="btn btn-primary waves-effect waves-light">
            <i class="fa fa-plus"></i> Tambah Slider
        </a><br><br>
        <!-- Akhir Button Tambah Slider -->

        <div class="row">
          @foreach($list_slider as $slider)
            <div class="col-md-6 col-sm-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <img src="{{ asset('images/sliders/' . $slider->url) }}" alt="" style="width:100%;">
              </div>
              <div class="panel-footer">
                {!! Form::open(['method' => 'DELETE', 'action' => ['SliderController@destroy', $slider->id]]) !!}
                  {!! Form::button('<i class="fa fa-remove"></i> Hapus', ['type' => 'submit', 'class' => 'btn btn-icon waves-effect waves-light btn-danger m-b-5']) !!}
                {!! Form::close() !!}
              </div>
            </div>
          </div>
          @endforeach
          </div>
        </div>
      </div>

      <!-- Modal Tambah -->
      @include('admin.slider.modal_tambah')
      <!-- Akhir Modal Tambah -->

      </div>
    </div>
  </div>
  <!-- Akhir Row -->
@stop
