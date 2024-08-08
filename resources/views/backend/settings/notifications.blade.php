@extends('backend.layout.app')
@section('title', 'Notification Settings')
@section('css')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">

                <!-- Header -->
                @include('backend.settings.layout.header')

                <!-- Card -->
                <div class="card">
                    <div class="card-header">

                        <!-- Title -->
                        <h4 class="card-header-title">
                            Notifications
                        </h4>

                        <!-- Button -->
                        <button class="btn btn-sm btn-white">
                            Disable all
                        </button>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-nowrap card-table">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">SMS</th>
                                </tr>
                            </thead>
                            <tbody class="fs-base">
                                <tr>
                                    <td>
                                        Payments
                                    </td>
                                    <td class="text-center">
                                        <!-- Checkbox -->
                                        <div class="form-check d-inline-block me-n3">
                                            <input class="form-check-input" type="checkbox" id="emailCheckboxOne"
                                                checked="">
                                            <label class="form-check-label" for="emailCheckboxOne"></label>
                                        </div>

                                    </td>
                                    <td class="text-center">

                                        <!-- Checkbox -->
                                        <div class="form-check d-inline-block me-n3">
                                            <input class="form-check-input" type="checkbox" id="smsCheckboxOne"
                                                checked="">
                                            <label class="form-check-label" for="smsCheckboxOne"></label>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Invitations
                                    </td>

                                    <td class="text-center">

                                        <!-- Checkbox -->
                                        <div class="form-check d-inline-block me-n3">
                                            <input class="form-check-input" type="checkbox" id="emailCheckboxTwo"
                                                checked="">
                                            <label class="form-check-label" for="emailCheckboxTwo"></label>
                                        </div>

                                    </td>
                                    <td class="text-center">

                                        <!-- Checkbox -->
                                        <div class="form-check d-inline-block me-n3">
                                            <input class="form-check-input" type="checkbox" id="smsCheckboxTwo"
                                                checked="">
                                            <label class="form-check-label" for="smsCheckboxTwo"></label>
                                        </div>

                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Reminders
                                    </td>
                                    <td class="text-center">

                                        <!-- Checkbox -->
                                        <div class="form-check d-inline-block me-n3">
                                            <input class="form-check-input" type="checkbox" id="emailCheckboxThree"
                                                checked="">
                                            <label class="form-check-label" for="emailCheckboxThree"></label>
                                        </div>

                                    </td>
                                    <td class="text-center">

                                        <!-- Checkbox -->
                                        <div class="form-check d-inline-block me-n3">
                                            <input class="form-check-input" type="checkbox" id="smsCheckboxThree"
                                                checked="">
                                            <label class="form-check-label" for="smsCheckboxThree"></label>
                                        </div>

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Card -->
                <div class="card">
                    <div class="card-header">

                        <!-- Title -->
                        <h4 class="card-header-title">
                            Subscriptions
                        </h4>

                        <!-- Button -->
                        <button class="btn btn-sm btn-white">
                            Unsubscribe all
                        </button>

                    </div>
                    <div class="card-body">

                        <!-- List group -->
                        <div class="list-group list-group-flush my-n3">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Heading -->
                                        <h4 class="font-weight-base mb-1">
                                            Sales &amp; Promotions
                                        </h4>

                                        <!-- Small -->
                                        <small class="text-body-secondary">
                                            We only notify you for significant promotions
                                        </small>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Switch -->
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" id="subscriptionsSwitchOne" type="checkbox"
                                                checked="">
                                            <label class="form-check-label" for="subscriptionsSwitchOne"></label>
                                        </div>

                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Heading -->
                                        <h4 class="font-weight-base mb-1">
                                            Product updates
                                        </h4>

                                        <!-- Small -->
                                        <small class="text-body-secondary">
                                            Major changes in ProjectPal
                                        </small>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Switch -->
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" id="subscriptionsSwitchTwo" type="checkbox"
                                                checked="">
                                            <label class="form-check-label" for="subscriptionsSwitchTwo"></label>
                                        </div>

                                    </div>
                                </div> <!-- / .row -->
                            </div>

                        </div>

                    </div>
                </div>

                <br>

            </div>
        </div> <!-- / .row -->
    </div>


@endsection
@section('scripts')

@endsection
