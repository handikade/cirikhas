<!-- Edit Stok -->

@extends('admin.template')

@section('main')

  <!-- Page Title -->
  <div class="row">
    <div class="col-sm-12">
      <h4 class="pull-left page-title">Edit Stok</h4>
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
            {!! Form::model($stok, ['method' => 'PATCH', 'action' => ['StokController@update', $stok->id]]) !!}
              {!! Form::hidden('id', $stok->id) !!}

              <div class="row">
                @if($errors->any())
                <div class="form-group col-md-5 {{ $errors->has('ukuran') ? 'has-error' : 'has-success'}}">
                @else
                <div class="col-md-6">
                @endif
                  {!! Form::label('ukuran', 'Ukuran:', ['class' => 'control-label']) !!}
                  {!! Form::text('ukuran', null, ['class' => 'form-control form-white', 'autofocus' => '']) !!}
                  @if($errors->has('ukuran'))
                    <span class="help-block">{{ $errors->first('ukuran') }}</span>
                  @endif
                </div>
              </div>

              <div class="row">
                @if($errors->any())
                <div class="form-group col-md-5 {{ $errors->has('stok') ? 'has-error' : 'has-success'}}">
                @else
                <div class="col-md-6">
                @endif
                {!! Form::label('stok', 'Stok:', ['class' => 'control-label']) !!}
                  {!! Form::number('stok', null, ['class' => 'form-control form-white']) !!}
                  @if($errors->has('stok'))
                    <span class="help-block">{{ $errors->first('stok') }}</span>
                  @endif
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  @include('admin.submit_button')
                  @include('admin.back_button', ['url' => 'admin/produk/' . $stok->produk->id . '/stok'])
                  </a>
                </div>
              </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
