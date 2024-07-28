@extends('layouts.app', ['page' => __('Product Attributes Page'), 'pageSlug' => 'productsattr'])

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Attributes Table</h4>
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
                <th class="text-center">Options</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($prodattr as $p)
                <tr>
                  <td class="text-center">{{$p->name}}</td>
                  <td class="text-center">{{$p->options}}</td>
                  <td class="text-center">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="/productattribute/edit/{{$p->id}}">Edit</a>
                            <a class="dropdown-item" href="/productattribute/delete/{{$p->id}}">Delete</a>
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
    <div class="mr-2 row justify-content-end">
        {{-- {{$prodattr->onEachSide(1)->links()}} --}}
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Create Attribute</h4>
      </div>
      <div class="card-body">
        <form action="{{route('attribute.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              @error('name')
                <div class="text-danger">{{$message}}</div>
              @enderror
            <label for="name">Name of the Attribute</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="option">Options of the Attribute / Minimum 2 (Two) Required</label>
            <input type="text" class="form-control" name="option[]" placeholder="Enter Option 1" required>
            <input type="text" class="form-control" name="option[]" placeholder="Enter Option 2" required>
            <div class="opt" ></div>
            <br>
            <a href="#" class="ml-3 add">Add More Options</a>
            <!-- Add more input fields for additional options as needed -->
          </div>
          <button type="submit" class="btn btn-primary">Create Attribute</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('.add').click(function(e) {
        e.preventDefault(); // Prevent the default link behavior
        // Create a new input field for the option
        var newOptionInput = $('<div> <br> <span class="row container"> <input type="text" class="form-control col-7" name="option[]" placeholder="Enter New Option" required><a href="#" class="form-control btn-danger ml-3 remove col-4">Remove</a> </span> </div>');
        // Append the new input field to the options container
        $('.opt').append(newOptionInput);
    });
    $('.opt').on('click', '.remove', function(e) {
        e.preventDefault();
        // Remove the closest div containing the input and the link
        $(this).closest('div').remove();
    });
});
</script>
@endsection
