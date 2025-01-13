@extends('layouts.mainLayout')

@section('MAIN')
    <div class="pc-container">

        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">User</a></li>
                                <li class="breadcrumb-item" aria-current="page">Create</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->


            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Create User</h5>
                        </div>
                        <div class="card-body">

                            <form class="row" action="{{ route('register.store') }}" method="POST">
                                @csrf
                                <div class="col-md-6">
                                    <!-- Full Name Input -->
                                    <div class="mb-3">
                                        <label class="form-label" for="userFullName">Full Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="userFullName" name="name" placeholder="Enter full name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Password Input -->
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="exampleInputPassword1" name="password" placeholder="Password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-4">Submit</button>
                                </div>

                                <div class="col-md-6">
                                    <!-- Email Address Input -->
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="exampleInputEmail1" name="email" placeholder="Enter email"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Number Input -->
                                    <div class="mb-3">
                                        <label class="form-label">Number</label>
                                        <input type="number"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            name="phone_number" placeholder="Number" value="{{ old('phone_number') }}">
                                        @error('phone_number')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>



                </div>

                <!-- [ form-element ] end -->
            </div>
        </div>
    </div>
@endsection
