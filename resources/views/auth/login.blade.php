@extends('layouts.admin.admin')

@section('title', 'CMS | Signin')

@section('content')

                <div class="reg-col-header"> {{ isset($url) ? ucwords($url) : "" }} {{ __('Login') }}</div>
                

                @isset($url)
                <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                @else
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @endisset
                @csrf

                    <div class="input">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                        @if ($errors->has('email'))
                        <span class="err-msg">{{ $errors->first('email') }}</span>
                        @endif

                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                        @if ($errors->has('password'))
                        <span class="err-msg">{{ $errors->first('password') }}</span>
                        @endif


                        <!--  <label class="container"> -->
                          <input type="hidden" name="remember" {{ old('remember') ? 'checked' : 'checked' }}>
                          <!-- <span class="checkmark"></span>
                          <b>{{ __('Remember Me') }}</b> -->
                        <!-- </label> -->

                        <div class="reg-user-agreement">By SIGNING IN, you agree to our <a href="">Terms, Data Policy and Cookie Policy</a>. You may receive SMS notifications from us and can opt out at any time.</div>

                        <div class="form-btn-wrap">
                            <button type="submit" class="primarybtn">{{ __('Signin') }}</button>
                            <a href="{{ route('password.request') }}">{{ __('Reset') }}</a> 
                            <a href='{{ url("/") }}'>{{ __('Cancel') }}</a>
                        </div>
                    </div>

                </form>
@endsection