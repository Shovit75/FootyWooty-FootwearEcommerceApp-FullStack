@extends('frontend.layouts.main')
@section('content')
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="{{route('frontend.index')}}">Home</a></span> / <span>Checkout</span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="p-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<form action="{{route('checkout.store')}}" method="post" class="colorlib-form">
                            @csrf
							<h1>Billing Details</h1>
                            <br>
		              	<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="fname">First Name</label>
										<input type="text" name="firstname" id="lastname" class="form-control" placeholder="John" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lname">Last Name</label>
										<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Doe" required>
									</div>
								</div>
                                <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                            <input type="text" name="address" id="address" class="form-control" placeholder="Lake Street 235" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="city">Town/City</label>
                                            <input type="text" name="city" id="city" class="form-control" placeholder="Cupid Town" required>
                                    </div>
                                </div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="state">State/Province</label>
										<input type="text" name="state" id="state" class="form-control" placeholder="Adam's West" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="zip">Zip/Postal Code</label>
										<input type="text" name="zip" id="zip" class="form-control" placeholder="736002" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="email">E-mail Address</label>
										<input type="text" name="email" id="email" class="form-control" placeholder="Johndoe12@john.com" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="phone">Phone Number</label>
										<input type="text" name="phone" id="phone" class="form-control" placeholder="0123456789" required>
									</div>
								</div>
		               </div>
					</div>
                    @php
                      $totalqty = Cart::getTotalQuantity();
                      $totalamt = Cart::getTotal();
                    @endphp
					<div class="col-lg-4">
						<div class="row">
							<div class="col-md-12">
								<div class="cart-detail">
									<h2>Cart Summary</h2>
                                    @php
                                    $itemNames = []; // Create an empty array to store item names
                                    @endphp
									<ul>
										<li>
											<ul>
                                                @foreach ($cartItems as $item)
                                                @php
                                                $itemNames[] = $item->name; // Add item name to the array
                                                $subtotal = $item->price * $item->quantity;
                                                @endphp
												<li><span>{{$item->quantity}} x {{$item->name}}</span> <span>₹ {{$subtotal}}</span></li>
                                                @endforeach
											</ul>
										</li>
										<li><span>Order Total</span> <span>₹ {{$totalamt}}</span></li>
                                        <input type="hidden" name="order" value="{{ json_encode($itemNames) }}">
                                        <input type="hidden" name="total" value="{{$totalamt}}">
									</ul>
								</div>
						   </div>
						   <div class="w-100"></div>
						   <div class="col-md-12">
								<div class="cart-detail">
									<h2>Payment Method</h2>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="checkbox" checked disabled><span class="ml-3">Stripe Payment Available</span></label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
                                <a class="btn btn-outline-danger" href="{{route('cart.list')}}">Edit Cart</a>
                                <button class="btn btn-outline-success" type="submit">Place Order</button>
		                        </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
