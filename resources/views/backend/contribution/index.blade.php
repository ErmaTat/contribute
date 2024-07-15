@extends('backend.layout.app')
@section('title', 'All Projects')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">My Projects</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> Invite Address</th>
                                    <th> Project</th>
                                    <th> Amount </th>
                                    <th> Type </th>
                                    <th> Deadline </th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contributions as $contribution)
                                    <tr>
                                        <td> {{ $contribution->contribution_address }} <i
                                                class="mdi mdi-content-copy btn btn-sm"></i> </td>
                                        <td> {{ $contribution->name }} </td>
                                        <td> {{ $contribution->amount != '' ? $contribution->amount : 'any amount' }}</td>
                                        <td> {{ $contribution->contribution_type }} </td>
                                        <td> {{ $contribution->ends }}</td>
                                        <td>
                                            <a href="{{ route('contribution.show', $contribution->id) }}"
                                                class="btn btn-sm btn-warning"><i class="mdi mdi-eye"></i>View</a>
                                            <button class="btn btn-sm btn-primary pay-btn"
                                                data-id="{{ $contribution->id }}"><i
                                                    class="mdi mdi-credit-card"></i>Pay</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirm-payment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Payment Amount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="forms-sample" method="POST" action="{{route('payment.pay')}}">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="">Amount *:</label>
                            <input type="number" required class="form-control" name="amount" placeholder="Payment Amount"
                                value="">
                            <input type="hidden" class="form-control" name="email" id="user_email" value="">
                            <input type="hidden" class="form-control" name="contribution_id" id="contribution_id"
                                value="">
                            <input type="hidden" name="currency" value="NGN">
                            <input type="hidden" name="metadata"
                                value="{{ json_encode($array = ['user_id' => Auth::id()]) }}">
                            <input type="hidden" name="reference"
                                value="{{ \Unicodeveloper\Paystack\Facades\Paystack::genTranxRef() }}">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Proceed To Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $('.pay-btn').on('click', function() {
            var contribution_id = $(this).data('id');
            $('#user_email').val('{{ Auth::user()->email }}');
            $('#contribution_id').val(contribution_id);
            $('#confirm-payment').modal('show');
        });
    </script>
@endsection
