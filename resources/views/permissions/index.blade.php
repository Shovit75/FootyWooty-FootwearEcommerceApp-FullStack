@extends('layouts.app', ['page' => __('permissions'), 'pageSlug' => 'permissions'])

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Permissions Table</h4>
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
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($permissions as $p)
                <tr>
                  <td class="text-center">{{$p->name}}</td>
                  <td class="text-center">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="/user/permissions/edit/{{$p->id}}">Edit</a>
                            <a class="dropdown-item" href="/user/permissions/delete/{{$p->id}}">Delete</a>
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
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Create Permission</h4>
      </div>
      <div class="card-body">
        <form action="{{route('permission.store')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name">Name of the Permission</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
          </div>
          <button type="submit" class="btn btn-primary">Create Permission</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
