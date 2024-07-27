@extends('frontend.layouts.main')
@section('content')

<div class="sale">
    <div class="container">
        <div class="text-center">
            <h3 style="color: lightseagreen; font-family: Courier New, monospace;">Checkout the best Footwear from the Platform</h3>
        </div>
    </div>
</div>
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="{{route('frontend.index')}}">Home</a></span> / <span>All Products</span></p>
					</div>
				</div>
			</div>
		</div>

		<div class="breadcrumbs-two">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs-img" style="background-image: url('/storage/background/asd.jpg');">
						</div>
						<div class="menu text-center">
							<p><a href="{{route('frontend.showallproducts')}}">Purchase the best Footwear for Men & Women here in this Platform</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-featured">
            <div class="container">
                <div class="row">
                    @foreach($prodcat as $p)
                    <div class="col-sm-6 text-center">
                        <div class="featured">
                            <a href="{{url('frontend/showcat/'.$p->name)}}">
                            <div class="featured-img featured-img-2" style="background-image: url('/storage/{{$p->image}}');">
                                <h2 class="margin-top-100">{{ $p->name }}'s collection</h2>
                            </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <style>
            @media (min-width: 1024px) {
                .colorlib-product {
                    margin: -90px;
                }
            }
        </style>
        <div class="colorlib-product">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-xl-3">
						<div class="row">
                            <div class="col-sm-12">
								<div class="side border mb-1">
									<h3>Sorting</h3>
									<ul>
										<li><a href="#" id="sort-asc">Price - Low To High</a></li>
										<li><a href="#" id="sort-desc">Price - High To Low</a></li>
                                        <li><a href="#" id="latest">Latest / Newest</a></li>
									</ul>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="side border mb-1">
									<h3>Size/Width</h3>
									<div class="block-26 mb-2">
										<h4>Size</h4>
					               <ul id="size-select">
                                    <li><a href="#" data-size="6">6</a></li>
                                    <li><a href="#" data-size="7">7</a></li>
                                    <li><a href="#" data-size="8">8</a></li>
                                    <li><a href="#" data-size="9">9</a></li>
                                    <li><a href="#" data-size="10">10</a></li>
                                    <li><a href="#" data-size="11">11</a></li>
                                    <li><a href="#" data-size="12">12</a></li>
					               </ul>
					            </div>
					            {{-- <div class="block-26">
										<h4>Width</h4>
					               <ul>
					                  <li><a href="#">M</a></li>
					                  <li><a href="#">W</a></li>
					               </ul>
					            </div> --}}
								</div>
							</div>
							<div class="col-sm-12">
								<div class="side border mb-1">
									<h3>Colors</h3>
									<ul id="color-select">
										<li><a href="#" data-value="Red">Red</a></li>
										<li><a href="#" data-value="Blue">Blue</a></li>
										<li><a href="#" data-value="Yellow">Yellow</a></li>
										<li><a href="#" data-value="Green">Green</a></li>
										<li><a href="#" data-value="White">White</a></li>
										<li><a href="#" data-value="Black">Black</a></li>
										<li><a href="#" data-value="Orange">Orange</a></li>
										<li><a href="#" data-value="Brown">Brown</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

                    <div class="col-lg-9 col-xl-9">
                        <div id="product-list">
                        @if($products->isNotEmpty())
                        <div class="row row-pb-md">
                            @foreach($products as $product)
                            <div class="col-lg-4 mb-4 text-center">
                                <div class="product-entry border">
                                    <a href="{{url('frontend/proddetail/'.$product->id)}}" class="prod-img">
                                        <img src="/storage/{{ $product->image }}" width="100%" height="280px" alt="{{ $product->name }}">
                                    </a>
                                    <div class="desc">
                                        <h2><a href="{{url('frontend/proddetail/'.$product->id)}}">{{ $product->name }}</a></h2>
                                        <span class="price">₹ {{ $product->price }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                            <p class="text-center mt-5">No products added</p>
                        @endif
                    </div>
                    </div>
				</div>

                <div class="row mr-5 justify-content-end">
                    {{$products->onEachSide(1)->links()}}
                </div>
			</div>
		</div>


@endsection

@section('script')
<script>

$(document).ready(function() {
    $('#sort-asc').click(function(e) {
            e.preventDefault();

            // Make an AJAX request to filter products by size
            $.ajax({
                type: 'GET',
                url: '/sort-price-allasc',
                success: function(response) {
                    // Update the product listing with filtered products
                    $('#product-list').html(response);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });

    $('#sort-desc').click(function(e) {
            e.preventDefault();

            // Make an AJAX request to filter products by size
            $.ajax({
                type: 'GET',
                url: '/sort-price-alldesc',
                success: function(response) {
                    // Update the product listing with filtered products
                    $('#product-list').html(response);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });

    $('#latest').click(function(e) {
            e.preventDefault();

            // Make an AJAX request to filter products by size
            $.ajax({
                type: 'GET',
                url: '/sort-price-alllatest',
                success: function(response) {
                    // Update the product listing with filtered products
                    $('#product-list').html(response);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });

    $('#size-select a').click(function(e) {
            e.preventDefault();
            var selectedSize = $(this).data('size');

            // Make an AJAX request to filter products by size
            $.ajax({
                type: 'GET',
                url: '/filter-products-by-allsize',
                data: { size: selectedSize },
                success: function(response) {
                    // Update the product listing with filtered products
                    $('#product-list').html(response);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });

    $('#color-select a').click(function(e) {
            e.preventDefault();
            var selectedColor = $(this).data('value');

            // Make an AJAX request to filter products by size
            $.ajax({
                type: 'GET',
                url: '/filter-products-by-allcolor',
                data: { color: selectedColor },
                success: function(response) {
                    // Update the product listing with filtered products
                    $('#product-list').html(response);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
});
</script>
@endsection
