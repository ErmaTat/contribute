@extends('auth.app')
@section('title', 'Sign In')
@section('css')
@endsection
@section('content')
<div class="row align-items-center">
    <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">

      <!-- Image -->
      <div class="text-center">
        <img src="assets/img/illustrations/happiness.svg" alt="..." class="img-fluid">
      </div>

    </div>
    <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">

      <!-- Heading -->
      <h1 class="display-4 text-center mb-3">
        Sign in
      </h1>

      <!-- Subheading -->
      <p class="text-body-secondary text-center mb-5">
        Free access to our dashboard.
      </p>

      <!-- Form -->
      <form method="POST" action="{{ route('login') }}">
                        @csrf
        <!-- Email address -->
        <div class="form-group">

          <!-- Label -->
          <label class="form-label">
            Email Address
          </label>

          <!-- Input -->
          <input type="email" name="email"  value="{{ old('email') }}" required class="form-control" placeholder="name@address.com">
            @if ($errors->has('email'))
                <span class="text-danger mt-2">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <!-- Password -->
        <div class="form-group">
          <div class="row">
            <div class="col">

              <!-- Label -->
              <label class="form-label">
                Password
              </label>

            </div>
            <div class="col-auto">

              <!-- Help text -->
              <a href="password-reset-cover.html" class="form-text small text-body-secondary">
                Forgot password?
              </a>

            </div>
          </div> <!-- / .row -->

          <!-- Input group -->
          <div class="input-group input-group-merge">

            <!-- Input -->
            <input class="form-control" required type="password" name="password" placeholder="Enter your password">
            @if ($errors->has('password'))
                <span class="text-danger mt-2">{{ $errors->first('password') }}</span>
            @endif
            <!-- Icon -->
            <span class="input-group-text">
              <i class="fe fe-eye"></i>
            </span>

          </div>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-lg w-100 btn-primary mb-3">
          Sign in
        </button>

        <!-- Link -->
        <div class="text-center">
          <small class="text-body-secondary text-center">
            Don't have an account yet? <a href="{{route('register')}}">Sign up</a>.
          </small>
        </div>

      </form>

    </div>
  </div> <!-- / .row -->
@endsection
@section('scripts')
@endsection
