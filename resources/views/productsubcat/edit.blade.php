@extends('layouts.app', ['page' => __('Product SubCategories'), 'pageSlug' => 'prodsubcat'])

@section('content')
<div class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Edit Product Sub-Categories</h4>
      </div>
      <div class="card-body">
        <div class="card">
              <form action="{{url('productsubcat/update/'.$prodsubcat->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Name of the Product Sub-Category</label>
                  <input type="text" class="form-control" value="{{$prodsubcat->name}}" name="name" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Select Product Sub-Category</label>
                    <select name="product_categories_id" id="select" class="form-control">
                        @foreach ($prodcat as $p)
                            <option value="{{$p->id}} {{ $prodsubcat->prod_subcat->contains($p) ? 'selected' : '' }}">{{$p->name}}</option>
                        @endforeach
                    </select>
                  </div>
                <div>
                  <label for="image">Image of the Product</label><br><br>
                  <img src="/storage/{{$prodsubcat->image}}" width="100" alt=""><br><br>
                  <input type="file" name="image" id="image">
                </div><br>
                <button type="submit" class="btn btn-primary">Update Sub-Category</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection
