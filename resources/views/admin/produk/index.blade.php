<!-- Produk Index -->

@extends('admin.template')

@section('main')
@include('_partial.flash_message')
  <!-- Page-Title -->
  <div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Produk</h4>
    </div>
  </div>
  <!-- Akhir Page-Title -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Daftar Produk</h3>
        </div>
        <div class="panel-body">

        <!-- Button Tambah Produk -->
        <a href="{{ url('admin/produk/create') }}" class="btn btn-primary waves-effect waves-light">
            <i class="fa fa-plus"></i> Tambah Produk
        </a><br><br>
        <!-- Akhir Button Tambah Produk -->

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsiv">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Harga Diskon</th>
                    <th>Brand</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  {{--*/ $i = 0 /*--}}
                  @foreach($list_produk as $produk)
                    <tr>
                      <td>{{ $produk->id }}</td>
                      <td>{{ $produk->nama }}</td>
                      <td>{{ 'Rp ' . number_format($produk->harga,0,",",".") }}</td>
                      @if($produk->diskon == 0)
                        <td> - </td>
                        <td> - </td>
                      @else
                        <td>{{ $produk->diskon . '%' }}</td>
                        <td>{{ 'Rp ' . number_format($produk->harga_diskon,0,",",".") }}</td>
                      @endif
                      <td>{{ $produk->brand->nama }}</td>
                      <td>
                        <div class=box-button>
                          <a href="{{ url('admin/produk/' . $produk->id) }}"class="btn btn-icon waves-effect waves-light btn-info m-b-5">
                             <i class="fa fa-info"></i> Detail
                          </a>
                        </div>
                        <div class=box-button>
                          <a href="{{ url('admin/produk/' . $produk->id . '/stok') }}"class="btn btn-icon waves-effect waves-light btn-purple m-b-5">
                             <i class="fa fa-database"></i> Edit Stok
                          </a>
                        </div>
                        <div class=box-button>
                          {!! Form::open(['method' => 'DELETE', 'action' => ['ProdukController@destroy', $produk->id]]) !!}
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
  <div>
    {{ $list_produk->links() }}
  </div>
@stop
