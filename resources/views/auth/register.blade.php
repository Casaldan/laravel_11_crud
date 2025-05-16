@extends('layouts.guest')

@section('content')
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="w-100" style="max-width: 400px;">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h2 class="text-center mb-4 fw-bold">Register</h2>
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first() }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" name="name" required autofocus class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" name="email" required class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" name="password" required class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-semibold">Register</button>
                </form>
                <div class="mt-3 text-center">
                    <span>Already have an account?</span>
                    <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
