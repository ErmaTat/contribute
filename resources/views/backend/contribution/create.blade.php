@extends('backend.layout.app')
@section('title', 'New Project')
@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8">

      <!-- Header -->
      <div class="header mt-md-5">
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col">

              <!-- Pretitle -->
              <h6 class="header-pretitle">
                New contribution
              </h6>

              <!-- Title -->
              <h1 class="header-title">
                Create a new contribution
              </h1>

            </div>
          </div> <!-- / .row -->
        </div>
      </div>

      <!-- Form -->
      <form class="mb-4">

        <!-- Project name -->
        <div class="form-group">

          <!-- Label  -->
          <label class="form-label">
            Contribution name
          </label>

          <!-- Input -->
          <input type="text" class="form-control" name="name" required>

        </div>

        <!-- Project description -->
        <div class="form-group">

          <!-- Label -->
          <label class="form-label mb-1">
             Description
          </label>

          <!-- Text -->
          <small class="form-text text-body-secondary">
            What is the contribution for?
          </small>

          <!-- Textarea -->
          <div data-quill=""></div>

        </div>

       
        <div class="row">
          <div class="col-12 col-md-6">

            <!-- Start date -->
            <div class="form-group">

              <!-- Label -->
              <label class="form-label">
                Start date
              </label>

              <!-- Input -->
              <input type="text" name="starts" class="form-control" data-flatpickr="">

            </div>

          </div>
          <div class="col-12 col-md-6">

            <!-- Start date -->
            <div class="form-group">

              <!-- Label -->
              <label class="form-label">
                End date
              </label>

              <!-- Input -->
              <input type="text" name="ends" class="form-control" data-flatpickr="">

            </div>

          </div>
        </div> <!-- / .row -->

        <!-- Divider -->
        <hr class="mt-4 mb-5">
        <div class="row">
          <div class="col-12 col-md-6">

            <!-- Private project -->
            <div class="form-group">

              <!-- Label -->
              <label class="form-label mb-1">
                Recurring Contribution
              </label>

              <!-- Text -->
              <small class="form-text text-body-secondary">
                Recurring contributions can be automatically scheduled and reminders automatically assigned for payment dates.
              </small>

              <!-- Switch -->
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="switchOne">
                <label class="form-check-label" for="switchOne"></label>
              </div>

            </div>

          </div>
          <div class="col-12 col-md-6">

            <!-- Warning -->
            <div class="card bg-light border">
              <div class="card-body">

                <!-- Heading -->
                <h4 class="mb-2">
                  <i class="fe fe-alert-triangle"></i> Warning
                </h4>

                <!-- Text -->
                <p class="small text-body-secondary mb-0">
                  Once a contribution is set to recurring, payment dates cannot be adjusted.
                </p>

              </div>
            </div>

          </div>
        </div> <!-- / .row -->
        <div class="form-group">

            <!-- Label  -->
            <label class="form-label">
              Payment Frequency
            </label>
  
            <select class="form-select" name="frequency" data-choices>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>
                <option value="quarterly">Quarterly</option>
                <option value="annually">Annually</option>
            </select>
          </div>


          <div class="row">
            <div class="col-12 col-md-6">
  
              <!-- Start date -->
              <div class="form-group">
  
                <!-- Label -->
                <label class="form-label">
                    Payment Type
                </label>
  
                
                <select class="form-select" id="pay_type">
                    <option value="fixed">Fixed Amount</option>
                    <option value="custom">Custom/Random Amount</option>
                </select>
                
              </div>
  
            </div>
            <div class="col-12 col-md-6">
  
              <!-- Start date -->
              <div class="form-group">
  
                <!-- Label -->
                <label class="form-label">
                    Amount
                </label>
  
                <!-- Input -->
                <input type="number"  id="amt" name="amount" value="500" class="form-control" >
  
              </div>
  
            </div>
          </div>
        
        <!-- Divider -->
        <hr class="mt-5 mb-5">

        <!-- Buttons -->
        <a href="#" class="btn w-100 btn-primary">
          Create project
        </a>
        <a href="#" class="btn w-100 btn-link text-body-secondary mt-2">
          Cancel this project
        </a>

      </form>

    </div>
  </div>
   <!-- / .row -->
   
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
                                <div class="col">
                                    <div class="form-group">
                                        <label class="col-form-label">Payment Frequency: </label>
                                        <select class="form-control" required id="freq" name="frequency" style="color: white">
                                            <option value="none">None</option>
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
