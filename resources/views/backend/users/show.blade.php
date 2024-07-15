@extends('backend.layout.app')
@section('title', 'All Users')
@section('css')
   
@endsection
@section('content')
<div class="row">
    <h4>{{$user->name}}</h4>
    <form class="forms-sample" method="POST" action="{{route('users.assign_role')}}">
        @csrf
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <div class="modal-body">
            <div class="form-group">
                <label for="project_name">User Role :</label>
                <select class="form-control" name="role_id" style="color: white">
                    @foreach ($roles as $role)
                        <option value="{{$role->name}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Assign</button>
        </div>
    </form>
</div>
@endsection
@section('scripts')
    
   
@endsection
