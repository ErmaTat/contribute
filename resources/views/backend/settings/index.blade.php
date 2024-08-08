@extends('backend.layout.app')
@section('title','Settings')
@section('css')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">

        <!-- Header -->
       @include('backend.settings.layout.header')

        <!-- Form -->
        <form method="POST" action="{{route('profile.update',$user->id)}}">
            @csrf
          <div class="row justify-content-between align-items-center">
            <div class="col">
              <div class="row align-items-center">
                <div class="col-auto">

                  <!-- Avatar -->
                  <div class="avatar">
                    <img class="avatar-img rounded-circle" src="assets/img/avatars/profiles/avatar-1.jpg" alt="...">
                  </div>

                </div>
                <div class="col ms-n2">

                  <!-- Heading -->
                  <h4 class="mb-1">
                    Your avatar
                  </h4>

                  <!-- Text -->
                  <small class="text-body-secondary">
                    PNG or JPG no bigger than 1000px wide and tall.
                  </small>

                </div>
              </div> <!-- / .row -->
            </div>
            <div class="col-auto">

              <!-- Button -->
              <button class="btn btn-sm btn-primary">
                Upload
              </button>

            </div>
          </div> <!-- / .row -->

          <!-- Divider -->
          <hr class="my-5">

          <div class="row">
            <div class="col-12 col-md-6">

              <!-- First name -->
              <div class="form-group">

                <!-- Label -->
                <label class="form-label">
                  First name
                </label>

                <!-- Input -->
                <input type="text" name="name" class="form-control" value="{{$user->name}}">

              </div>

            </div>
            <div class="col-12 col-md-6">

              <!-- Last name -->
              <div class="form-group">

                <!-- Label -->
                <label class="form-label">
                  Last name
                </label>

                <!-- Input -->
                <input type="text" class="form-control">

              </div>

            </div>
            <div class="col-12">

              <!-- Email address -->
              <div class="form-group">

                <!-- Label -->
                <label class="mb-1">
                  Email address
                </label>

                <!-- Form text -->
                <small class="form-text text-body-secondary">
                  This email would be used for recovery and all application related tasks.
                </small>

                <!-- Input -->
                <input type="email" name="email" class="form-control" value="{{$user->email}}">

              </div>

            </div>
            <div class="col-12 col-md-6">

              <!-- Phone -->
              <div class="form-group">

                <!-- Label -->
                <label class="form-label">
                  Phone
                </label>

                <!-- Input -->
                <input type="text" name="phone" class="form-control mb-3" placeholder="e.g 070********" data-inputmask="'mask': '(999)999-9999'" inputmode="text">

              </div>

            </div>
            
          </div> <!-- / .row -->

          <!-- Button -->
          <button class="btn btn-primary" type="submit">
            Save changes
          </button>

          <!-- Divider -->
          <hr class="my-5">

         

          <div class="row justify-content-between">
            <div class="col-12 col-md-6">

              <!-- Heading -->
              <h4>
                Delete your account
              </h4>

              <!-- Text -->
              <p class="small text-body-secondary mb-md-0">
                Please note, deleting your account is a permanent action and will no be recoverable once completed.
              </p>

            </div>
            <div class="col-auto">

              <!-- Button -->
              <button class="btn btn-danger">
                Delete
              </button>

            </div>
          </div> <!-- / .row -->

        </form>

        <br><br>

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
                    @foreach ($roles as $index=>$role)
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