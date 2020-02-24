@extends('layouts.admin.admin')

@section('title', 'CMS | Register')

@section('content')

    <div class="reg-col-header"> {{ isset($url) ? ucwords($url) : "" }} {{ __('Login') }}</div>
 
    @isset($url)
    <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
    @else
    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
    @endisset
        @csrf
        
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
        @if ($errors->has('name'))
        <span class="err-msg">{{ $errors->first('name') }}</span>
        @endif

        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>
        @if ($errors->has('email'))
        <span class="err-msg">{{ $errors->first('email') }}</span>
        @endif

        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
        @if ($errors->has('password'))
        <span class="err-msg">{{ $errors->first('password') }}</span>
        @endif

        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>

        <div class="reg-user-agreement">By clicking REGISTER, you agree to our <a href="">Terms, Data Policy and Cookie Policy</a>. You may receive SMS notifications from us and can opt out at any time.</div>

        <div class="form-btn-wrap">
        <button type="submit" class="primarybtn">{{ __('Register') }}</button>
      </div>
    </form>

@endsection