@extends('layouts.app', ['page' => __('Banner Page'), 'pageSlug' => 'banners'])

@section('content')
<div class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Edit Banner</h4>
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
        <div class="card">
              <form action="{{url('banner/update/'.$banner->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Name of the Banner</label>
                  <input type="text" class="form-control" value="{{$banner->name}}" name="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="headline">Headline 1 (Topmost)</label>
                    <textarea class="form-control" name="headline" id="" cols="30" rows="10">{{$banner->headline}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="headline2">Headline 2 (Middle)</label>
                    <textarea name="headline2" class="form-control" id="" cols="30" rows="10">{{$banner->headline2}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="headline3">Headline 2 (Last)</label>
                    <textarea name="headline3" class="form-control" id="" cols="30" rows="10">{{$banner->headline3}}</textarea>
                  </div>
                  <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" name="link" value="{{$banner->link}}" placeholder="Enter Link">
                  </div>
                  <div class="col-md-8">
                    <label for="image">Image of the Banner</label><br>
                    <img src="/storage/{{$banner->image}}" alt="" width="100"><br><br>
                    <input type="file" name="image" id="image">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Banner</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection
