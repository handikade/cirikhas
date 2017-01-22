<!-- Stok Produk-->

@extends('admin.template')

@section('main')
@include('_partial.flash_message')
<!-- Page Title -->
<div class="row">
  <div class="col-sm-12">
    <h4 class="pull-left page-title">Stok</h4>
  </div>
</div>
<!-- Akhir Page Title -->

<div class="row">
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">{{ $produk->nama}}</h3>
      </div>
      <div class="panel-body">

          <img src="{{ asset('images/photos/' . $foto->url) }}" style="width:100%;">

      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Stok</h3>
      </div>
      <div class="panel-body">
        <div class="row">
          {!! Form::open(['url' => 'admin/stok']) !!}
          {!! Form::hidden('produk_id', $produk->id) !!}

          @if($errors->any())
          <div class="form-group col-md-5 {{ $errors->has('ukuran') ? 'has-error' : 'has-success'}}">
          @else
          <div class="col-md-5">
          @endif
            {!! Form::text('ukuran', null, ['class' => 'form-control form-white', 'autofocus' => '', 'placeholder' => 'Ukuran']) !!}
            @if($errors->has('ukuran'))
              <span class="help-block">{{ $errors->first('ukuran') }}</span>
            @endif
          </div>

          @if($errors->any())
          <div class="form-group col-md-5 {{ $errors->has('stok') ? 'has-error' : 'has-success'}}">
          @else
          <div class="col-md-5">
          @endif
            {!! Form::number('stok', null, ['class' => 'form-control form-white', 'placeholder' => 'Stok']) !!}
            @if($errors->has('stok'))
              <span class="help-block">{{ $errors->first('stok') }}</span>
            @endif
          </div>

          <div class="col-md-2">
            {!! Form::button('<i class="fa fa-plus"></i> Tambah',
            ['type' => 'submit', 'class' => 'btn btn-primary waves-effect waves-light']) !!}
          </div>
          {!! Form::close() !!}
        </div>

        <div class="row">
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Ukuran</th>
                  <th>Stok</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($list_stok as $stok)
                  <tr>
                    <td>{{ $stok->ukuran }}</td>
                    <td>{{ $stok->stok }}</td>
                    <td>
                      <div class=box-button>
                        <a href="{{ url('admin/stok/' . $stok->id . '/edit') }}"class="btn btn-icon waves-effect waves-light btn-success m-b-5">
                           <i class="fa fa-pencil"></i> Edit
                        </a>
                      </div>
                      <div class=box-button>
                        {!! Form::open(['method' => 'DELETE', 'action' => ['StokController@destroy', $stok->id]]) !!}
                          {!! Form::button('<i class="fa fa-remove"></i> Hapus', ['type' => 'submit', 'class' => 'btn btn-icon waves-effect waves-light btn-danger m-b-5']) !!}
                        {!! Form::close() !!}
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        </div>
      </div>
    </div>
  </div>
</div>
@stop
