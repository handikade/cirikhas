<!-- Edit Kategori -->

@extends('admin.template')

@section('main')
  <!-- Page Title -->
  <div class="row">
    <div class="col-sm-12">
      <h4 class="pull-left page-title">Edit Kategori</h4>
    </div>
  </div>
  <!-- Akhir Page Title -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"Edit</h3>
        </div>
        <div class="panel-body">
          <div class="container-fluid">
            {!! Form::model($kategori, ['method' => 'PATCH', 'action' => ['KategoriController@update', $kategori->id]]) !!}
              @include('admin.kategori.form')
            {!! Form::close() !!}
          </div><!-- Akhir Row -->
        </div>
      </div>
    </div>
  </div>
@stop
