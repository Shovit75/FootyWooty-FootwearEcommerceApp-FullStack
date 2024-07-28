@extends('layouts.app', ['page' => __('Banner Page'), 'pageSlug' => 'banners'])

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Banners Table</h4>
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
                <th class="text-center">Image</th>
                <th class="text-center">Headline1</th>
                <th class="text-center">Headline2</th>
                <th class="text-center">Headline3</th>
                <th class="text-center">Link</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($banner as $b)
                <tr>
                  <td class="text-center">{{$b->name}}</td>
                  <td class="text-center"><img src="/storage/{{$b->image}}" alt="" width="100"></td>
                  <td class="text-center">{{$b->headline}}</td>
                  <td class="text-center">{{$b->headline2}}</td>
                  <td class="text-center">{{$b->headline3}}</td>
                  <td class="text-center">{{$b->link}}</td>
                  <td class="text-center">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="/banner/edit/{{$b->id}}">Edit</a>
                            <a class="dropdown-item" href="/banner/delete/{{$b->id}}">Delete</a>
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
        <h4 class="card-title">Create Banner</h4>
      </div>
      <div class="card-body">
        <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            @error('name')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <label for="name">Name of the Banner</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name">
          </div>
          <div class="form-group">
            @error('headline')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <label for="headline">Headline 1 (Topmost)</label>
            <textarea class="form-control" name="headline" id="" cols="30" rows="10"></textarea>
          </div>
          <div class="form-group">
            @error('headline2')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <label for="headline2">Headline 2 (Middle)</label>
            <textarea name="headline2" class="form-control" id="" cols="30" rows="10"></textarea>
          </div>
          <div class="form-group">
            @error('headline3')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <label for="headline3">Headline 2 (Last)</label>
            <textarea name="headline3" class="form-control" id="" cols="30" rows="10"></textarea>
          </div>
          <div class="form-row">
          <div class="form-group col-md-4">
            @error('link')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <label for="link">Link</label>
            <input type="text" class="form-control" name="link" placeholder="Enter Link">
          </div>
          <div class="col-md-8">
            @error('image')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <label for="image">Image of the Banner</label><br>
            <input type="file" name="image" id="image">
          </div>
        </div>
          <button type="submit" class="btn btn-primary">Create Banner</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
