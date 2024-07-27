@extends('layouts.app', ['page' => __('Product Sub-Categories'), 'pageSlug' => 'prodsubcat'])

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Products Sub-Categories Table</h4>
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
                <th class="text-center">Image</th>
                <th class="text-center">Product Count</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($prodsubcat as $p)
                <tr>
                  <td class="text-center">{{$p->name}}</td>
                  <td class="text-center"><img src="/storage/{{$p->image}}" height="90" width="100"></td>
                  <td class="text-center">
                    <a href="{{url('/productsubcat/productsubcatshow/'.$p->id)}}">{{ $p->prod_subcat()->count() }}</a>
                </td>
                  <td class="text-center">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="/productsubcat/edit/{{$p->id}}">Edit</a>
                            <a class="dropdown-item" href="/productsubcat/delete/{{$p->id}}">Delete</a>
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
    <div class="mr-2 row justify-content-end">{{$prodsubcat->onEachSide(1)->links()}}</div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Create Product Sub-Category</h4>
      </div>
      <div class="card-body">
        <form action="{{route('productsubcat.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Name of the Product Sub-Category</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <label for="quantity">Select Product Category</label>
            <select name="product_categories_id" id="select" class="form-control">
                @foreach ($prodcat as $p)
                    <option value="{{$p->id}}">{{$p->name}}</option>
                @endforeach
            </select>
          </div>
          <div>
            <label for="image">Image of the Product Sub-Category</label><br>
            <input type="file" name="image" id="image" required>
          </div><br>
          <button type="submit" class="btn btn-primary">Create Product Sub-Category</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')

@endsection
