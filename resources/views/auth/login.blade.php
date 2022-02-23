@extends('auth.master')
@section('body')
<div class="login-box-body">
    <p class="login-box-msg">Sign in to your account
        @include('auth.flash_message')</p>

    <form action="{{url('/login')}}" method="post">
        @csrf
        <div class="form-group has-feedback @if($errors->has('email'))has-error @endif">
            <input type="text" class="form-control" name="email" placeholder="Email or Phone number" value="{{old('email')}}" autocomplete="off">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @if($errors->has('email'))<span class="help-block">{{$errors->first('email')}}</span>@endif
        </div>
        <div class="form-group has-feedback @if($errors->has('password'))has-error @endif">
            <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if($errors->has('password'))<span class="help-block">{{$errors->first('password')}}</span>@endif
        </div>
        <div class="row">
            <div class="col-xs-8">

            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    {{-- <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="{{url('/signin_with_facebook')}}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
            Facebook</a>
        <a href="{{url('/signin_with_google')}}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google"></i> Sign in using
            Google</a>
    </div> --}}
    <a href="{{url('/forgot_password')}}">I forgot my password</a>
    <br>
    <a href="{{url('/register')}}" class="text-center">Register a new account</a>
</div>
<!-- /.login-box-body -->
@endsection