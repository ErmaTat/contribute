@extends('backend.layout.app')
@section('title','Security Settings')
@section('css')

@endsection
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">

        <!-- Header -->
        @include('backend.settings.layout.header')
        <div class="row justify-content-between align-items-center mb-5">
          <div class="col-12 col-md-9 col-xl-7">

            <!-- Heading -->
            <h2 class="mb-2">
              Change your password
            </h2>

            <!-- Text -->
            {{-- <p class="text-body-secondary mb-xl-0">
              We will email you a confirmation when changing your password, so please expect that email after submitting.
            </p> --}}

            <form>

                <!-- Password -->
                <div class="form-group">
  
                  <!-- Label -->
                  <label class="form-label">
                    Current password
                  </label>
  
                  <!-- Input -->
                  <input type="password" class="form-control">
  
                </div>
  
                <!-- New password -->
                <div class="form-group">
  
                  <!-- Label -->
                  <label class="form-label">
                    New password
                  </label>
  
                  <!-- Input -->
                  <input type="password" class="form-control">
  
                </div>
  
                <!-- Confirm new password -->
                <div class="form-group">
  
                  <!-- Label -->
                  <label class="form-label">
                    Confirm new password
                  </label>
  
                  <!-- Input -->
                  <input type="password" class="form-control">
  
                </div>
  
                <!-- Submit -->
                <button class="btn w-100 btn-primary lift" type="submit">
                  Update password
                </button>
  
              </form>



          </div>
          <div class="col-12 col-xl-5">

             <!-- Card -->
             <div class="card bg-light border ms-md-4">
                <div class="card-body">
  
                  <!-- Text -->
                  <p class="mb-2">
                    Password requirements
                  </p>
  
                  <!-- Text -->
                  <p class="small text-body-secondary mb-2">
                    To create a new password, you have to meet all of the following requirements:
                  </p>
  
                  <!-- List group -->
                  <ul class="small text-body-secondary ps-4 mb-0">
                    <li>
                      Minimum 8 character
                    </li>
                    <li>
                      At least one special character
                    </li>
                    <li>
                      At least one number
                    </li>
                    <li>
                      Can’t be the same as a previous password
                    </li>
                  </ul>
  
                </div>
              </div>
          </div>
        </div> <!-- / .row -->


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