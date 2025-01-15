@extends('layouts.mainLayout')
@section('TITLE')
    NDR List
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
                                <li class="breadcrumb-item" aria-current="page">List</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <div class="row p-0">
                <!-- Base Style table start -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pt-3 pb-2">
                            <h3>NDR List</h3>

                        </div>
                        <div class="card-body">
                            <div class="dt-responsive table-responsive">
                                <table id="base-style" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Awb Number</th>
                                            <th>Received Date</th>
                                            <th>Courier Partner</th>
                                            <th>Latest Ndr Reason</th>
                                            <th>Customer Name</th>
                                            <th>Attempts</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>AWB123456</td>
                                            <td>2023-01-01</td>
                                            <td>FedEx</td>
                                            <td>Address Not Found</td>
                                            <td>John Doe</td>
                                            <td>2</td>
                                            <td><span class="badge bg-light-primary">Pending</span></td>
                                            <td>2023-01-01 10:00:00</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>AWB654321</td>
                                            <td>2023-01-02</td>
                                            <td>UPS</td>
                                            <td>Customer Not Available</td>
                                            <td>Jane Smith</td>
                                            <td>1</td>
                                            <td><span class="badge bg-light-success">Delivered</span></td>
                                            <td>2023-01-02 11:00:00</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>AWB789101</td>
                                            <td>2023-01-03</td>
                                            <td>DHL</td>
                                            <td>Damaged Package</td>
                                            <td>Mark Wilson</td>
                                            <td>1</td>
                                            <td><span class="badge bg-light-danger">Failed</span></td>
                                            <td>2023-01-03 14:00:00</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>AWB112233</td>
                                            <td>2023-01-04</td>
                                            <td>FedEx</td>
                                            <td>Delivered to Neighbor</td>
                                            <td>Emily Davis</td>
                                            <td>1</td>
                                            <td><span class="badge bg-light-success">Delivered</span></td>
                                            <td>2023-01-04 09:30:00</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>AWB445566</td>
                                            <td>2023-01-05</td>
                                            <td>UPS</td>
                                            <td>Out for Delivery</td>
                                            <td>Chris Brown</td>
                                            <td>3</td>
                                            <td><span class="badge bg-light-primary">Pending</span></td>
                                            <td>2023-01-05 08:45:00</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>AWB778899</td>
                                            <td>2023-01-06</td>
                                            <td>DHL</td>
                                            <td>Customer Rescheduled</td>
                                            <td>Susan Miller</td>
                                            <td>2</td>
                                            <td><span class="badge bg-light-secondary">In Transit</span></td>
                                            <td>2023-01-06 12:15:00</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>AWB991122</td>
                                            <td>2023-01-07</td>
                                            <td>FedEx</td>
                                            <td>Incomplete Address</td>
                                            <td>Michael Scott</td>
                                            <td>1</td>
                                            <td><span class="badge bg-light-danger">Failed</span></td>
                                            <td>2023-01-07 15:00:00</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>AWB223344</td>
                                            <td>2023-01-08</td>
                                            <td>UPS</td>
                                            <td>Delivered at Front Door</td>
                                            <td>Anna Taylor</td>
                                            <td>1</td>
                                            <td><span class="badge bg-light-success">Delivered</span></td>
                                            <td>2023-01-08 10:30:00</td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>AWB556677</td>
                                            <td>2023-01-09</td>
                                            <td>DHL</td>
                                            <td>Returned to Sender</td>
                                            <td>Peter Parker</td>
                                            <td>1</td>
                                            <td><span class="badge bg-light-danger">Failed</span></td>
                                            <td>2023-01-09 17:45:00</td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>AWB889900</td>
                                            <td>2023-01-10</td>
                                            <td>FedEx</td>
                                            <td>On Hold at Depot</td>
                                            <td>Mary Johnson</td>
                                            <td>2</td>
                                            <td><span class="badge bg-light-secondary">In Transit</span></td>
                                            <td>2023-01-10 13:20:00</td>
                                        </tr>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Awb Number</th>
                                            <th>Received Date</th>
                                            <th>Courier Partner</th>
                                            <th>Latest Ndr Reason</th>
                                            <th>Customer Name</th>
                                            <th>Attempts</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Base Style table end -->

            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/plugins/dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap5.min.js') }}"></script>

    <script>
        $('#base-style').DataTable();
    </script>
@endpush
