@extends('layouts.app', ['page' => __('webusers Page'), 'pageSlug' => 'webusers'])

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Webusers Table</h4>
      </div>
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
              @foreach ($webuser as $w)
                <tr>
                  <td class="text-center">{{$w->name}}</td>
                  <td class="text-center">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="/webuser/edit/{{$w->id}}">Edit</a>
                            <a class="dropdown-item" href="/webuser/delete/{{$w->id}}">Delete</a>
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
        <form action="{{route('webuser.store')}}" method="POST">
          @csrf
          <div class="form-group">
            @error('name')
            <div class="text-danger">
              {{$message}}
            </div>
            @enderror
            <label for="name">Name of the Webuser</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name">
          </div>
          <div class="form-group">
            @error('password')
            <div class="text-danger">
              {{$message}}
            </div>
            @enderror
            <label for="password">Password of the Webuser</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password">
          </div>
          <button type="submit" class="btn btn-primary">Create Webuser</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
