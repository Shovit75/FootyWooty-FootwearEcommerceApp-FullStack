@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ __('Welcome!') }}</h1>
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if(Auth::check())
                        <p class="text-lead text-light">
                            {{ __(' You are already Authenticated. ') }}
                        </p>
                        @else
                        <p class="text-lead text-light">
                            {{ __('First Migrate Tables.') }}
                        </p>
                        <p class="text-lead text-light">
                            {{ __('Then, Migrate Seeders for Login Credentials') }}
                        </p>
                        <div class="text-center mb-4">
                            <form action="{{ route('dbseed') }}" method="POST">
                                @csrf
                                <button class="btn" type="submit">Seed Database</button>
                            </form>
                        </div>
                        <p class="text-lead text-light">
                            {{ __('Login To Access Backend.') }}
                        </p>
                        <div class="text-center mb-4">
                            <a href="{{ route('login') }}">Login Page</a>
                        </div>
                        @endif
                        <p class="text-lead text-light">
                            {{ __('Navigate to Frontend.') }}
                        </p>
                        <div class="text-center">
                            <a href="{{ route('frontend.index') }}">FootyWooty.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
