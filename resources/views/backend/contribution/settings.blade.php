@extends('backend.layout.app')
@section('title', 'Contribution Settings')
@section('content')
    <div class="row ">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title">Reminders</h4>
                        <p class="text-muted mb-1 small">
                            <button class="btn btn-sm btn-primary"><i
                                    class="mdi mdi-plus"></i></button>
                        </p>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex justify-content-between">
                            <input type="text" class="form-control w-50">
                            
                        </div>
                    </div>
                    

                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary btn-sm">Save Changes</button>
                        
                    </div>
                </div>
            </div>
        </div>
        
        @if ($contribution->contribution_type=='recurring')
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title">Schedules</h4>
                        <p class="text-muted mb-1 small">
                            <button class="btn btn-sm btn-primary"><i
                                    class="mdi mdi-plus"></i></button>
                        </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($contribution->schedules as $schedule )
                                   <tr>
                                        <td>{{date('Y-m-d',strtotime($schedule->paid_on))}}</td>
                                        <td>₦ {{number_format($schedule->amount)}}</td>
                                        <td>
                                            <i class="mdi mdi-delete bx-sm me-2 "></i>
                                        </td>
                                   </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
@section('scripts')
    <script>
     
    </script>
@endsection
