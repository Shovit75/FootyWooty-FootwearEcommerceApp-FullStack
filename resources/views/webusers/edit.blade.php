@extends('layouts.app', ['page' => __('webuser Page'), 'pageSlug' => 'webuser'])

@section('content')
<div class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Edit Webuser</h4>
      </div>
      <div class="card-body">
        <div class="card">
              <form action="{{url('webuser/update/'.$webuser->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    @error('name')
                <div class="text-danger">
                  {{$message}}
                </div>
                @enderror
                    <label for="name">Name of the Webuser</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{$webuser->name}}">
                </div>
                <div class="form-group">
                @error('password')
                <div class="text-danger">
                  {{$message}}
                </div>
                @enderror
                    <label for="password">Password of the Webuser</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter new Password">
                </div>
                <button type="submit" class="btn btn-primary">Update Webuser</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection
