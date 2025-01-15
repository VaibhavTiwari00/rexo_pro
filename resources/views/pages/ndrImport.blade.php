@extends('layouts.mainLayout')
@section('TITLE')
    NDR Import
@endsection

@section('CSSLINKS')
    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dropzone.min.css') }}" />
@endsection
@section('MAIN')
    <div class="pc-container">

        <div class="pc-content pt-0">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">NDR</a></li>
                                <li class="breadcrumb-item" aria-current="page">Import</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- prettier-ignore -->
          

            </div>
            <div class="row">
                <!-- [ file-upload ] start -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>File Upload</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('ndr.importdata') }}" class="dropzone">
                                @csrf
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                            </form>
                            <div class="text-center m-t-20">
                                <button class="btn btn-primary">Upload Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ file-upload ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('js/plugins/dropzone-amd-module.min.js') }}"></script>
@endpush
