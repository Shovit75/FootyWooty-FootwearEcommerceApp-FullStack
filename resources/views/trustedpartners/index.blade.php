@extends('layouts.app', ['page' => __('trusted Page'), 'pageSlug' => 'trusted'])

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Trusted Partners Table</h4>
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
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($trusted as $b)
                <tr>
                  <td class="text-center">{{$b->name}}</td>
                  <td class="text-center"><img src="/storage/{{$b->image}}" alt="" width="100"></td>
                  <td class="text-center">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="/trusted/edit/{{$b->id}}">Edit</a>
                            <a class="dropdown-item" href="/trusted/delete/{{$b->id}}">Delete</a>
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
        <h4 class="card-title">Create a Trusted Partner</h4>
      </div>
      <div class="card-body">
        <form action="{{route('trustedpartners.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Name of the Trusted Partner</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
          </div>
          <div>
            <label for="image">Image of the Trusted Partner</label><br>
            <input type="file" name="image" id="image" required>
          </div><br>
          <button type="submit" class="btn btn-primary">Create Trusted Partner</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
