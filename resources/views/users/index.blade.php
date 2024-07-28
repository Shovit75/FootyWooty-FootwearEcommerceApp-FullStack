@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')

<div class="content">
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Users Table</h4>
                    </div>
                    {{-- <div class="col-4 text-right">
                        <a href="#" class="btn btn-sm btn-primary">Add user</a>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">

                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Roles Assigned</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $u)
                            <tr>
                                <td class="text-center">{{$u->name}}</td>
                                <td class="text-center">{{$u->email}}</td>
                                <td class="text-center">
                                    @if ($u->roles->count() > 0)
                                        @foreach ($u->roles as $r)
                                            {{$r->name}}<br>
                                        @endforeach
                                    @else
                                        No roles given
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="/users/edit/{{$u->id}}">Edit</a>
                                            <a class="dropdown-item" href="/users/delete/{{$u->id}}">Delete</a>
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
    </div>
    <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Create User</h4>
          </div>
          <div class="card-body">
            <form action="{{route('user.store')}}" method="POST">
              @csrf
              <div class="form-group">
                @error('name')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <label for="name">Name of the User</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name">
              </div>
              <div class="form-group">
                @error('email')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <label for="description">Email of the User</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email">
              </div>
              <div class="form-group">
                @error('password')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <label for="password">Password of the User</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
              </div>
              <div class="form-group">
                @error('roles')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <label for="roles">Role assigned for the User</label><br>
                <select name="roles" id="my-dropdown" class="form-control" aria-label="Default select example">
                    @foreach ($roles as $p)
                    <option class="form-control" value="{{$p->id}}">{{$p->name}}</option>
                    @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Create User</button>
            </form>
          </div>
        </div>
      </div>
</div>

</div>

@endsection
