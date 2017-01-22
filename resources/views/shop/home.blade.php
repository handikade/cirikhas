@extends('shop.template')

@section('content')
@include('shop.header')

<div class="container">

  <!-- Home slide -->
	<div class="owl-carousel nav-style4 nav-center-center" data-items="1" data-nav="true" data-dots="false" data-loop="true" data-autoplay="true">
    @foreach($list_slider as $slider)
      <img src="{{ asset('images/sliders/' . $slider->url) }}" alt="">
    @endforeach
	</div>
	<!-- ./Home slide -->

  <!-- category -->
  <div class="margin-top-50">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-5">
				<div class="section-title text-center margin-top-40 margin-bottom-30">
					<h3>OUR CATEGORIES</h3>
					<span class="sub-title">Find all items you want by select our featured categories</span>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-7">
				<ul class="category-menu category-carousel pull-left owl-carousel nav-style7 nav-center-center" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="30" data-responsive='{"0":{"items":1},"600":{"items":4},"1000":{"items":4}}'>
					<li>
						<a href="#">
						<img src="{{ asset('shop/images/categorys/1.png') }}" alt="">
						Clothing
						</a>
					</li>
					<li>
						<a href="#">
						<img src="{{ asset('shop/images/categorys/2.png') }}" alt="">
						Sneakers
						</a>
					</li>
					<li>
						<a href="#">
						<img src="{{ asset('shop/images/categorys/3.png') }}" alt="">
						Accessories
						</a>
					</li>
					<li>
						<a href="#">
						<img src="{{ asset('shop/images/categorys/4.png') }}" alt="">
						Handbags
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
  <!-- ./category -->

	<div class="container">
		<span class="line margin-top-50"></span>
	</div>
	<div class="margin-top-50">
		<div class="container">
			<div class="tab-product tab-product-fade-effect">
				<ul class="box-tabs nav-tab">
		      <li class="active"><a data-animated="" data-toggle="tab" href="#tab-1">Featured Product</a></li>
		    </ul>
		        <div class="tab-content">
		        	<div class="tab-container">
		        		<div id="tab-1" class="tab-panel active">
		        			<ul class="product-list-grid2 tab-list row owl-carousel-mobile" data-nav="false" data-dots="false" data-margin="0" data-loop="true"  data-items="1">

										@if(!($list_produk->isEmpty()))
										@foreach($list_produk as $produk)
										  <li class="product-item style3 mobile-slide-item col-sm-4 col-md-3">
										    <div class="product-inner">
										      <div class="product-thumb">
										        @if($produk->diskon != 0)
										          <div class="discount-label">
										            {{ '-' . $produk->diskon . '%' }}
										          </div>
										        @endif
										        <a href="{{url('produk/' . $produk->id)}}">
															@if(!$produk->foto->isEmpty())
																<img src="{{ 'images/photos/' . $produk->foto[0]->url }}" alt="">
															@else
																<img src="" alt="">
															@endif
														</a>
										      </div>
										      <div class="product-info">
										        <h3 class="product-name"><a href="{{url('produk/' . $produk->id)}}">{{$produk->nama}}</a></h3>
										        <span class="price">
										          @if($produk->diskon == 0)
										            <ins>Rp {{ number_format($produk->harga,0,",",".") }}</ins>
										          @else
										            <del>Rp {{ number_format($produk->harga,0,",",".") }}</del>
										            <ins>Rp {{ number_format($produk->harga_diskon,0,",",".") }}</ins>
										          @endif
										        </span>
										        <a href="{{url('produk/' . $produk->id)}}" class="button">LIHAT</a>
										      </div>
										    </div>
										  </li>
										@endforeach
										@endif

		        			</ul>
		        			<a class="button-loadmore" href="#">load more!</a>
		        		</div>
		        	</div>
		        </div>
			</div>
		</div>
	</div>
	<div class="section-brand-slide margin-bottom-60">
		<div class="brands-slide owl-carousel nav-center-center nav-style7" data-nav="true" data-dots="false" data-loop="true" data-margin="65" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":6}}'>
			<a href="#"><img src="{{ asset('shop/images/brands/brand10.png') }}" alt=""></a>
			<a href="#"><img src="{{ asset('shop/images/brands/brand11.png') }}" alt=""></a>
			<a href="#"><img src="{{ asset('shop/images/brands/brand12.png') }}" alt=""></a>
			<a href="#"><img src="{{ asset('shop/images/brands/brand13.png') }}" alt=""></a>
			<a href="#"><img src="{{ asset('shop/images/brands/brand14.png') }}" alt=""></a>
			<a href="#"><img src="{{ asset('shop/images/brands/brand15.png') }}" alt=""></a>
		</div>
	</div>
</div>
	<a href="#" class="scroll_top" title="Scroll to Top" style="display: block;"><i class="fa fa-arrow-up"></i></a>
@endsection
