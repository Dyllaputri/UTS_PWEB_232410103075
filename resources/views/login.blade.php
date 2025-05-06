@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container vh-100 d-flex align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-md-5">
                <div class="card bg-light shadow-sm">
                    <div class="card-header text-center bg-danger text-white">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form method="POST" action="{{ url('/login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-danger w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
