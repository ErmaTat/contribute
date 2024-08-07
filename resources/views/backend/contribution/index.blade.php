@extends('backend.layout.app')
@section('title', 'All Projects')
@section('content')
@section('create-btn')
    <div class="col-auto">


        <a href="{{ route('contribution.create') }}" class="btn btn-primary lift">
            New Contribution
        </a>

    </div>
@endsection
<div class="row mb-4">
    <div class="col">

        <!-- Form -->
        <form>
            <div class="input-group input-group-lg input-group-merge input-group-reverse">

                <!-- Input -->
                <input class="form-control list-search" type="text" placeholder="Search">

                <!-- Prepend -->
                <div class="input-group-text">
                    <span class="fe fe-search"></span>
                </div>

            </div>
        </form>

    </div>
    <div class="col-auto">
        <!-- Navigation (button group) -->
        <div class="nav btn-group" role="tablist">
            <button class="btn btn-lg btn-white active" data-bs-toggle="tab" data-bs-target="#tabPaneOne" role="tab"
                aria-controls="tabPaneOne" aria-selected="true">
                <span class="fe fe-list"></span>
            </button>
            <button class="btn btn-lg btn-white" data-bs-toggle="tab" data-bs-target="#tabPaneTwo" role="tab"
                aria-controls="tabPaneTwo" aria-selected="false">
                <span class="fe fe-grid"></span>
            </button>
        </div> <!-- / .nav -->

    </div>
</div>
<div class="tab-content">
    <div class="tab-pane fade active show" id="tabPaneOne" role="tabpanel">
        <div class="row listAlias">
            <div class="col-12 grid-margin stretch-card">
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
                                            <td> {{ $contribution->amount != '' ? $contribution->amount : 'any amount' }}
                                            </td>
                                            <td> {{ $contribution->contribution_type }} </td>
                                            <td> {{ $contribution->ends }}</td>
                                            <td>
                                                <a href="{{ route('contribution.show', $contribution->id) }}"
                                                    class="btn btn-sm btn-warning"><i
                                                        class="mdi mdi-eye"></i>View</a>
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
    </div>
    <div class="tab-pane fade" id="tabPaneTwo" role="tabpanel">
        <div class="row list">
            @foreach ($contributions as $contribution)
            <div class="col-12 col-md-6 col-xl-4">

                <!-- Card -->
                <div class="card">
                    <!-- Body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h4 class="mb-2 name">
                                    <a href="project-overview.html">Homepage Redesign</a>
                                </h4>

                                <!-- Subtitle -->
                                <p class="card-text small text-body-secondary">
                                    Updated 4hr ago
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#" class="dropdown-ellipses dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="#!" class="dropdown-item">
                                            Action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Another action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Something else here
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- / .row -->
                    </div>

                    <!-- Footer -->
                    <div class="card-footer card-footer-boxed">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">

                                        <!-- Value -->
                                        <div class="small me-2">29%</div>

                                    </div>
                                    <div class="col">

                                        <!-- Progress -->
                                        <div class="progress progress-sm">
                                            <div class="progress-bar" role="progressbar" style="width: 29%"
                                                aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="col-auto">

                                <!-- Avatar group -->
                                <div class="avatar-group">
                                    <a href="profile-posts.html" class="avatar avatar-xs" data-bs-toggle="tooltip"
                                        title="Ab Hadley">
                                        <img src="assets/img/avatars/profiles/avatar-2.jpg" alt="..."
                                            class="avatar-img rounded-circle">
                                    </a>
                                    <a href="profile-posts.html" class="avatar avatar-xs" data-bs-toggle="tooltip"
                                        title="Adolfo Hess">
                                        <img src="assets/img/avatars/profiles/avatar-3.jpg" alt="..."
                                            class="avatar-img rounded-circle">
                                    </a>
                                    <a href="profile-posts.html" class="avatar avatar-xs" data-bs-toggle="tooltip"
                                        title="Daniela Dewitt">
                                        <img src="assets/img/avatars/profiles/avatar-4.jpg" alt="..."
                                            class="avatar-img rounded-circle">
                                    </a>
                                    <a href="profile-posts.html" class="avatar avatar-xs" data-bs-toggle="tooltip"
                                        title="Miyah Myles">
                                        <img src="assets/img/avatars/profiles/avatar-5.jpg" alt="..."
                                            class="avatar-img rounded-circle">
                                    </a>
                                </div>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>




@endsection
@section('scripts')

@endsection
