@extends('layouts.app')
@section('title','Register')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="/login.png" width="100%" height="100%" alt="IMG">
            </div>

            <form method="POST" class="login100-form " action="{{ route('register') }}">
                @csrf
                <span class="login100-form-title">
                    Register
                </span>

                <div class="wrap-input100 ">
                    <input id="name" type="text" class=" input100 @error('name') is-invalid @enderror" name="email"
                        placeholder="name" value="{{ old('name') }}" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-address-card" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 ">
                    <input id="img" type="file" class="form input100 @error('img') is-invalid @enderror" name="img"
                        placeholder="img" value="{{ old('img') }}" >

                    @error('img')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-image" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 ">
                    <input id="email" type="email" class=" input100 @error('email') is-invalid @enderror" name="email"
                        placeholder="email" value="{{ old('email') }}" >

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

                <div class="wrap-input100">
                    <input id="password-confirm" type="password" placeholder="password confirmation"
                        class="input100  @error('password-confirm') is-invalid @enderror" name="password-confirm">

                    @error('password-confirm')
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
                        {{ __('Register') }}
                    </button>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="{{ route('login') }}">
                        Login your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


