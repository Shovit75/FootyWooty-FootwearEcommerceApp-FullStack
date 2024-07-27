@extends('frontend.layouts.main')

@section('content')

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="bread"><span><a href="{{route('frontend.index')}}">Home</a></span> / <span>Cart</span></p>
            </div>
        </div>
    </div>
</div>

    @if (Cart::getContent()->count() > 0)
      <div>
        <section class="h-100 gradient-custom">
            <div class="container">
              <div class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                  <div class="card mb-4">
                    <div class="card-header">
                      <h5 class="mb-0">Cart Items</h5>
                    </div>
                    <div class="card-body">
                        @foreach ($cartItems as $item)
                        <div id="cart-items" class="product-{{ $item->id }}">
                        <div class="row">

                        <div class="col-lg-8 col-md-6 mb-4 mb-lg-0">
                          <p>{{$item->description}}</p>
                          <p><strong>{{$item->name}}</strong></p>
                          <p class="text-start">
                            Price: ${{$item->price}}
                          </p>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                <div class="text-center">
                                {{--Update Cart Item--}}
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <label class="form-label" for="quantity">Quantity:</label>
                                    <input type="hidden" name="id" value="{{ $item->id}}" >
                                  <input type="text" name="quantity" value="{{ $item->quantity }}"
                                  class="w-16 text-center h-6 text-gray-800 outline-none rounded border border-blue-600" />
                                  <br><br>
                                  <button class="btn btn-outline-success m-2 update-item" data-id="{{ $item->id}}">Update</button>
                                </form>
                                </div>

                                {{--Remove Cart Item--}}
                                <div class="text-center">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" class="remove" value="{{ $item->id }}" name="id">
                                    <button class="btn btn-outline-danger m-2 remove-item" data-id="{{ $item->id }}">Remove</button>
                                </form>
                                </div>
                        </div>
                      </div>
                      <hr class="my-4" />
                    </div>
                    @endforeach
                    </div>
                  </div>
                  <div class="card mb-4 mb-lg-0">
                    <div class="card-body">
                      <p><strong>We accept</strong></p>
                      <img class="me-2" width="45px"
                        src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                        alt="Visa" />
                      <img class="me-2" width="45px"
                        src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                        alt="Mastercard" />
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="card-header py-3">
                      <h5 class="mb-0">Summary</h5>
                    </div>
                    <div class="card-body">
                        @php
                          $totalqty = Cart::getTotalQuantity();
                          $totalamt = Cart::getTotal();
                        @endphp
                      <ul class="list-group list-group-flush">
                        <li
                          class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                          Total Products:
                          <span id="gettotalqty">{{$totalqty}}</span>
                        </li>
                        <li
                          class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                          <div>
                            <strong>Total amount:</strong>
                          </div>
                          <strong>₹ <span id="gettotalamt">{{$totalamt}}</span></strong>
                        </li>
                      </ul>

                      <a href="{{ route('checkout')}}" class="btn btn-outline-success btn-lg btn-block">Go To Checkout</a>
                      <br>
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-danger btn-lg btn-block clear">Remove All Cart</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
      </div>
        @else
        <section class="section mt-5" id="products">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <h2 class="text-center mt-5 mb-3">Your cart is empty</h2>
        @endif
@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
    $('.remove-item').click(function(e) {
        e.preventDefault();
        var itemId = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: "{{ route('cart.remove') }}",
            data: { id: itemId, _token: "{{ csrf_token() }}" },
            success: function(response) {
                console.log(response.message); // Log the success message
                $('.product-' + itemId).remove();
                //work for total products, CartCount and subtotal
                $('.cartc').html(response.cartCount);
                $('#gettotalqty').html(response.cartCount);
                $('#gettotalamt').html(response.totalamt);
            },
            error: function(error) {
                console.error(error);
            }
        });
    });

    $('.update-item').click(function(e) {
        e.preventDefault();
        var itemId = $(this).data('id');
        var newQuantity = $(this).closest('.text-center').find('input[name="quantity"]').val();
        $.ajax({
            type: 'POST',
            url: "{{ route('cart.update') }}",
            data: { id: itemId, quantity: newQuantity, _token: "{{ csrf_token() }}" },
            success: function(response) {
                console.log(response.message);
                // //work for total products, CartCount and subtotal
                $('.cartc').html(response.cartCount);
                $('#gettotalqty').html(response.cartCount);
                $('#gettotalamt').html(response.totalamt);
            },
            error: function(error) {
                console.error(error);
            }
        });
    });

});

</script>

@endsection
