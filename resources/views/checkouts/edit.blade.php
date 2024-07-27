@extends('layouts.app', ['page' => __('Checkout Page'), 'pageSlug' => 'checkout'])

@section('content')
<div class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Checkout</h4>
      </div>
      <div class="card-body">
        <div class="card">
              <form action="{{url('checkout/update/'.$checkout->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" value="{{$checkout->firstname}}" name="firstname" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="lname">Last Name</label>
                          <input type="text" class="form-control" value="{{$checkout->lastname}}" name="lastname" required>
                      </div>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" class="form-control" id="" cols="30" rows="10">{{$checkout->address}}</textarea>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="city">City / Town</label>
                        <input type="text" class="form-control" value="{{$checkout->city}}" name="city" required>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="state">State / Province</label>
                          <input type="text" class="form-control" value="{{$checkout->state}}" name="state" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="zip">ZIP / Postal Code</label>
                        <input type="text" class="form-control" value="{{$checkout->zip}}" name="zip" required>
                      </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" value="{{$checkout->email}}" name="email" required>
                    </div>
                      <div class="form-group col-md-6">
                          <label for="phone">Phone</label>
                          <input type="text" class="form-control" value="{{$checkout->phone}}" name="phone" required>
                      </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="order">Ordered Items</label>
                        <textarea name="order" class="form-control" id="" cols="30" rows="10">{{$checkout->order}}</textarea>
                    </div>

                  <div class="form-group col-md-4">
                    <label for="total">Total</label>
                    <input type="text" class="form-control" value="{{$checkout->total}}" name="total" required>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Update checkout Partner</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection
