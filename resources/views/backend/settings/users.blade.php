@extends('backend.layout.app')
@section('title', 'Users Setting')
@section('css')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">

                @include('backend.settings.layout.header')

                <div class="row">
                    <div class="col-12 col-md-6">

                        <!-- Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h6 class="text-uppercase text-body-secondary mb-2">
                                            Total Users
                                        </h6>

                                        <!-- Heading -->
                                        <span class="h2 mb-0">
                                            {{$users->count()}}
                                        </span>

                                    </div>
                                    {{-- <div class="col-auto">

                    <!-- Icon -->
                    <a class="btn btn-sm btn-outline-primary" href="#!">Upgrade</a>

                  </div> --}}
                                </div> <!-- / .row -->

                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-md-6">

                        <!-- Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h6 class="text-uppercase text-body-secondary mb-2">
                                            Default role
                                        </h6>

                                        <!-- Heading -->
                                        <span class="h2 mb-0">
                                            Staff
                                        </span>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Icon -->
                                        <a class="btn btn-sm btn-white" href="#!">Change</a>

                                    </div>
                                </div> <!-- / .row -->

                            </div>
                        </div>

                    </div>
                </div> <!-- / .row -->

                <!-- Card -->
                <div class="card">
                    <div class="card-header">

                        <!-- Title -->
                        <h4 class="card-header-title">
                            All Users
                        </h4>

                        <!-- Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-sm btn-primary" type="button" id="inviteMember"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Invite Link
                            </button>
                            <form class="dropdown-menu dropdown-menu-end dropdown-menu-card" aria-labelledby="inviteMember">
                                <div class="card-header">

                                    <!-- Title -->
                                    <h4 class="card-header-title">
                                        Invite a member
                                    </h4>

                                    <!-- Badge -->
                                    <span class="badge text-bg-primary-subtle">2 seats left</span>

                                </div>
                                <div class="card-header">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-3">

                                            <!-- Label -->
                                            <label class="mb-0" for="inviteMemberName">
                                                Name
                                            </label>

                                        </div>
                                        <div class="col">

                                            <!-- Input -->
                                            <input class="form-control form-control-flush" id="inviteMemberName"
                                                type="text" placeholder="Full name">

                                        </div>
                                    </div> <!-- / .row -->
                                </div>
                                <div class="card-header">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-3">

                                            <!-- Label -->
                                            <label class="mb-0" for="inviteMemberEmail">
                                                Email
                                            </label>

                                        </div>
                                        <div class="col">

                                            <!-- Input -->
                                            <input class="form-control form-control-flush" id="inviteMemberEmail"
                                                type="text" placeholder="Email address">

                                        </div>
                                    </div> <!-- / .row -->
                                </div>
                                <div class="card-footer">

                                    <!-- Button -->
                                    <button class="btn w-100 btn-primary" type="submit">
                                        Invite member
                                    </button>

                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="card-body">

                        <!-- List group -->
                        <div class="list-group list-group-flush my-n3">
                            
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <a href="profile-posts.html" class="avatar">
                                            <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..."
                                                class="avatar-img rounded-circle">
                                        </a>

                                    </div>
                                    <div class="col-5 ms-n2">

                                        <!-- Title -->
                                        <h4 class="mb-1">
                                            <a href="profile-posts.html">Dianna Smiley</a>
                                        </h4>

                                        <!-- Email -->
                                        <p class="small text-body-secondary mb-0">
                                            <a class="d-block text-reset text-truncate"
                                                href="mailt:dianna.smiley@company.com">dianna.smiley@company.com</a>
                                        </p>

                                    </div>
                                    <div class="col-auto ms-auto me-n3">

                                        <!-- Select -->
                                        <div class="choices" data-type="select-one" tabindex="0" role="listbox"
                                            aria-haspopup="true" aria-expanded="false">
                                            <div class="form-select form-select-sm"><select
                                                    class="form-select form-select-sm form-control"
                                                    data-choices="{&quot;searchEnabled&quot;: false}" hidden=""
                                                    tabindex="-1" data-choice="active">
                                                    <option value="Staff" data-custom-properties="[object Object]">Staff
                                                    </option>
                                                </select>
                                                <div class="choices__list choices__list--single">
                                                    <div class="choices__item choices__item--selectable" data-item=""
                                                        data-id="2" data-value="Staff"
                                                        data-custom-properties="[object Object]" aria-selected="true">Staff
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="choices__list dropdown-menu" aria-expanded="false">
                                                <div class="choices__list" role="listbox">
                                                    <div class="choices__item dropdown-item choices__item--selectable"
                                                        data-select-text="Press to select" data-choice=""
                                                        data-choice-selectable="" data-id="1" data-value="Admin"
                                                        role="option">
                                                        Admin
                                                    </div>
                                                    <div class="choices__item dropdown-item choices__item--selectable is-highlighted"
                                                        data-select-text="Press to select" data-choice=""
                                                        data-choice-selectable="" data-id="2" data-value="Staff"
                                                        role="option" aria-selected="true">
                                                        Staff
                                                    </div>
                                                    <div class="choices__item dropdown-item choices__item--selectable"
                                                        data-select-text="Press to select" data-choice=""
                                                        data-choice-selectable="" data-id="3" data-value="Custom"
                                                        role="option">
                                                        Custom
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Dropdown -->
                                        <div class="dropdown">
                                            <a class="dropdown-ellipses dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" style="">
                                                <a class="dropdown-item" href="#!">
                                                    Action
                                                </a>
                                                <a class="dropdown-item" href="#!">
                                                    Another action
                                                </a>
                                                <a class="dropdown-item" href="#!">
                                                    Something else here
                                                </a>
                                            </div>
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







    {{-- 
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <h4 class="card-title">User Roles</h4>
                <p class="text-muted mb-1 small">
                <button class="btn btn-sm btn-primary" data-target="#create-role" data-toggle="modal">+ Create Role</button>
                </p>
            </div>
            
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th> S/N</th>
                    <th> Role</th>
                    <th> Users </th>
                    <th> Created </th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $index => $role)
                        <tr>
                            <th>{{ $index + 1}}.</th>
                            <th>{{ $role->name}}</th>
                            <th>{{ $role->users_count}}</th>
                            <th>{{ $role->created_at}}</th>
                            <th></th>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div> --}}

    {{-- <div class="modal fade" id="create-role" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample" method="POST" action="{{route('users.role')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="project_name">User Role :</label>
                        <input type="text" class="form-control" name="role">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}


@endsection
@section('scripts')

@endsection
