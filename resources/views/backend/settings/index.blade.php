@extends('backend.layout.app')
@section('title','Settings')
@section('css')

@endsection
@section('content')
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
</div>

<div class="modal fade" id="create-role" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div>


@endsection
@section('scripts')

@endsection