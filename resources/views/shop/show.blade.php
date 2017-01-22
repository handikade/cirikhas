@extends('shop.template')

@section('content')
  @include('shop.header')
  <div class="container">
  <div class="row">
    <div class="main-content col-sm-12">
      <div class="row">
        <div class="col-sm-4">
          <div class="product-detail-image style2">
                <div class="main-image-wapper">
                    @if(!$produk->foto->isEmpty())
                      <img class="main-image" src="{{ asset('images/photos/' . $produk->foto[0]->url) }}" alt="">
                    @else
                      <img src="" alt="">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="product-details-right style2">
                <h3 class="product-name">{{ $produk->nama }}</h3>
                <span class="price">
                  @if($produk->diskon == 0)
                    <ins>Rp {{ number_format("$produk->harga",0,",",".") }}</ins>
                  @else
                    <del>Rp {{ number_format("$produk->harga",0,",",".") }}</del>
                    <ins>Rp {{ number_format("$produk->harga_diskon",0,",",".") }}</ins>
                  @endif
                </span>
                <div class="short-descript">
                  <h5>Deskripsi</h5>
                  <p>{{ $produk->deskripsi }}</p><br>
                  <h5>Bahan</h5>
                  <p>{{ $produk->bahan }}</p><br>
                  <h5>Perawatan</h5>
                  <p>{{ $produk->perawatan }}</p>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    @if($list_stok->isEmpty())
                    <p>Stok kosong</p>
                    @else
                      <form action="{{ url('/cart') }}" method="POST" class="cart-form">
                        {!! csrf_field() !!}
                        <label class="control-label">Pilih Ukuran</label>
                        <select name="id" class="form-control">
                          @foreach($list_stok as $stok)
                            @if($stok->stok > 0)
                              <option value="{{ $stok->id }}">{{ $stok->ukuran }}</option>
                            @endif
                          @endforeach
                        </select>
                        <br><br>
                        <input type="submit" class="button button-add-cart" value="Add to Cart">
                      </form>
                    @endif
                  </div>
                </div>
                <!--
                  <form action="{{ url('/cart') }}" method="POST" class="cart-form">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $produk->id }}">
                    <input type="hidden" name="name" value="{{ $produk->nama }}">
                    <input type="hidden" name="price" value="{{ $produk->harga }}">
                    <input type="submit" class="button button-add-cart" value="Add to Cart">
                  </form>
                -->
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
