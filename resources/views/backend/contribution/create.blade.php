@extends('backend.layout.app')
@section('title', 'New Project')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">CreateNew Project</h4>
                    <form class="forms-sample" method="POST" action="{{ route('contribution.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="project_name">Project Name *:</label>
                            <input type="text" class="form-control" id="project_name" required name="name"
                                placeholder="Project/Contribution Name">
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
                                    <label class="col-form-label">Ends *: </label>
                                    <input class="form-control" type="date" name="ends" required
                                        placeholder="dd/mm/yyyy" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Project Description</label>
                            <textarea class="form-control" name="description" placeholder="Project Description/Details" id="description"
                                rows="4"></textarea>
                        </div>


                        <div class="form-group">
                            <label for="con_type">Project Contribution Type *: </label>
                            <select class="form-control" id="con_type" required style="color: white"
                                name="contribution_type">
                                <option value="recurring">Recurring Contributions</option>
                                <option value="one-time">One-Time Contributions</option>
                            </select>
                        </div>
                        <hr>
                        <div id="con_options">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Payment Frequency: </label>
                                        <select class="form-control" id="freq" name="frequency" style="color: white">
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
                                            <input type="number" value="30" class="form-control" name="duration"
                                                placeholder="Duration Amount" aria-label=""
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

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function disabled(){
            $('#pay_type').on('change',function(){
                var type = $(this).val();
                if(type=='fixed'){
                    $('#amt').removeAttr('disabled');
                }else{
                    $('#amt').attr('disabled', 'disabled');
                }
            });
        }
        disabled();
        $('#con_type').on('change', function() {
            var type = $(this).val();
            if (type == 'recurring') {
                var options = ` 
                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Payment Frequency: </label>
                                        <select class="form-control" id="freq" name="frequency" style="color: white">
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
                                            <input type="number" value="30" class="form-control" name="duration"
                                                placeholder="Duration Amount" aria-label=""
                                                aria-describedby="basic-addon1">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Payment Type : </label>
                                        <select class="form-control" id="" style="color: white">
                                            <option value="fixed">Fixed Amount</option>
                                            <option value="custom">Custom/Random Amount</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Amount : </label>
                                        <input type="text" class="form-control" value="500" id=""
                                            name="amount" placeholder="Amount NGN">
                                    </div>
                                </div>
                            </div>`
                $('#con_options').empty();
                $('#con_options').append(options);
            } else {
                $('#con_options').empty();
            }
        });
    </script>
@endsection
