@extends('layouts.app', ['page' => __('roles'), 'pageSlug' => 'roles'])

@section('content')

<div class="content">
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Roles Table</h4>
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
                                <th scope="col" class="text-center">Permissions Assigned</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $r)
                            <tr>
                                <td class="text-center">{{$r->name}}</td>
                                <td class="text-center">
                                    @foreach ($r->permissions as $p)
                                    {{$p->name}}<br>
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="/user/roles/edit/{{$r->id}}">Edit</a>
                                            <a class="dropdown-item" href="/user/roles/delete/{{$r->id}}">Delete</a>
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
            <h4 class="card-title">Create Roles</h4>
          </div>
          <div class="card-body">
            <form action="{{route('role.store')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">Name of the Role</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
              </div>
              <div class="form-group">
                <label for="permissions">Permissions assigned for the Role</label><br>
                <select name="permissions[]" id="my-dropdown" class="my-custom-multiselect" multiple class="form-control" required>
                    @foreach ($permissions as $p)
                    <option class="form-control optionp" value="{{$p->id}}">{{$p->name}}</option>
                    @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Create Role</button>
            </form>
          </div>
        </div>
      </div>
</div>

</div>

<style>
     .multiselect-container {
        background-color: #000000;
    }
</style>

@endsection
@section('script')

{{-- Multi Select --}}
<link href={{asset("js/multiselect/multiselect.css")}} rel="stylesheet">
<script src={{asset("js/multiselect/multiselect.js")}}></script>
<script>
    var drop1 = $('#my-dropdown').multiselect({
        onChange: function(option, checked) {
        const selectedValues = $('#my-dropdown').val();
        }
    });
</script>

@endsection
