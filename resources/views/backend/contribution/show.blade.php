@extends('backend.layout.app')
@section('title', 'All Projects')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" /> --}}
    <style>
        .table-responsive {
            overflow-x: auto;
        }

        .table thead th {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            /* background-color: #fff; */
            z-index: 1;
        }

        .table2 tbody td:first-child,
        .table2 thead th:first-child {
            position: -webkit-sticky;
            position: sticky;
            left: 0;
            background-color: #fff;
            z-index: 2;
        }

        .table2 tbody td {
            white-space: nowrap;
        }
    </style>
@endsection
@section('content')


    @include('backend.contribution.layout.header')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center gx-0">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="text-uppercase text-body-secondary mb-2">
                                    Contributed
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                                    ₦ {{ number_format($sum) }}
                                </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-dollar-sign text-body-secondary mb-0"></span>

                            </div>
                        </div> <!-- / .row -->

                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center gx-0">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="text-uppercase text-body-secondary mb-2">
                                    Contributors
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                                    {{ $contribution->users->count() }}
                                </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-users text-body-secondary mb-0"></span>

                            </div>
                        </div> <!-- / .row -->

                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center gx-0">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="text-uppercase text-body-secondary mb-2">
                                    Next Payment Date
                                </h6>

                                <div class="row align-items-center g-0">
                                    <div class="col-auto">

                                        <!-- Heading -->
                                        <span class="h2 me-2 mb-0">
                                            84.5%
                                        </span>

                                    </div>
                                    <div class="col">

                                        <!-- Progress -->
                                        <div class="progress progress-sm me-4">
                                            <div class="progress-bar" role="progressbar" style="width: 85%"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </div>
                                </div> <!-- / .row -->

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-clipboard text-body-secondary mb-0"></span>

                            </div>
                        </div> <!-- / .row -->

                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center gx-0">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="text-uppercase text-body-secondary mb-2">
                                    Status
                                </h6>

                                <!-- Heading -->
                                <span class="h4 text-success mb-0">
                                    Active
                                </span>

                            </div>
                            <div class="col-auto">

                                <!-- Chart -->
                                <div class="chart chart-sparkline">
                                    <canvas class="chart-canvas" id="sparklineChart"></canvas>
                                </div>

                            </div>
                        </div> <!-- / .row -->

                    </div>
                </div>

            </div>
        </div> <!-- / .row -->
        <div class="row">
            <div class="col-12 col-xl-8">

                <div class="card">
                    <div class="card-body">
                        <!-- List group -->
                        <div class="list-group list-group-flush my-n3">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h5 class="mb-0">
                                            Invite Code
                                        </h5>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Time -->
                                        <time class="small text-body-secondary" datetime="1988-10-24">
                                            {{ $contribution->contribution_address }}
                                        </time>

                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h5 class="mb-0">
                                            Contribution Type
                                        </h5>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Time -->
                                        <time class="small text-body-secondary" datetime="2018-10-28">
                                            {{ $contribution->contribution_type }}
                                        </time>

                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h5 class="mb-0">
                                            Starts
                                        </h5>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Text -->
                                        <small class="text-body-secondary">
                                            {{ $contribution->starts }}
                                        </small>

                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h5 class="mb-0">
                                            Ends
                                        </h5>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Link -->
                                        <small class="text-body-secondary">
                                            {{ $contribution->ends }}
                                        </small>

                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h5 class="mb-0">
                                            Created By
                                        </h5>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Link -->
                                        <small class="text-body-secondary">
                                            themes.getbootstrap.com
                                        </small>

                                    </div>
                                </div> <!-- / .row -->
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-12 col-xl-4">
                <div class="card">
                    <div class="card-header">

                        <!-- Title -->
                        <h4 class="card-header-title">
                            Transaction Logs
                        </h4>

                        <!-- Button -->
                        <a class="small" href="#!">View all</a>

                    </div>
                    <div class="card-body">

                        <!-- List group -->
                        <div class="list-group list-group-flush list-group-activity my-n3">
                            @if ($logs->isEmpty())
                                <p>No logs available yet.</p>
                            @else
                                @foreach ($logs as $log)
                                    <div class="list-group-item">
                                        <div class="row">
                                            <div class="col-auto">

                                                <!-- Avatar -->
                                                <div class="avatar avatar-sm">
                                                    <div
                                                        class="avatar-title fs-lg bg-primary-subtle rounded-circle text-primary">
                                                        <i class="fe fe-credit-card"></i>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col ms-n2">

                                                <!-- Heading -->
                                                <h5 class="mb-1">
                                                    {{ $log->event }}
                                                </h5>



                                                <!-- Time -->
                                                <small class="text-body-secondary">
                                                    {{ $log->created_at->diffForHumans() }}
                                                </small>

                                            </div>
                                        </div> <!-- / .row -->
                                    </div>
                                @endforeach
                            @endif



                        </div>

                    </div>
                </div>


                <div class="card">
                    <div class="card-header">

                        <!-- Title -->
                        <h4 class="card-header-title">
                            Make Payment
                        </h4>

                        <!-- Button -->
                        {{-- <a class="small" href="#!">View all</a> --}}

                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{route('payment.pay')}}">
                        @csrf
                        <div class="form-group">

                            <!-- Label  -->
                            <label class="form-label">
                                Amount (₦)
                            </label>
                            <!-- Input -->
                            <input type="number" placeholder="₦" class="form-control" name="amount" required>
                            
                            <input type="hidden" class="form-control" name="email" id="user_email" value="">
                            <input type="hidden" class="form-control" name="contribution_id" id="contribution_id"
                                value="{{$contribution->id}}">

                            <input type="hidden" name="currency" value="NGN">
                            <input type="hidden" name="metadata"
                                value="{{ json_encode($array = ['user_id' => Auth::id()]) }}">
                            <input type="hidden" name="reference"
                                value="{{ \Unicodeveloper\Paystack\Facades\Paystack::genTranxRef() }}">
                        </div>
                        <button type="submit" class="btn w-100 btn-primary btn-sm">
                            Proceed to Payment
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- / .row -->
    </div>
@endsection
