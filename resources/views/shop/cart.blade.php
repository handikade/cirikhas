@extends('shop.template')
@section('content')
@include('shop.header')
<div class="main-container no-sidebar">
        <div class="container">
            <div class="main-content">
                <div class="page-title">
                    <h3>SHOPPING CART</h3>
                </div>

                @if (session()->has('success_message'))
                  <div class="alert alert-success alert-dismissble" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session()->get('success_message') }}
                  </div>
                @endif

                @if (session()->has('error_message'))
                  <div class="alert alert-danger alert-dismissble" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session()->get('error_message') }}
                  </div>
                @endif

                <div class="row">
                    <div class="col-sm-12 col-md-8">
                      @if (sizeof(Cart::content()) > 0)
                        <table class="shop_table cart">
                            <thead>
                                <tr>
                                    <th colspan="2" class="product-name">Product</th>
                                    <th>Size</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Qty</th>
                                    <th></th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach (Cart::content() as $item)
                                <tr>
                                    <td class="product-thumbnail">
                                      <img src="{{ asset('images/photos/' . $item->model->produk->foto[0]->url) }}" alt="">
                                    </td>
                                    <td class="product-name">
                                      <a href="#">{{ $item->model->produk->nama }}</a>
                                    </td>
                                    <td>
                                      {{ $item->model->ukuran }}
                                    </td>
                                    @if($item->model->produk->diskon == 0)
                                      <td>{{ $item->model->produk->harga }}</td>
                                    @else
                                      <td>{{ $item->model->produk->harga_diskon }}</td>
                                    @endif
                                    <form action="{{ url('cart/' . $item->rowId) }}" method="POST">
                                      <td>
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="_method" value="PATCH">
                                        <select style="width:75px;" name="quantity" class="quantity" data-id="{{ $item->rowId }}">
                                          <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                                          <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                                          <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                                          <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                                          <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>
                                        </select>

                                      </td>
                                      <td><input type="submit" class="button small" value="Update"></td>
                                      </form>
                                    <td>Rp {{ $item->subtotal }}</td>
                                    <td class="product-remove">
                                      <form id="{{ 'delete-' . $item->rowId }}" action="{{ url('cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a href="#" onclick="document.getElementById('{{ 'delete-' . $item->rowId }}').submit()">
                                          <i class="fa fa-close"></i>
                                        </a>
                                      </form>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>

                        @else
                          <p>Your cart is empty</p>
                        @endif
                        <!--
                        <div class="box-coupon">
                            <div class="coupon">
                                <h3 class="coupon-box-title">Coupon</h3>
                                <div class="inner-box">
                                    <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code">
                                    <input type="submit" class="button" name="apply_coupon" value="Apply Coupon">
                                </div>
                            </div>
                        </div>
                        -->
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="box-cart-total">
                            <h2 class="title">Cart Totals</h2>
                            <table>
                                <tr>
                                    <td>Subtotal</td>
                                    <td><span class="price">Rp {{ Cart::subtotal(0,'','') }}</span></td>
                                </tr>

                                <tr>
                                  <td>Shipping</td>
                                  <?php $ongkir = 50000 ?>
                                  <td><span class="price">Rp {{ $ongkir }}</span></td>
                                </tr>

                                <!--
                                <tr>
                                    <td>Shipping</td>
                                    <td>
                                        <label><input name="shipping" type="radio">Free Shipping</label>
                                        <label>
                                            <input name="shipping" type="radio">Local Delivery
                                            <span class="price">£50</span>
                                        </label>
                                        <label>
                                            <input name="shipping" type="radio">Flat Rate
                                            <span class="price">£100</span>
                                        </label>
                                        <label>
                                            <input name="shipping" type="radio">International
                                            <span class="price">£150</span>
                                        </label>
                                    </td>
                                </tr>
                                -->

                                <tr class="order-total">
                                    <td>Total</td>
                                    <td><span class="price">Rp {{ Cart::subtotal(0,'','') + $ongkir }}</span></td>
                                </tr>
                            </table>
                            <a href="{{ url('/') }}" class="button medium">CONTINUE SHOPPING</a>
                            <a href="{{ url('checkout') }}" class="button btn-primary medium checkout-button">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
