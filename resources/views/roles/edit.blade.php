@extends('layouts.app', ['page' => __('roles'), 'pageSlug' => 'roles'])

@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
          <h4 class="card-title">Create Roles</h4>
        </div>
        <div class="card-body">
          <form action="{{url('/user/roles/update/'.$roles->id)}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Name of the Role</label>
              <input type="text" class="form-control" name="name" value="{{$roles->name}}" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
              <label for="description">Permissions assigned for the Role</label><br>
              <select name="permissions[]" id="my-dropdown" multiple class="form-control" aria-label="Default select example">
                  @foreach ($permissions as $p)
                  <option class="form-control" value="{{$p->id}}">{{$p->name}}</option>
                  @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Role</button>
          </form>
        </div>
      </div>
</div>
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
