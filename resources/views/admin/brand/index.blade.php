<!-- Brand Index -->

@extends('admin.template')

@section('main')
@include('_partial.flash_message')
  <!-- Page-Title -->
  <div class="row">
    <div class="col-sm-12">
      <h4 class="pull-left page-title">Brand</h4>
    </div>
  </div>

  <div class="row">
      <div class="col-md-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Daftar Brand</h3>
              </div>
              <div class="panel-body">

                <!-- Button Tambah Brand -->
                <a href="{{ url('admin/brand/create') }}" class="btn btn-primary waves-effect waves-light">
                    <i class="fa fa-plus"></i> Tambah Brand
                </a><br><br>
                <!-- Akhir Button Tambah Brand -->

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

                                      @foreach($list_brand as $brand)
                                        <tr>
                                          <td>{{ $i++ }}</td>
                                          <td>{{ $brand->nama }}</td>
                                          <td>
                                            <div class=box-button>
                                              <a href="{{ url('admin/brand/' . $brand->id . '/edit') }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5">
                                                <i class="fa fa-pencil"></i> Edit
                                              </a>
                                            </div>
                                            <div class=box-button>
                                              {!! Form::open(['method' => 'DELETE', 'action' => ['BrandController@destroy', $brand->id]]) !!}
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
  <div>
    {{ $list_brand->links() }}
  </div>
@stop
