<div id="box-mobile-menu" class="box-mobile-menu full-height full-width">
	<div class="box-inner">
		<span class="close-menu"><span class="icon pe-7s-close"></span></span>
	</div>
</div>
<div id="header-ontop" class="is-sticky"></div>
<header id="header" class="header style3 style12">
	<div class="container">
		<div class="topbar">
			<ul class="boutique-nav topbar-menu left">
				<li><a href="#"><i class="fa fa-phone"></i>Call Us: +98 765 432</a></li>
				<li><a href="#"><i class="fa fa-envelope"></i>info@demo.com</a></li>
			</ul>
			<ul class="boutique-nav topbar-menu right">
				<li class="menu-item-has-children">
					@if (Auth::guest())
						<a href="#"><i class="fa fa-lock"></i> Account</a>
						<ul class="sub-menu">
							<li>
	              <a href="{{ url('login') }}"><span>Login</span></a>
	            </li>
							<li>
	              <a href="{{ url('register') }}"><span>Register</span></a>
	            </li>
	            <li>
	              <a href="{{ url('redirect') }}"><span>Login with Facebook</span></a>
	            </li>
	          </ul>
					@else
						<a href="#"><i class="fa fa-user"></i> {{ Auth::user()->nama }}</a>
						<ul class="sub-menu">
							<li>
								<a href="#"><span>Profile</span></a>
							</li>
							<li>
								<a href="{{ url('logout') }}"><span>Logout</span></a>
							</li>
						</ul>
					@endif
				</li>
			</ul>
		</div>
		<div class="main-header">
			<div class="main-menu-wapper">
				<div class="row">
					<div class="col-sm-12">
						<div class="logo2 text-center">
							<a href="{ url('/') }"><img src="{{ asset('shop/images/logos/1.png') }}" alt=""></a>
						</div>
					</div>
					<div class="col-xs-2 col-sm-3 col-md-7 col-lg-5">
						<ul class="boutique-nav main-menu clone-main-menu">
							<li class="active">
								<a href="{{ url('/') }}">Home</a>
							</li>
							<li>
								<a href="#">Menu 1</a>
							</li>
							<li>
								<a href="#">Menu 2</a>
							</li>
							<li>
								<a href="#">Menu 3</a>
							</li>
						</ul>
						<span class="mobile-navigation"><i class="fa fa-bars"></i></span>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-3 logo-main">
						<div class="logo">
							<a href="#"><img src="{{ asset('shop/images/logos/1.png') }}" alt=""></a>
						</div>
					</div>
					<div class="col-xs-10 col-sm-9 col-md-5 col-lg-4 control-wapper">
						<div class="box-control">
							<div class="mini-cart">
	                <a class="cart-link" href="{{ url('cart') }}">
										<span class="icon pe-7s-cart"></span>
										<span class="count">{{ Cart::instance('default')->count(false) }}</span> Rp {{ Cart::instance('default')->subtotal() }}
									</a>
	            </div>
		        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
