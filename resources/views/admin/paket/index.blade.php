<!-- Paket Index -->

@extends('admin.template')

@section('main')
@include('_partial.flash_message')
  <!-- Page-Title -->
  <div class="row">
      <div class="col-sm-12">
          <h4 class="pull-left page-title">Paket</h4>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Daftar Paket</h3>
              </div>
              <div class="panel-body">

                <!-- Button Tambah Paket -->
                <a href="#" data-toggle="modal" data-target="#tambah-paket" class="btn btn-primary waves-effect waves-light">
                    <i class="fa fa-plus"></i> Tambah Paket
                </a><br><br>
                <!-- Akhir Button Tambah Ekspedisi -->

                  <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="table-responsiv">
                              <table class="table table-hover">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>Nama</th>
                                          <th>Ekspedisi</th>
                                          <th>Ongkos Kirim</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 0; ?>
                                      @foreach($list_paket as $paket)
                                        <tr>
                                          <td>{{ ++$i }}</td>
                                          <td>{{ $paket->nama }}</td>
                                          <td>{{ $paket->ekspedisi->nama }}</td>
                                          <td>{{ $paket->ongkos_kirim }}</td>
                                          <td>
                                            <div class=box-button>
                                              <a href="#" data-toggle="modal" data-target="#edit-paket-{{ $i }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5">
                                                <i class="fa fa-pencil"></i> Edit
                                              </a>

                                              @include('admin.paket.modal_edit')

                                            </div>
                                            <div class=box-button>
                                              {!! Form::open(['method' => 'DELETE', 'action' => ['PaketController@destroy', $paket->id]]) !!}
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

              <!-- Modal Tambah Ekspedisi -->
              @include('admin.paket.modal_tambah')
              <!-- END MODAL -->

          </div>
      </div>
  </div> <!-- End row -->
@stop
