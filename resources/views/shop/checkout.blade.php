@extends('shop.template')
@section('content')
  @include('shop.header')
  <div class="main-container no-sidebar">
    <div class="container">
          <div class="main-content">
              <div class="page-title">
                  <h3>CHECKOUT</h3>
              </div>
              <form action="{{ url('/order') }}" method="POST" role="form" id="form-checkout">
                <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                <input name="biaya_belanja" type="hidden" value="{{ Cart::subtotal('0','','') }}">
                <input name="biaya_transfer" type="hidden" value="50000">
                {{ csrf_field() }}
              <div class="row">
                  <div class="col-sm-6">
                      <div class="form-checkout">
                          <h5 class="form-title">ALAMAT</h5>
                          <div class="row">
                              <div class="col-sm-6">
                                  <p><input name="nama_penerima" type="text" placeholder="Nama Penerima" required></p>
                              </div>
                              <div class="col-sm-6">
                                  <p><input name="hp_penerima" type="text" placeholder="HP Penerima" required></p>
                              </div>
                          </div>
                          <p><textarea rows="4" cols="75" name="alamat" placeholder="Alamat Lengkap" required></textarea></p>
                          <p><input type="text" placeholder="Kode Pos" required></p>
                      </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-checkout checkout-payment">
                        <h5 class="form-title">PILIHAN BANK</h5>
                          @if(count($list_bank) > 0)
                            <div class="payment_methods">
                              @foreach($list_bank as $bank)
                              <div class="payment_method">
                                <label><input name="bank_id" type="radio" value="{{ $bank->id }}">{{ $bank->nama }}</label>
                                <div class="payment_box">
                                   <img src="{{asset('images/' . $bank->logo )}}" style="width:50px;height:auto;">
                                </div>
                              </div>
                              @endforeach
                            </div>
                          @else
                            <p>Tidak ada pilihan Bank</p>
                          @endif
                    </div>
                  </div>
              </div>
              </form>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-checkout order">
                            <h5 class="form-title">BARANG PESANAN</h5>
                            <table class="shop-table order">
                                <thead>
                                    <tr>
                                        <th class="product-name">PRODUK</th>
                                        <th class="product-name">UKURAN</th>
                                        <th class="product-name">KUANTITAS</th>
                                        <th class="total">HARGA</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @foreach(Cart::content() as $item)
                                    <tr>
                                        <td class="product-name">{{ $item->model->produk->nama }}</td>
                                        <td class="product-name">{{ $item->model->ukuran }}</td>
                                        <td class="product-name">{{ $item->qty }}</td>
                                        <td class="total"><span class="price">{{ $item->subtotal }}</span></td>
                                    </tr>
                                  @endforeach

                                    <tr>
                                        <td class="subtotal">Total</td>
                                        <td></td>
                                        <td></td>
                                        <td class="total"><span class="price">{{ Cart::subtotal(0,'','') }}</span></td>
                                    </tr>

                                </tbody>
                            </table>
                            <a class="button btn-primary medium" onclick="document.getElementById('form-checkout').submit()" style="cursor:pointer;">
                              PROCEED TO CHECKOUT
                            </a>
                        </div>
                </div>
              </div>
          </div>
      </div>
  </div>
@endsection
