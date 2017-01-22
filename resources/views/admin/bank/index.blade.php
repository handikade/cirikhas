<!-- Bank Index -->

@extends('admin.template')

@section('main')
@include('_partial.flash_message')
  <!-- Page-Title -->
  <div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Bank</h4>
    </div>
  </div>
  <!-- Akhir Page-Title -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Daftar Bank</h3>
        </div>
        <div class="panel-body">

        <!-- Button Tambah Bank -->
        <a href="{{ url('admin/bank/create') }}" class="btn btn-primary waves-effect waves-light">
            <i class="fa fa-plus"></i> Tambah Bank
        </a><br><br>
        <!-- Akhir Button Tambah Bank -->

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsiv">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Logo</th>
                    <th>Nama Bank</th>
                    <th>Kode Bank</th>
                    <th>Nomor Rekening</th>
                    <th>Atas Nama</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  {{--*/ $i = 0 /*--}}
                  @foreach($list_bank as $bank)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>
                        @if(isset($bank->logo) && ($bank->logo) != "")
                          <img src="{{ asset('images/' . $bank->logo) }}" style="width:50px;height:auto;">
                        @else
                          <img src="{{ asset('images/default-thumbnail.jpg') }}" style="width:50px;height:auto;">
                        @endif
                      </td>
                      <td>{{ $bank->nama }}</td>
                      <td>{{ $bank->kode_bank }}</td>
                      <td>{{ $bank->nomor_rekening }}</td>
                      <td>{{ $bank->atas_nama }}</td>
                      <td>
                        <div class=box-button>
                          <a href="{{ url('admin/bank/' . $bank->id . '/edit') }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5">
                            <i class="fa fa-pencil"></i> Edit
                          </a>
                        </div>
                        <div class=box-button>
                          {!! Form::open(['method' => 'DELETE', 'action' => ['BankController@destroy', $bank->id]]) !!}
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
  <!-- Akhir Row -->
@stop
