@extends('layouts.app', ['page' => __('trusted Page'), 'pageSlug' => 'trusted'])

@section('content')
<div class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Edit Trusted Partner</h4>
      </div>
      <div class="card-body">
        <div class="card">
              <form action="{{url('trusted/update/'.$trusted->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  @error('name')
                   <div class="text-danger">{{$message}}</div>
                  @enderror
                  <label for="name">Name of the Trusted Partner</label>
                  <input type="text" class="form-control" value="{{$trusted->name}}" name="name" placeholder="Enter Name">
                </div>
                <div>
                  @error('image')
                    <div class="text-danger">{{$message}}</div>
                  @enderror
                  <label for="image">Image of the Trusted Partner</label><br><br>
                  <img src="/storage/{{$trusted->image}}" width="100" alt=""><br><br>
                  <input type="file" name="image" id="image">
                </div><br>
                <button type="submit" class="btn btn-primary">Update Trusted Partner</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection
