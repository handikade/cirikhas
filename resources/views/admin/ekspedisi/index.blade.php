<!-- Bank Index -->

@extends('admin.template')

@section('main')
@include('_partial.flash_message')
  <!-- Page-Title -->
  <div class="row">
      <div class="col-sm-12">
          <h4 class="pull-left page-title">Ekspedisi</h4>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Daftar Ekspedisi</h3>
              </div>
              <div class="panel-body">

                <!-- Button Tambah Ekspedisi -->
                <a href="#" data-toggle="modal" data-target="#tambah-ekspedisi" class="btn btn-primary waves-effect waves-light">
                    <i class="fa fa-plus"></i> Tambah Ekspedisi
                </a><br><br>
                <!-- Akhir Button Tambah Ekspedisi -->

                  <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="table-responsiv">
                              <table class="table table-hover">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>Logo</th>
                                          <th>Nama Ekspedisi</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 0; ?>
                                      @foreach($list_ekspedisi as $ekspedisi)
                                        <tr>
                                          <td>{{ ++$i }}</td>
                                          <td>
                                            @if(isset($ekspedisi->logo) && ($ekspedisi->logo) != "")
                                              <img src="{{ asset('images/' . $ekspedisi->logo) }}" style="width:50px;height:auto;">
                                            @else
                                              <img src="{{ asset('images/default-thumbnail.jpg') }}" style="width:50px;height:auto;">
                                            @endif
                                          </td>
                                          <td>{{ $ekspedisi->nama }}</td>
                                          <td>
                                            <div class=box-button>
                                              <a href="#" data-toggle="modal" data-target="#edit-ekspedisi-{{ $i }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5">
                                                <i class="fa fa-pencil"></i> Edit
                                              </a>

                                              @include('admin.ekspedisi.modal_edit')

                                            </div>
                                            <div class=box-button>
                                              {!! Form::open(['method' => 'DELETE', 'action' => ['EkspedisiController@destroy', $ekspedisi->id]]) !!}
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
              @include('admin.ekspedisi.modal_tambah')
              <!-- END MODAL -->

          </div>
      </div>
  </div> <!-- End row -->
@stop
