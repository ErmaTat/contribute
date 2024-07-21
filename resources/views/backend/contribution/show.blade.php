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
    <div class="row">
        <div class="col-md-4 grid-margin ">
            <div class="card">

                <div class="card-body">
                    <div class='d-flex justify-content-between mb-4'>
                        <h4 class="card-title text-uppercase">{{ $contribution->name }}</h4>
                        <p class="text-muted mb-1 small">
                            <button class="btn btn-sm btn-primary" data-target="#edit-project" data-toggle="modal"><i
                                    class="mdi mdi-border-color"></i>Edit</button>
                        </p>
                    </div>
                    <div class="d-flex flex-wrap ">
                        <div class="me-5">
                            <p class="text-nowrap"><i class="mdi mdi-folder-multiple-outline bx-sm me-2"></i> Project Name:
                                {{ $contribution->name }} </p>
                            <p class="text-nowrap"><i class="mdi mdi-map-marker bx-sm me-2"></i> Invite Code:
                                {{ $contribution->contribution_address }}</p>
                            <p class="text-nowrap "><i class="mdi mdi-label bx-sm me-2"></i> Type:
                                {{ $contribution->contribution_type }}</p>
                            <p class="text-nowrap"><i class="mdi mdi-calendar-today bx-sm me-2"></i> Starts:
                                {{ $contribution->starts }}</p>
                            <p class="text-nowrap "><i class="mdi mdi-calendar bx-sm me-2"></i> Ends:
                                {{ $contribution->ends }}</p>
                            <p class="text-nowrap "><i class="mdi mdi-account-box bx-sm me-2"></i> Created By: </p>
                            <div class="text-nowrap "><button class="btn btn-sm btn-icon btn-outline-danger"> <i
                                        class="mdi mdi-delete bx-sm me-2 "></i></button>
                                <button title="Reminders"
                                    class="btn btn-sm btn-icon btn-outline-primary"data-target="#add-reminder"
                                    data-toggle="modal" id="reminders"> <i class="mdi mdi-bell bx-sm me-2 "></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title">Transaction Logs</h4>
                        <p class="text-muted mb-1 small">
                            <button class="btn btn-sm btn-primary" data-target="#confirm-payment" data-toggle="modal"><i
                                    class="mdi mdi-checkbox-marked-circle-outline"></i>Confirm</button>
                        </p>
                    </div>
                    <div class="preview-list">
                        @if ($logs->isEmpty())
                            <p>No logs available yet.</p>
                        @else
                            @foreach ($logs as $log)
                                <div class="preview-item border-bottom">
                                    <div class="preview-item-content d-flex flex-grow">
                                        <div class="flex-grow">
                                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                <h6 class="preview-subject">Payments</h6>
                                                <p class="text-muted text-small">{{ $log->created_at->diffForHumans() }}</p>
                                            </div>
                                            <p class="text-muted">{{ $log->event }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 grid-margin ">
            <div class="card">
                <div class="card-body">
                    <div class='d-flex justify-content-between mb-4'>
                        <h4 class="card-title text-uppercase">Contributed: ₦ {{ number_format($sum) }}</h4>
                        <div class="text-muted mb-1 small d-flex flex-row ">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-primary dropdown-toggle" id="dropdownMenuButton1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                        class="mdi mdi-settings"></i>Options</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <button class="dropdown-item " onmouseover="this.style.color='white'"
                                        data-target="#search-user" data-toggle="modal"><i class="mdi mdi-settings"></i> Add
                                        Contributor</button>
            
                                    <div class="dropdown-item " onmouseover="this.style.color='white'">
                                        <span><i class="mdi mdi-table"></i> Table Type</span>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="table-type"
                                                        id="optionsRadios1" checked value=""> List</label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="table-type"
                                                        id="optionsRadios2" value="option2"> Calendar </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="table-responsive" style="width: 100%">
                        <table class="table table-bordered" id="list-table">
                            <thead>
                                <tr>
                                    <th> S/N </th>
                                    <th> Contributor </th>
                                    <th> Amount Paid </th>
                                    <th> Last Payment </th>
                                    <th> Receipts</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contribution->users as $index => $user)
                                    <tr>
                                        <td> {{ $index + 1 }}. </td>
                                        <td> {{ $user->name }} </td>
                                        <td>
                                            ₦
                                            {{ number_format($user->getPaySchedulesForContribution($contribution->id)->sum('amount')) }}
                                        </td>
                                        <td>
                                            @if ($user->payments->isNotEmpty())
                                                {{ $user->payments[0]->updated_at->format('jS, F Y h:iA') }}
                                            @else
                                                No payments yet
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{$user->payments->isNotEmpty()?route('payment.receipt',$user->payments[0]->id):'#'}}" class="btn btn-sm btn-info p-1"><i
                                                    class="mdi mdi-receipt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
            
                        <table class="table2 table table-bordered" style="display: none" id="calendar-table">
                            <thead>
                                <tr>
                                    <th>User/Date</th>
                                    @foreach ($dates as $date)
                                        <th>{!! $date !!}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contribution->users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        @foreach ($raw_dates as $index => $raw_date)
                                            @php
                                                $totalAmount = 0;
                                                $paid = false;
                                            @endphp
                                            <td
                                                class="{{ $contribution->pay_schedules->contains(function ($payment) use ($raw_date, $user, $contribution) {
                                                    return $payment->paid_on == $raw_date &&
                                                        $payment->user_id == $user->id &&
                                                        $payment->contribution_id == $contribution->id;
                                                })
                                                    ? 'bg-success'
                                                    : '' }}">
                                                @foreach ($contribution->pay_schedules as $payment)
                                                    @if ($payment->paid_on == $raw_date && $user->id == $payment->user_id && $contribution->id == $payment->contribution_id)
                                                        @php
                                                            $totalAmount += $payment->amount;
                                                            $paid = true;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @if ($paid)
                                                    ₦ {{ number_format($totalAmount) }}
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="edit-project" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
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

                        @if ($contribution->contribution_type == 'recurring')
                            <div id="con_options">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Payment Frequency: </label>
                                            <select class="form-control" id="freq" name="frequency"
                                                style="color: white">
                                                <option value="none">None</option>
                                                <option value="weekly">Weekly</option>
                                                <option value="monthly">Monthly</option>
                                                <option value="quarterly">Quarterly</option>
                                                <option value="annually">Annually</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Payment Duration : </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <select class="form-control" id="" name="duration_type"
                                                        style="color: white">
                                                        <option>Days</option>
                                                        <option>Weeks</option>
                                                        <option>Months</option>
                                                    </select>
                                                </div>
                                                <input type="number" value="30" class="form-control"
                                                    name="duration" placeholder="Duration Amount" aria-label=""
                                                    aria-describedby="basic-addon1">
                                            </div>

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
                        @endif




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
    </div>


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
