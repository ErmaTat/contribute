@extends('backend.layout.app')
@section('title','Dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/calendar/fullcalendar.css')}}" />
@endsection
@section('content')
<div class="row">
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">₦12.34</h3>
                <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success ">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Users</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">₦17.34</h3>
                <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Projects Hosted</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">₦12.34</h3>
                <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-danger">
                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Amount Passed Through</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">₦31.53</h3>
                <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success ">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">General Income</h6>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 grid-margin ">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Transaction History</h4>
              <canvas id="transaction-history" class="transaction-chart"></canvas>
              <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                <div class="text-md-center text-xl-left">
                  <h6 class="mb-1">Transfer to Paypal</h6>
                  <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                </div>
                <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                  <h6 class="font-weight-bold mb-0">$236</h6>
                </div>
              </div>
              <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                <div class="text-md-center text-xl-left">
                  <h6 class="mb-1">Tranfer to Stripe</h6>
                  <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                </div>
                <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                  <h6 class="font-weight-bold mb-0">$593</h6>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
     <script src="{{ asset('assets/vendors/calendar/fullcalendar.js')}}"></script>
     <script src="{{ asset('assets/js/app-calendar.js')}}"></script>
</script>
@endsection