@extends('layouts.app', ['page' => __('permissions'), 'pageSlug' => 'permissions'])

@section('content')
<div class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Edit Permission</h4>
      </div>
      <div class="card-body">
        <div class="card">
              <form action="{{url('user/permissions/update/'.$permissions->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Name of the Permission</label>
                  <input type="text" class="form-control" value="{{$permissions->name}}" name="name" placeholder="Enter Name" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Permission</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection
