@extends('backend.layout.app')
@section('title', 'Contribution Payments')
@section('css')

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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class='d-flex justify-content-between mb-4'>
                            <h4 class="card-title text-uppercase">Contributed: ₦ {{ number_format($sum) }}
                                <button class="btn btn-rounded-circle btn-white" title="Confirm Payment">
                                    <span class="fe fe-credit-card"></span>
                                </button>
                            </h4>
                            <div class="nav btn-group" role="tablist">
                                <button class="btn btn-lg btn-white active" data-bs-toggle="tab"
                                    data-bs-target="#tabPaneOne" role="tab" aria-controls="tabPaneOne"
                                    aria-selected="true">
                                    <span class="fe fe-list"></span>
                                </button>
                                <button class="btn btn-lg btn-white" data-bs-toggle="tab" data-bs-target="#tabPaneTwo"
                                    role="tab" aria-controls="tabPaneTwo" aria-selected="false">
                                    <span class="fe fe-grid"></span>
                                </button>
                            </div>
                        </div>

                        <div class="table-responsive" style="width: 100%">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="tabPaneOne" role="tabpanel">
                                    <table class="table table-bordered" id="list-table">
                                        <thead>
                                            <tr>
                                                <th> S/N </th>
                                                <th> Contributor </th>
                                                <th> Amount </th>
                                                <th>{{$contribution->contribution_type == 'recurring'?'Payment Status':'Last Payment'}} </th>
                                                @if ($contribution->contribution_type == 'recurring')
                                                <th> Deadline </th>
                                                @endif
                                                <th> Receipts</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($contribution->contribution_type == 'recurring')
                                                @php
                                                    $numb = 0;
                                                @endphp

                                                @foreach ($contribution->users as $index => $user)
                                                    @foreach ($user->schedules as $schedule)
                                                        @if ($schedule->contribution_id == $contribution->id)
                                                            @php
                                                                $numb++;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $numb }}.</td>
                                                                <td>{{ $user->name }}</td>
                                                                <td>₦{{ number_format($schedule->amount) }}</td>
                                                                <td>
                                                                    @if ($schedule->pivot->status == 1)
                                                                    <span class="badge bg-success">Paid</span>
                                                                    @else
                                                                    <span class="badge bg-warning">Pending</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    {{$schedule->paid_on}}
                                                                </td>
                                                                <td class="d-flex justify-content-center">
                                                                    <a href="{{ $user->payments->isNotEmpty() ? route('payment.receipt', $user->payments[0]->id) : '#' }}"
                                                                        class="btn btn-sm btn-info ">
                                                                        <i class="fe fe-file-text"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @else
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
                                                        <td class="d-flex justify-content-center">
                                                            <a href="{{ $user->payments->isNotEmpty() ? route('payment.receipt', $user->payments[0]->id) : '#' }}"
                                                                class="btn btn-sm btn-info p-1"><i
                                                                    class="fe fe-file-text"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="tabPaneTwo" role="tabpanel">
                                    <table class="table2 table table-bordered" id="calendar-table">
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
                                                    @foreach ($raw_dates as $raw_date)
                                                        @php
                                                            $status = 0; // Default to not paid
                                                            $payment = $contribution->schedules->firstWhere(
                                                                'paid_on',
                                                                $raw_date->format('Y-m-d'),
                                                            );

                                                            if ($payment) {
                                                                // dd($schedule->paid_on->format('Y-m-d'));
                                                                foreach ($user->schedules as $schedule) {
                                                                    // dd($raw_date->format('Y-m-d'));
                                                                    if (
                                                                        $raw_date->format('Y-m-d') ==
                                                                            $schedule->paid_on &&
                                                                        $schedule->pivot->status == 1
                                                                    ) {
                                                                        $status = 1; // Paid
                                                                    } elseif (
                                                                        $raw_date->format('Y-m-d') ==
                                                                            $schedule->paid_on &&
                                                                        $schedule->pivot->status == 2
                                                                    ) {
                                                                        $status = 2; // Missed
                                                                    }
                                                                }
                                                            }
                                                        @endphp
                                                        @if ($contribution->contribution_type == 'recurring')
                                                            <td
                                                                class="{{ $status == 1 ? 'bg-success' : ($status == 2 ? 'bg-danger' : 'bg-warning') }}">
                                                                @if ($status == 1)
                                                                    ₦ {{ number_format($payment->amount) }}
                                                                @elseif ($status == 2)
                                                                    Missed
                                                                @else
                                                                    Not Paid
                                                                @endif
                                                            </td>
                                                        @else
                                                            <td class="{{ $status == 1 ? 'bg-success' : '' }}">
                                                                @if ($status == 1)
                                                                    ₦ {{ number_format($payment->amount) }}
                                                                @endif
                                                            </td>
                                                        @endif
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
            </div>






        </div>
    </div>
@endsection
