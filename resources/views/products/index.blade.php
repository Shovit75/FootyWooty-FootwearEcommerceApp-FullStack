@extends('layouts.app', ['page' => __('products'), 'pageSlug' => 'products'])

@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Products Table</h4>
      </div>
      {{-- <div class="col-2 text-right">
        <a href="#" class="btn btn-sm btn-primary">Add user</a>
      </div> --}}
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter">
            <thead class="text-primary">
              <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Description</th>
                <th class="text-center">Price</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Image</th>
                <th class="text-center">Product Category</th>
                <th class="text-center">Status</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $p)
                <tr>
                  <td class="text-center">{{$p->name}}</td>
                  <td class="text-center">{{$p->description}}</td>
                  <td class="text-center">{{$p->price}}</td>
                  <td class="text-center">{{$p->quantity}}</td>
                  <td class="text-center"><img src="/storage/{{$p->image}}" height="100" width="100"></td>
                  @foreach ($p->prod_cat as $pr)
                  <td class="text-center">{{$pr->name}}</td>
                  @endforeach
                  <td class="text-center">
                    <input type="checkbox" data-id="{{ $p->id }}" data-status="{{$p->status}}" name="status" class="js-switch" id="status" {{ $p->status == 1 ? 'checked=' : '' }}>
                </td>
                  <td class="text-center">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="/product/edit/{{$p->id}}">Edit</a>
                            <a class="dropdown-item" href="/product/delete/{{$p->id}}">Delete</a>
                        </div>
                    </div>
                </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="mr-2 row justify-content-end">
        {{$products->onEachSide(1)->links()}}
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Create Product</h4>
      </div>
      <div class="card-body">
        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Name of the Product</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <label for="description">Description of the Product</label>
            <textarea class="form-control" name="description" placeholder="Enter Description" cols="5" rows="5" required></textarea>
          </div>
          <div class="form-row">
          <div class="col-md-6 form-group">
            <label for="price">Price of the Product</label>
            <input type="number" class="form-control" name="price" placeholder="Enter Price" required>
          </div>
          <div class="col-md-6 form-group">
            <label for="quantity">Quantity of the Product</label>
            <input type="number" class="form-control" name="quantity" placeholder="Enter Quantity" required>
          </div>
          </div>
          <div class="form-group">
            <label for="size">Select Multiple Product Sizes</label>
            <select name="size[]" class="form-control selectpicker" multiple required>
                @foreach ($prodattr as $attribute)
                @if($attribute->name=="Size"){
                        @foreach (json_decode($attribute->options) as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                }
                @endif
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="color">Select Multiple Product Colours</label>
            <select name="color[]" class="form-control selectpicker" multiple required>
                @foreach ($prodattr as $attribute)
                    @if($attribute->name=="Color"){
                            @foreach (json_decode($attribute->options) as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                    }
                    @endif
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="quantity">Select Product Category</label>
            <select name="categories" class="form-control">
                @foreach ($prodcat as $p)
                    <option value="{{$p->id}}">{{$p->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="quantity">Select Product Sub-Category</label>
            <select name="subcategories" class="form-control">
                @foreach ($prodsubcat as $p)
                    <option value="{{$p->id}}">{{$p->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option name="status" value="0">InActive</option>
                <option name="status" value="1">Active</option>
            </select>
          </div>
          <div>
            <label for="image">Image of the Product</label><br>
            <input type="file" name="image" id="image" required>
          </div><br>
          <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
{{--For Status--}}

<script>
    $(document).ready(function(){
        $('.js-switch').change(function () {
            var productId = $(this).attr("data-id");
            var status = $(this).attr("data-status");
            console.log(status);
            var toggle = 0;

            let userId = $(this).data('id');
            if(status == "1" || status == 1) {
                toggle = 0;
            } else {
                toggle = 1;
            }
            console.log(toggle);
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ url('/product/changeStatus/') }}' + "/" + productId + "/" + toggle,
                success: function (data) {
                    console.log(data.message);
                    location.reload();
                }
            });
        });
    });
</script>

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
