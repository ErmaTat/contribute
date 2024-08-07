 <!-- partial:../../partials/_footer.html -->
 <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-end">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © OracodeLTD 2024</span>
    </div>
  </footer>
  <!-- partial -->


  
  @extends('backend.layout.app')
@section('title', 'All Projects')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" /> --}}
   
@endsection
@section('content')
@section('first-sub', 'Contributions')
@section('second-sub', $contribution->name)
@section('create-btn')
    <div class="col-12 col-md-auto mt-3 mt-md-0">

        <!-- Avatar group -->
        <div class="avatar-group">
            <a href="profile-posts.html" class="avatar" data-bs-toggle="tooltip" title="Dianna Smiley">
                <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
            </a>
            <a href="profile-posts.html" class="avatar" data-bs-toggle="tooltip" title="Ab Hadley">
                <img src="assets/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
            </a>
            <a href="profile-posts.html" class="avatar" data-bs-toggle="tooltip" title="Adolfo Hess">
                <img src="assets/img/avatars/profiles/avatar-3.jpg" alt="..." class="avatar-img rounded-circle">
            </a>
            <a href="profile-posts.html" class="avatar" data-bs-toggle="tooltip" title="Daniela Dewitt">
                <img src="assets/img/avatars/profiles/avatar-4.jpg" alt="..." class="avatar-img rounded-circle">
            </a>
        </div>

        <!-- Button -->
        <a href="#modalMembers" class="btn btn-lg btn-rounded-circle btn-white lift" data-bs-toggle="modal">
            +
        </a>

    </div>








   <!-- / .header -->
@endsection
<!-- CONTENT -->
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
                                    <a href="#!" class="small">
                                        {{ $contribution->ends }}
                                    </a>

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
                                    <a href="#!" class="small">
                                        themes.getbootstrap.com
                                    </a>

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
        </div>
    </div> <!-- / .row -->
</div>






























