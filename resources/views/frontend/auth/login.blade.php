@extends('frontend.layouts.main')
@section('content')

<div class="login-form mt-5">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger text-center">
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body text-center">
                        <form action="{{route('frontend.signin')}}" method="POST">
                            @csrf
                            <div>
                                <label for="name">Name</label>
                                <div>
                                    <input type="text" id="name" class="form-control" name="name" required><br>
                                </div>
                            </div>
                            <div>
                                <label for="password">Password</label>
                                <div>
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="m-3">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                    </div>
                    </form>
                    <div class="text-center pb-5">
                        <a href="{{route('frontend.register')}}">Register User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</div>

@endsection
