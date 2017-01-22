<!-- Order Index -->

@extends('admin.template')

@section('main')
@include('_partial.flash_message')
  <!-- Page-Title -->
  <div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Order</h4>
    </div>
  </div>
  <!-- Akhir Page-Title -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Daftar Order</h3>
        </div>
        <div class="panel-body">

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsiv">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Alamat Pengiriman</th>
                    <th>Nama Penerima</th>
                    <th>HP Penerima</th>
                    <th>Biaya Belanja</th>
                    <th>Ongkos Kirim</th>
                    <th>Bank</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($list_order as $order)
                    <tr>
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->alamat }}</td>
                      <td>{{ $order->nama_penerima }}</td>
                      <td>{{ $order->hp_penerima }}</td>
                      <td>{{ $order->biaya_belanja }}</td>
                      <td>{{ $order->biaya_transfer }}</td>
                      @if(isset($order->bank))
                        <td>{{ $order->bank->nama }}</td>
                      @else
                        <td>Tidak Memilih Bank</td>
                      @endif
                      <td>
                        <div class=box-button>
                          <a href="{{ url('admin/order/' . $order->id) }}"class="btn btn-icon waves-effect waves-light btn-info m-b-5">
                             <i class="fa fa-info"></i> Detail
                          </a>
                        </div>
                        <div class=box-button>
                          {!! Form::open(['method' => 'DELETE', 'action' => ['OrderController@destroy', $order->id]]) !!}
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
