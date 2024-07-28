@extends('frontend.layouts.main')
@section('content')
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="{{route('frontend.index')}}">Home</a></span> / <span>About</span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="pt-5 p-3">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-sm-6 mb-3">
						<div class="video colorlib-video" style="background-image: url(images/foot.jpg);">
							<a href="#"><i class="icon-play3"></i></a>
							<div class="overlay"></div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="about-wrap">
							<h2>Welcome to Footywooty - Your Ultimate Destination for Stylish and Comfortable Shoes !</h2>
							<p class="mt-4">
                            Explore Footywooty for a wide range of stylish and comfortable shoes.
                            Our user-friendly web app offers easy browsing, secure checkout, and real-time order tracking.
                            From trendy sneakers to elegant dress shoes, find your perfect pair and enjoy quality and comfort with every step.
                            </p>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
