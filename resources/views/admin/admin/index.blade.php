<!-- Admin Index -->

@extends('admin.template')

@section('main')
@include('_partial.flash_message')
  <!-- Page-Title -->
  <div class="row">
    <div class="col-sm-12">
      <h4 class="pull-left page-title">Admin</h4>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Daftar Admin</h3>
        </div>
        <div class="panel-body">

          <!-- Button Tambah Admin -->
          <a href="{{ url('admin/admin/create') }}" class="btn btn-primary waves-effect waves-light">
              <i class="fa fa-plus"></i> Tambah Admin
          </a><br><br>
          <!-- Akhir Button Tambah Admin -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="table-responsiv">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{--*/ $i = 0 /*--}}
                    @foreach($list_admin as $admin)
                      <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $admin->nama }}</td>
                        <td>{{ $admin->username }}</td>
                        @if($admin->level == '0')
                        <td>Super Admin</td>
                        @elseif ($admin->level == '1')
                        <td>Admin Toko</td>
                        @else
                        <td>Admin Penjualan</td>
                        @endif
                        <td>
                          <div class=box-button>
                            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminController@destroy', $admin->id]]) !!}
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
  </div> <!-- End row -->
@stop
