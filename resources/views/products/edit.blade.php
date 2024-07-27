@extends('layouts.app', ['page' => __('products'), 'pageSlug' => 'products'])

@section('content')
<div class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Edit Product</h4>
      </div>
      <div class="card-body">
        <div class="card">
              <form action="{{url('product/update/'.$products->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="name">Name of the Product</label>
                    <input type="text" class="form-control" value="{{$products->name}}" name="name" placeholder="Enter Name" required>
                </div>
                <div class="form-group col-md-9">
                    <label for="description">Description of the Product</label>
                    <textarea class="form-control" name="description" cols="10" rows="5" required>{{$products->description}}</textarea>
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="price">Price of the Product</label>
                    <input type="number" class="form-control" value="{{$products->price}}" name="price" placeholder="Enter Price" required>
                  </div>
                <div class="form-group col-md-6">
                  <label for="quantity">Quantity of the Product</label>
                  <input type="number" class="form-control" name="quantity" value="{{$products->quantity}}" placeholder="Enter Quantity" required>
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="quantity">Select Product Category</label>
                    <select name="categories" class="form-control">
                        @foreach ($prodcat as $p)
                            <option value="{{$p->id}}" {{ $products->prod_cat->contains($p) ? 'selected' : '' }}>
                                {{$p->name}}
                            </option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="quantity">Select Product Sub-Category</label>
                    <select name="subcategories" class="form-control">
                        @foreach ($prodsubcat as $p)
                            <option value="{{$p->id}}" {{ $products->prod_subcat->contains($p) ? 'selected' : '' }}>
                                {{$p->name}}
                            </option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option name="status" value="0" {{ $products->status == 0 ? 'selected' : '' }}>InActive</option>
                        <option name="status" value="1" {{ $products->status == 1 ? 'selected' : '' }}>Active</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="size">Select Multiple Product Sizes</label>
                        <select name="size[]" class="form-control selectpicker" multiple>
                            @foreach ($prodattr as $attribute)
                            @if($attribute->name=="Size"){
                                @php
                                $selectedSizes = json_decode($products->size);
                                @endphp
                                    @foreach (json_decode($attribute->options) as $option)
                                        <option value="{{ $option }}" {{ in_array($option, $selectedSizes) ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                            }
                            @endif
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="color">Select Multiple Product Colours</label>
                        <select name="color[]" class="form-control selectpicker" multiple>
                            @foreach ($prodattr as $attribute)
                                @if($attribute->name=="Color"){
                                    @php
                                    $selectedColor = json_decode($products->color);
                                    @endphp
                                    @foreach (json_decode($attribute->options) as $option)
                                        <option value="{{ $option }}" {{ in_array($option, $selectedColor) ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                }
                                @endif
                            @endforeach
                        </select>
                      </div>
                </div>
                <div>
                  <label for="image">Image of the Product</label><br><br>
                  <img src="/storage/{{$products->image}}" width="100" alt=""><br><br>
                  <input type="file" name="image" id="image">
                </div><br>
                <button type="submit" class="btn btn-primary">Update Product</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection

@section('script')

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {
    $('.selectpicker').selectpicker();
});

</script>

@endsection
