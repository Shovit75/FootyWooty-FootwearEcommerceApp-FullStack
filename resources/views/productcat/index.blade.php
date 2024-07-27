@extends('layouts.app', ['page' => __('Product Categories'), 'pageSlug' => 'prodcat'])

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Products Categories Table</h4>
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
              @foreach ($prodcat as $p)
                <tr>
                  <td class="text-center">{{$p->name}}</td>
                  <td class="text-center"><img src="/storage/{{$p->image}}" alt="" width="100"></td>
                  <td class="text-center">
                    <a href="{{url('/prodcat/prodcatshow/'.$p->id)}}">{{ $p->prod_cat()->count() }}</a>
                </td>
                  <td class="text-center">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="/productcat/edit/{{$p->id}}">Edit</a>
                            <a class="dropdown-item" href="/productcat/delete/{{$p->id}}">Delete</a>
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
    <div class="mr-2 row justify-content-end">{{$prodcat->onEachSide(1)->links()}}</div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Create Product Category</h4>
      </div>
      <div class="card-body">
        <form action="{{route('productcat.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Name of the Product Category</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
          </div>
          <div>
            <label for="image">Image of the Product Category</label><br>
            <input type="file" name="image" id="image" required><br><br>
          </div>
          <button type="submit" class="btn btn-primary">Create Product Category</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
