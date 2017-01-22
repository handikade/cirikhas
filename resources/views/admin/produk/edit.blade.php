<!-- Edit Produk-->

@extends('admin.template')

@section('main')
  <!-- Page Title -->
  <div class="row">
    <div class="col-sm-12">
      <h4 class="pull-left page-title">Edit Produk</h4>
    </div>
  </div>
  <!-- Akhir Page Title -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Edit</h3>
        </div>
        <div class="panel-body">
          <div class="container-fluid">
            {!! Form::model($produk, ['method' => 'PATCH', 'action' => ['ProdukController@update', $produk->id], 'files' => true]) !!}
              @include('admin.produk.form')
            {!! Form::close() !!}
          </div><!-- Akhir Row -->
        </div>
      </div>
    </div>
  </div>
@stop
