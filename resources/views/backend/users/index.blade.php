@extends('backend.layout.app')
@section('title', 'All Users')
@section('css')
   
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <h4 class="card-title">All Users</h4>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create-user">+ Add User</button>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th> S/N</th>
                    <th> User</th>
                    <th> Email </th>
                    <th> UserRole</th>
                    <th> Joined </th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index=> $user )
                    <tr>
                        <td> {{$index +1}}.  </td>
                        <td> {{$user->name}} </td>
                        <td> {{$user->email }}</td>
                        <td> </td>
                        <td> {{$user->created_at}} </td>
                        <td> 
                            <a href="{{route('contribution.show',$user->id)}}" class="btn btn-sm btn-primary"><i class="mdi mdi-eye"></i>View</a>
                            <button class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i>Delete</button>
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

    <div class="modal fade" id="create-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="forms-sample" method="POST" action="{{route('users.store')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="project_name">Name :</label>
                            <input type="text" class="form-control"  required name="name"
                                placeholder="Users' Name">
                        </div>
                        <div class="form-group">
                            <label for="project_name">Email :</label>
                            <input type="email" class="form-control"  required name="email"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="project_name">Password :</label>
                            <input type="password" class="form-control"  required name="password"
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="project_name">Confirm Password :</label>
                            <input type="password" class="form-control" required name="password_confirmation"
                                placeholder="Confirm Password">
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
