@extends('layouts/layoutWithoutbars')

@section('TITLE', 'Login | Rexo Pro')


@section('MAIN')

    <div class="auth-main">
        <div class="auth-wrapper v1">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="text-center">
                            <a href="#"><img src="{{ asset('images/logo-dark.svg') }}" alt="Logo" /></a>
                        </div>
                        <div class="saprator my-3"></div>
                        <h4 class="text-center f-w-500 mb-3">Login with your email</h4>
                        <!-- Main error message -->
                        @if ($errors->has('message'))
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $errors->first('message') }}
                            </div>
                        @endif
                        <form action="{{ route('login.perform') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="Email Address" value="{{ old('email') }}" />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password"
                                    placeholder="Password" />
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->


@endsection
