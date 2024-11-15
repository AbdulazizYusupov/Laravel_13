@extends('layouts.app')

@section('title' ,'Login Page')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form method="POST" action="/login">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" required class="form-control">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" required class="form-control">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Login</button>
                                <label><strong>Haven't account yet ? </strong></label>
                                <a href="{{route('registerPage')}}" class="btn btn-outline-success">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
