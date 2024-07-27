@extends('layouts.app', ['page' => __('checkouts Page'), 'pageSlug' => 'checkouts'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Checkouts Table</h4>
      </div>
      {{-- <div class="col-2 text-right">
        <a href="#" class="btn btn-sm btn-primary">Add user</a>
      </div> --}}
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter">
            <thead class="text-primary">
              <tr>
                <th class="text-center">First Name</th>
                <th class="text-center">Last Name</th>
                <th class="text-center">Address</th>
                <th class="text-center">City</th>
                <th class="text-center">State</th>
                <th class="text-center">ZIP</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Ordered Items</th>
                <th class="text-center">Total</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($checkouts as $c)
                <tr>
                  <td class="text-center">{{$c->firstname}}</td>
                  <td class="text-center">{{$c->lastname}}</td>
                  <td class="text-center">{{$c->address}}</td>
                  <td class="text-center">{{$c->city}}</td>
                  <td class="text-center">{{$c->state}}</td>
                  <td class="text-center">{{$c->zip}}</td>
                  <td class="text-center">{{$c->email}}</td>
                  <td class="text-center">{{$c->phone}}</td>
                  <th class="text-center">{{$c->order}}</th>
                  <th class="text-center">{{$c->total}}</th>
                  <td class="text-center">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="/checkout/edit/{{$c->id}}">Edit</a>
                            <a class="dropdown-item" href="/checkout/delete/{{$c->id}}">Delete</a>
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
</div>
@endsection
