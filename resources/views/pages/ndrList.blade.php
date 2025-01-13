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
                        {{-- <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">Create User</h2>
                </div>
              </div> --}}
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->


        </div>
    </div>
@endsection