<!-- Modal -->
<div class="modal fade" id="edit-project" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $contribution->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample" method="POST"
                action="{{ route('contribution.update', $contribution->id) }}">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="project_name">Project Name *:</label>
                        <input type="text" class="form-control" id="project_name" required name="name"
                            placeholder="Project/Contribution Name" value="{{ $contribution->name }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Starts *: </label>
                                <input class="form-control" type="date" required name="starts"
                                    placeholder="dd/mm/yyyy" value="{{ $contribution->starts }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="col-form-label">Ends *: </label>
                                <input class="form-control" type="date" name="ends" required
                                    placeholder="dd/mm/yyyy" value="{{ $contribution->ends }}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Project Description</label>
                        <textarea class="form-control" name="description" placeholder="Project Description/Details" id="description"
                            rows="4">{{ $contribution->description }}</textarea>
                    </div>


                    <div class="form-group">
                        <label for="con_type">Project Contribution Type *: </label>
                        <select class="form-control" disabled id="con_type" required name="">

                            <option value="recurring"
                                {{ $contribution->contribution_type == 'recurring' ? 'selected' : '' }}>Recurring
                                Contributions</option>
                            <option value="one-time"
                                {{ $contribution->contribution_type == 'one-time' ? 'selected' : '' }}>One-Time
                                Contributions</option>
                        </select>
                        <input type="hidden" value="{{ $contribution->contribution_type }}"
                            name="contribution_type">
                    </div>
                    <hr>

                    {{-- @if ($contribution->contribution_type == 'recurring')
                            <div id="con_options">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="col-form-label">Payment Frequency: </label>
                                            <select class="form-control" id="freq" name="frequency"
                                                style="color: white">
                                                <option value="daily">daily</option>
                                                <option value="weekly">Weekly</option>
                                                <option value="monthly">Monthly</option>
                                                <option value="quarterly">Quarterly</option>
                                                <option value="annually">Annually</option>
                                            </select>

                                        </div>
                                    </div>
                                   
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Payment Type : </label>
                                            <select class="form-control" id="pay_type" style="color: white">
                                                <option value="fixed">Fixed Amount</option>
                                                <option value="custom">Custom/Random Amount</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Amount : </label>
                                            <input type="text" class="form-control" value="500" id="amt"
                                                name="amount" placeholder="Amount NGN">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif --}}
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-payment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment for {{ $contribution->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('payment.update') }}">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="project_name">Contributor *:</label>
                        <select class="form-control" name="user_id" style="color: white">
                            @foreach ($contribution->users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" class="form-control" name="contribution_id"
                            value="{{ $contribution->id }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Amount *: </label>
                                <input type="number" class="form-control" required name="amount"
                                    placeholder="Amount Paid">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="col-form-label">Paid On *: </label>
                                <input class="form-control" type="date" name="paid-on" required
                                    placeholder="dd/mm/yyyy" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Update Payments</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="confirm-recurring" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment for {{ $contribution->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('payment.update') }}">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="project_name">Contributor *:</label>
                        <select class="form-control" name="user_id" style="color: white">
                            @foreach ($contribution->users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" class="form-control" name="contribution_id"
                            value="{{ $contribution->id }}">
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                        </div>

                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Update Payments</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="search-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Contributor for {{ $contribution->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('users.assign', $contribution->id) }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="project_name">Contributor :</label>
                        <select class="js-example-basic-multiple" required name='users[]' multiple="multiple"
                            style="width:100%;">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- 
<div class="modal fade" id="add-reminder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Set Reminders for {{ $contribution->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="forms-sample" method="POST" action="{{ route('reminder.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="project_name">Reminder Details :</label>
                            <textarea name="" id="" class="form-control" placeholder="Reminder Message (Optional)"
                                rows="4"></textarea>
                            <input type="hidden" class="form-control" name="contribution_id"
                                value="{{ $contribution->id }}">
                        </div>
                        <div class="form-group">
                            <label for="project_name">Reminder Settings *:</label>
                            <select class="form-control" name="" style="color: white">
                                <option value="default">Default</option>
                                <option value="custom">Custom</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Starts *: </label>
                                    <input class="form-control" type="date" required name="starts"
                                        placeholder="dd/mm/yyyy" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="col-form-label">Frequency : </label>
                                    <select class="form-control" name="" style="color: white">
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="yearly">Yearly</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="checkbox-container" style="display: flex; flex-wrap: wrap; gap: 10px;">
                            <div class="form-check form-check-danger mb-2" style="margin-right: 15px;">
                                <input class="form-check-input" type="checkbox" id="select-all" data-value="personal" />
                                <label class="form-check-label" for="select-all">All Users</label>
                            </div>

                            @foreach ($contribution->users as $user)
                                <div class="form-check form-check-danger mb-2" style="margin-right: 15px;">
                                    <input class="form-check-input" type="checkbox" name='user_id[]'
                                        value="{{ $user->id }}" data-value="personal" />
                                    <label class="form-check-label" for="select-personal">{{ $user->name }}</label>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Set</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}


@endsection
@section('scripts')
<script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
{{-- <script src="{{ asset('assets/vendors/sweetalert/sweetalert2.js') }}"></script> --}}
<script>
    // Swal.fire({
    //     text: "Are you sure?, You won't be able to revert this!",
    //     icon: "warning",
    //     showCancelButton: true,
    //     confirmButtonText: "Yes, remove it!",
    //     customClass: {
    //         confirmButton: "btn btn-primary me-3",
    //         cancelButton: "btn btn-secondary"
    //     },
    //     buttonsStyling: false
    // }).then(function(result) {
    //     if (result.value) {
    //         form.submit();
    //     }
    // });


    if ($("#transaction-history").length) {
        var areaData = {
            labels: ["Paypal", "Stripe", "Cash"],
            datasets: [{
                data: [55, 25, 20],
                backgroundColor: [
                    "#111111", "#00d25b", "#ffab00"
                ]
            }]
        };
        var areaOptions = {
            responsive: true,
            maintainAspectRatio: true,
            segmentShowStroke: false,
            cutoutPercentage: 70,
            elements: {
                arc: {
                    borderWidth: 0
                }
            },
            legend: {
                display: false
            },
            tooltips: {
                enabled: true
            }
        }
        var transactionhistoryChartPlugins = {
            beforeDraw: function(chart) {
                var width = chart.chart.width,
                    height = chart.chart.height,
                    ctx = chart.chart.ctx;

                ctx.restore();
                var fontSize = 1;
                ctx.font = fontSize + "rem sans-serif";
                ctx.textAlign = 'left';
                ctx.textBaseline = "middle";
                ctx.fillStyle = "#ffffff";

                var text = "$1200",
                    textX = Math.round((width - ctx.measureText(text).width) / 2),
                    textY = height / 2.4;

                ctx.fillText(text, textX, textY);

                ctx.restore();
                var fontSize = 0.75;
                ctx.font = fontSize + "rem sans-serif";
                ctx.textAlign = 'left';
                ctx.textBaseline = "middle";
                ctx.fillStyle = "#6c7293";

                var texts = "Total",
                    textsX = Math.round((width - ctx.measureText(text).width) / 1.93),
                    textsY = height / 1.7;

                ctx.fillText(texts, textsX, textsY);
                ctx.save();
            }
        }
        var transactionhistoryChartCanvas = $("#transaction-history").get(0).getContext("2d");
        var transactionhistoryChart = new Chart(transactionhistoryChartCanvas, {
            type: 'doughnut',
            data: areaData,
            options: areaOptions,
            plugins: transactionhistoryChartPlugins
        });
    }
    if ($(".js-example-basic-multiple").length) {
        $(".js-example-basic-multiple").select2();
    }

    $().on('click', function() {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, remove it!",
            customClass: {
                confirmButton: "btn btn-primary me-3",
                cancelButton: "btn btn-label-secondary"
            },
            buttonsStyling: false
        }).then(function(result) {
            if (result.value) {
                form.submit();
            }
        });
    });

    $('input[name="table-type"]').change(function() {
        if ($('#optionsRadios1').is(':checked')) {
            $('#list-table').css('display', '');
            $('#calendar-table').css('display', 'none');

        } else if ($('#optionsRadios2').is(':checked')) {
            $('#list-table').css('display', 'none');
            $('#calendar-table').css('display', '');

        }
    });

    $(document).ready(function() {
        $('#select-all').change(function() {

            var isChecked = $(this).is(':checked');

            $('input[name="user_id[]"]').prop('checked', isChecked);
        });

        $('input[name="user_id[]"]').change(function() {
            // If all user checkboxes are checked, check the "All Users" checkbox
            // Otherwise, uncheck the "All Users" checkbox
            if ($('input[name="user_id[]"]:checked').length === $('input[name="user_id[]"]').length) {
                $('#select-all').prop('checked', true);
            } else {
                $('#select-all').prop('checked', false);
            }
        });
    });
</script>
@endsection
