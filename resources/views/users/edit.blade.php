@extends('layouts.app', ['page' => __('users'), 'pageSlug' => 'users'])

@section('content')

<div class="content">
<div class="row">
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Update User</h4>
      </div>
      <div class="card-body">
      @if ($errors->any())
          <div class="alert alert-danger">
            <p>Errors:</p>
              <ol>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ol>
          </div>
      @endif
        <form action="{{url('/users/update/'.$user->id)}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name">Name of the User</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="description">Email of the User</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label for="password">Password of the User</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <label for="roles">Role assigned for the User</label><br>
            <select name="roles" id="my-dropdown" class="form-control" aria-label="Default select example">
                @foreach ($roles as $p)
                <option class="form-control" value="{{$p->id}}">{{$p->name}}</option>
                @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Update User</button>
        </form>
      </div>
    </div>
</div>
</div>
</div>
@endsection
