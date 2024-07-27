@extends('layouts.app', ['page' => __('products'), 'pageSlug' => 'products'])

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Products According to the Category</h4>
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
                  <td class="text-center"><img src="/storage/{{$p->image}}" height="90" width="100"></td>
                  @foreach ($p->prod_cat as $pr)
                  <td class="text-center">{{$pr->name}}</td>
                  @endforeach
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
          <br>
        </div>
      </div>
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
            <textarea class="form-control" name="description" placeholder="Enter Description" cols="10" rows="10" required></textarea>
          </div>
          <div class="form-group">
            <label for="price">Price of the Product</label>
            <input type="text" class="form-control" name="price" placeholder="Enter Price" required>
          </div>
          <div class="form-group">
            <label for="quantity">Quantity of the Product</label>
            <input type="text" class="form-control" name="quantity" placeholder="Enter Quantity" required>
          </div>
          <div class="form-group">
            <label for="quantity">Select Product Category</label>
            <select name="categories" class="form-control">
                @foreach ($prodcat as $p)
                    <option value="{{$p->id}}">{{$p->name}}</option>
                @endforeach
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
