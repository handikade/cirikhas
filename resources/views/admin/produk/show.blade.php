<!-- Show Produk-->

@extends('admin.template')
@section('main')
@include('_partial.flash_message')
  <!-- Page Title -->
  <div class="row">
    <div class="col-sm-12">
      <h4 class="pull-left page-title">Detail Produk</h4>
    </div>
  </div>
  <!-- Akhir Page Title -->

  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">{{ $produk->nama }}</h3>
        </div>
        <div class="panel-body">
          <img src="{{ asset('images/photos/' . $foto->url) }}" style="width:100%;">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Data Produk</h3>
        </div>
        <div class="panel-body">
          <table class="table">
            <tr>
              <th>Nama</th>
              <td>{{ $produk->nama }}</td>
            </tr>
            <tr>
              <th>Deskripsi</th>
              <td>{{ $produk->deskripsi }}</td>
            </tr>
            <tr>
              <th>Bahan</th>
              <td>{{ $produk->bahan }}</td>
            </tr>
            <tr>
              <th>Perawatan</th>
              <td>{{ $produk->perawatan }}</td>
            </tr>
            <tr>
              <th>Harga</th>
              <td>{{ 'Rp ' . number_format($produk->harga,0,",",".") }}</td>
            </tr>
            <tr>
              <th>Diskon</th>
              <td>
                @if($produk->diskon == 0)
                  Tidak ada diskon
                @else
                  {{ $produk->diskon . '%' }}
                @endif
              </td>
            </tr>
            <tr>
              <th>Harga Diskon</th>
              <td>
                @if($produk->diskon == 0)
                  -
                @else
                  {{ 'Rp ' . number_format($produk->harga_diskon,0,",",".") }}
                @endif
              </td>
            </tr>
            <tr>
              <th>Brand</th>
              <td>{{ $produk->brand->nama }}</td>
            </tr>
            <tr>
              <th>Kategori</th>
              <td>
                @foreach($produk->kategori as $kategori)
                  <span class="label label-default">{{ $kategori->nama}}</span>
                @endforeach
              </td>
            </tr>
          </table>
          <div class="row">
            <div class="col-md-6">
              <a href="{{ url('admin/produk/' . $produk->id . '/edit') }}" class="btn btn-icon waves-effect waves-light btn-success">
                <i class="fa fa-pencil"></i> Edit
              </a>
              @include('admin.back_button', ['url' => 'admin/produk'])
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop
