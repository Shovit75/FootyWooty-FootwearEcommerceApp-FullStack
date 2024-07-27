@extends('layouts.app', ['page' => __('Product Attributes Page'), 'pageSlug' => 'prodattr'])

@section('content')
<div class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Edit Attribute</h4>
      </div>
      <div class="card-body">
        <div class="card">
              <form action="{{url('productattribute/update/'.$prodattr->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Name of the attribute</label>
                  <input type="text" class="form-control" value="{{$prodattr->name}}" name="name" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label for="option">Options</label>
                    @foreach(json_decode($prodattr->options) as $option)
                    <br>
                    <div class="option-container">
                    <div class="row">
                        <div class="col-8">
                            <input type="text" class="form-control" name="option[]" value="{{$option}}" required>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-2">
                            <a href="#" id="rem" class="form-control btn-danger text-center">Remove</a>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    </div>
                    @endforeach
                </div>
                <div class="opt"></div>
                <div class="form-group">
                    <br><a href="#" class="add">Add More Options</a>
                </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Attribute</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('.option-container').on('click', '#rem', function (e) {
        e.preventDefault();
        $(this).closest('.option-container').remove(); // Remove the closest parent element with class "option-container"
    });

    $('.add').click(function(e) {
        e.preventDefault(); // Prevent the default link behavior
        // Create a new input field for the option
        var newOptionInput = $('<div> <br> <span class="row container"> <input type="text" class="form-control col-10" name="option[]" placeholder="Enter New Option" required> <a href="#" class="form-control btn-danger text-center ml-3 remove col-1">Remove</a> </span> </div>');
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

