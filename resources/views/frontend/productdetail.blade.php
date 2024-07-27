@extends('frontend.layouts.main')
@section('content')

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="{{route('frontend.index')}}">Home</a></span> / <span>Product Details</span></p>
					</div>
				</div>
			</div>
		</div>

		<div class="p-5">
			<div class="container">
				<div class="row product-detail-wrap">
					<div class="col-sm-6">
                        <img src="/storage/{{$products->image}}" height="420px" width="100%" alt="">
					</div>
					<div class="col-sm-6">
						<div class="product-desc">
						<h3>Name: {{$products->name}}</h3>
						<p class="price">
							<span>Price : ₹ {{$products->price}}</span>
						</p>
						<p>Product Description: {{$products->description}}</p>
                        <p>In Stock: {{$products->quantity}}</p>
	                {{-- <a href="{{route('cart.store')}}" class="">Add to Cart</a> --}}
                    @if(Auth::guard('webuser')->check())
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $products->id }}" name="id">
                        <input type="hidden" value="{{ $products->name }}" name="name">
                        <input type="hidden" value="{{ $products->price }}" name="price">
                        <input type="hidden" value="{{ $products->image }}"  name="image">
						<div class="form-row">
						<div class="col-md-2">
                            <label class="form-group">Quantity: </label>
                        {{-- <button class=" text-white text-sm bg-blue-800 rounded">Add To Cart</button> --}}
						</div>
						<div class="col-md-8">
                            <input class="form-control" type="text" value="1" name="quantity"><br>
						</div>
							<p class="addtocart">
								<button class="btn btn-primary btn-addtocart">Add To Cart</button>
							</p>
						</div>
                    </form>
                    @else
                        <a class="btn btn-primary" href="{{route('frontend.login')}}">Login to Purchase</a>
                    @endif
						</div>
					</div>
				</div>
			</div>
		</div>

        <!-- Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Success</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="btn btn-danger" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Product has been successfully added to your cart.
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('script')
<script>
$(document).ready(function(){
    $('.addtocart').click(function (event) {
        event.preventDefault(); // Prevent the default form submission

        var form = $(this).closest('form'); // Find the closest form to the clicked button
        var formData = form.serialize(); // Serialize form data

        $.ajax({
            type: "POST",
            data: formData, // Send the serialized form data
            url: form.attr('action'), // Use the form's action URL
            success: function (response) {
                // Update the cart count element with the new cart count in the header
                $('.cartc').html(response.cartCount);
                // Show a Bootstrap modal
                $('#successModal').modal('show');
            }
        });
    });
});
</script>
@endsection

