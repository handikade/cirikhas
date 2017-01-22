<!-- Voucher Index -->

@extends('admin.template')

@section('main')
@include('_partial.flash_message')
  <!-- Page-Title -->
  <div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Voucher</h4>
    </div>
  </div>
  <!-- Akhir Page-Title -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Daftar Voucher</h3>
        </div>
        <div class="panel-body">

        <!-- Button Tambah Voucher -->
        <a href="{{ url('admin/voucher/create') }}" class="btn btn-primary waves-effect waves-light">
            <i class="fa fa-plus"></i> Tambah Voucher
        </a><br><br>
        <!-- Akhir Button Tambah Voucher -->

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsiv">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kode</th>
                    <th>Sasaran</th>
                    <th>Tipe Potongan</th>
                    <th>Besar Potongan</th>
                    <th>Mulai</th>
                    <th>Berakhir</th>
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

                  @foreach($list_voucher as $voucher)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $voucher->kode }}</td>
                      @if($voucher->sasaran == 'ongkos_kirim')
                        <td>Ongkos Kirim</td>
                      @else
                        <td>Harga Produk</td>
                      @endif
                      @if($voucher->tipe == 'nominal')
                        <td>Potongan</td>
                        <td>
                          <?php $int = (int)$voucher->nominal; ?>
                          {{ 'Rp ' . number_format($int,0,",",".") . ',-'}}
                        </td>
                      @else
                        <td>Persen</td>
                      <td>
                        {{ $voucher->persentase . '%' }}
                      </td>
                      @endif

                      <td>{{ $voucher->mulai }}</td>
                      <td>{{ $voucher->berakhir }}</td>
                      <td>
                        <div class=box-button>
                          <a href="{{ url('admin/voucher/' . $voucher->id . '/edit') }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5">
                            <i class="fa fa-pencil"></i> Edit
                          </a>
                        </div>
                        <div class=box-button>
                          {!! Form::open(['method' => 'DELETE', 'action' => ['VoucherController@destroy', $voucher->id]]) !!}
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

        <div class="paging">
          {{ $list_voucher->links() }}
        </div>

      </div>

      <!-- Modal Tambah -->
      @include('admin.voucher.modal_tambah')
      <!-- Akhir Modal Tambah -->

      </div>
    </div>
  </div>
  <!-- Akhir Row -->
@stop
