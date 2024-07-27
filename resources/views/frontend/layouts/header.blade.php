<!DOCTYPE HTML>
<html>
   <head>
   <title>FootyWooty</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="csrf-token" content="{{ csrf_token() }}">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('frontend/css/icomoon.css')}}">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="{{asset('frontend/css/ionicons.min.css')}}">
	<!-- Bootstrap  -->

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{asset('frontend/css/flexslider.css')}}">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">

	<!-- Date Picker -->
	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datepicker.css')}}">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="{{asset('frontend/fonts/flaticon/font/flaticon.css')}}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

	</head>

    @yield('script')

    <body>

	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo">
                                <a href="{{route('frontend.index')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="45" height="40" viewBox="0 0 256 256" xml:space="preserve">
                                    <defs>
                                    </defs>
                                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                        <path d="M 80.38 63.919 c -35.747 0 -40.675 -22.685 -32.046 -62.207 H 4.704 C 9.398 47.455 -1.954 64.13 4.507 88.288 h 18.561 c 1.46 -2.409 4.099 -4.024 7.122 -4.024 h 12.539 c 3.023 0 5.662 1.615 7.122 4.024 h 38.07 C 90.429 80.434 88.821 64.184 80.38 63.919 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(243,182,88); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path d="M 87.921 89.288 h -38.07 c -0.35 0 -0.674 -0.183 -0.855 -0.481 c -1.344 -2.219 -3.687 -3.543 -6.266 -3.543 h -12.54 c -2.58 0 -4.922 1.324 -6.267 3.543 c -0.181 0.299 -0.505 0.481 -0.855 0.481 H 4.507 c -0.453 0 -0.849 -0.305 -0.966 -0.741 C 0.317 76.492 1.446 66.408 2.875 53.643 C 4.306 40.868 6.085 24.97 3.71 1.814 C 3.681 1.533 3.772 1.252 3.962 1.042 c 0.189 -0.21 0.459 -0.33 0.742 -0.33 h 43.629 c 0.303 0 0.589 0.137 0.779 0.373 c 0.189 0.235 0.263 0.544 0.197 0.84 c -5.651 25.883 -4.835 41.568 2.644 50.856 c 5.493 6.821 14.791 10.138 28.426 10.138 c 0.011 0 0.021 0 0.031 0.001 c 2.409 0.075 4.53 1.314 6.135 3.585 c 3.808 5.39 4.283 15.966 2.327 22.088 C 88.741 89.007 88.355 89.288 87.921 89.288 z M 50.394 87.288 h 36.779 c 1.561 -5.745 0.975 -15.05 -2.261 -19.629 c -1.241 -1.758 -2.772 -2.68 -4.549 -2.74 c -14.271 -0.003 -24.072 -3.563 -29.967 -10.884 c -7.773 -9.653 -8.802 -25.51 -3.301 -51.323 H 5.81 c 2.23 22.772 0.471 38.487 -0.947 51.153 C 3.487 66.155 2.394 75.918 5.28 87.288 h 17.244 c 1.748 -2.53 4.572 -4.024 7.666 -4.024 h 12.54 C 45.822 83.264 48.647 84.758 50.394 87.288 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path d="M 88.951 77.011 H 3.152 c 0.113 2.927 0.515 8.137 1.355 11.277 h 18.561 c 1.46 -2.409 4.099 -4.024 7.122 -4.024 h 12.539 c 3.023 0 5.662 1.615 7.122 4.024 h 38.07 C 88.747 85.701 89.115 80.225 88.951 77.011 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(190,143,125); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path d="M 87.921 89.288 h -38.07 c -0.35 0 -0.674 -0.183 -0.855 -0.481 c -1.344 -2.219 -3.687 -3.543 -6.266 -3.543 h -12.54 c -2.58 0 -4.922 1.324 -6.267 3.543 c -0.181 0.299 -0.505 0.481 -0.855 0.481 H 4.507 c -0.453 0 -0.849 -0.305 -0.966 -0.741 c -0.815 -3.048 -1.257 -8.099 -1.388 -11.498 c -0.011 -0.271 0.09 -0.535 0.278 -0.731 s 0.449 -0.307 0.721 -0.307 h 85.799 c 0.532 0 0.972 0.417 0.999 0.949 c 0.172 3.369 -0.229 8.976 -1.077 11.633 C 88.741 89.007 88.356 89.288 87.921 89.288 z M 50.394 87.288 h 36.768 c 0.566 -2.345 0.873 -6.373 0.823 -9.277 H 4.198 c 0.153 2.927 0.508 6.67 1.093 9.277 h 17.232 c 1.748 -2.53 4.572 -4.024 7.666 -4.024 h 12.54 C 45.822 83.264 48.647 84.758 50.394 87.288 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <rect x="1" y="1.71" rx="0" ry="0" width="49.66" height="15.13" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(243,182,88); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/>
                                        <path d="M 50.664 17.837 H 1 c -0.552 0 -1 -0.448 -1 -1 V 1.712 c 0 -0.552 0.448 -1 1 -1 h 49.664 c 0.553 0 1 0.448 1 1 v 15.125 C 51.664 17.39 51.217 17.837 50.664 17.837 z M 2 15.837 h 47.664 V 2.712 H 2 V 15.837 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    </g>
                                </svg>
                                FootyWooty
                                </a>
                            </div>
						</div>
						<div class="col-sm-5 col-md-3">
			            <form action="#" class="search-wrap">
			               <div class="form-group">
			                  <input type="search" class="form-control search" placeholder="Search">
			                  <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
			               </div>
			            </form>
			         </div>
		         </div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li class="active"><a href="{{route('frontend.index')}}">Home</a></li>
                                @foreach($prodcat as $c)
								<li><a href="{{url('frontend/showcat/'.$c->name)}}">
                                    {{$c->name}}
                                </a></li>
                                @endforeach
								<li><a href="{{route('frontend.about')}}">About</a></li>
                                @php
                                    $cartTotalQuantity = Cart::getTotalQuantity();
                                @endphp
                                @if(Auth::guard('webuser')->check())
                                    <li class="cart"><a href="{{route('frontend.logout')}}">Logout</a></li>
                                    <li class="cart"><a href="{{route('cart.list')}}"><i class="icon-shopping-cart"></i> Cart
                                        [<span class="cartc">{{$cartTotalQuantity}}</span>]
                                    </a>
                                    </li>
                                @else
                                    <li class="cart"><a href="{{route('frontend.login')}}">Login / Register</a></li>
                                @endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
