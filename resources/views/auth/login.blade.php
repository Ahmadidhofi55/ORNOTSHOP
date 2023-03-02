@extends('layouts.app')
@section('title','Login')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="/login.png" width="100%" height="100%" alt="IMG">
            </div>

            <form method="POST" class="login100-form " action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title">
                    Login
                </span>

                <div class="wrap-input100 ">
                    <input id="email" type="email" class=" input100 @error('email') is-invalid @enderror" name="email"
                        placeholder="email" value="{{ old('email') }}" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100">
                    <input id="password" type="password" placeholder="password"
                        class="input100  @error('password') is-invalid @enderror" name="password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        {{ __('Login') }}
                    </button>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="{{ route('register') }}">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
