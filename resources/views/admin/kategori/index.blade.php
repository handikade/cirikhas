<!-- Kategori Index -->

@extends('admin.template')

@section('main')
@include('_partial.flash_message')
  <!-- Page-Title -->
  <div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Kategori</h4>
    </div>
  </div>
  <!-- Akhir Page-Title -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Daftar Kategori</h3>
        </div>
        <div class="panel-body">

        <!-- Button Tambah Kategori -->
        <a href="{{ url('admin/kategori/create') }}" class="btn btn-primary waves-effect waves-light">
            <i class="fa fa-plus"></i> Tambah Kategori
        </a><br><br>
        <!-- Akhir Button Tambah Kategori -->

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsiv">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                    if (isset($_GET['page'])) {
                      $i = 1 + (($_GET['page'] - 1) * 5);
                    }

                    else {
                      $i = 1;
                    }
                  ?>

                  @foreach($list_kategori as $kategori)
                    <tr>
                      <td>{{ $i++ }}</td>

                      <td>{{ $kategori->nama }}</td>
                      <td>
                        <div class=box-button>
                          <a href="{{ url('admin/kategori/' . $kategori->id . '/edit') }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5">
                            <i class="fa fa-pencil"></i> Edit
                          </a>
                        </div>
                        <div class=box-button>
                          {!! Form::open(['method' => 'DELETE', 'action' => ['KategoriController@destroy', $kategori->id]]) !!}
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

  <div>
    {{ $list_kategori->links() }}
  </div>
@stop
