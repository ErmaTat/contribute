@extends('auth.app')
@section('title', 'Login')
@section('css')
@endsection
@section('content')
    <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
                <div class="card-body px-5 py-5">
                    <h3 class="card-title text-left mb-3">Login</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email *</label>
                            <input class="form-control p_input" type="email" required="" name="email"
                                value="{{ old('email') }}" placeholder="Test@gmail.com">
                            @if ($errors->has('email'))
                                <span class="text-danger mt-2">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Password *</label>
                            <input class="form-control p_input" type="password" name="password" required=""
                                placeholder="*********">
                            @if ($errors->has('password'))
                                <span class="text-danger mt-2">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input"> Remember me </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="link forgot-pass" href="{{ route('password.request') }}">Forgot password?</a>
                            @endif

                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-facebook mr-2 col">
                                <i class="mdi mdi-facebook"></i> Facebook </button>
                            <button class="btn btn-google col">
                                <i class="mdi mdi-google-plus"></i> Google plus </button>
                        </div>
                        <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p>
                    </form>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
@endsection
@section('scripts')
@endsection
