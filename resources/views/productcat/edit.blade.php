@extends('layouts.app', ['page' => __('Product Categories'), 'pageSlug' => 'prodcat'])

@section('content')
<div class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Edit Product Category</h4>
      </div>
      <div class="card-body">
        <div class="card">
              <form action="{{url('productcat/update/'.$prodcat->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Name of the Product Category</label>
                  <input type="text" class="form-control" value="{{$prodcat->name}}" name="name" placeholder="Enter Name" required>
                </div>
                <div>
                  <label for="image">Image of the Product</label><br><br>
                  <img src="/storage/{{$prodcat->image}}" width="100" alt=""><br><br>
                  <input type="file" name="image" id="image">
                </div><br>
                <button type="submit" class="btn btn-primary">Update Product</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection
