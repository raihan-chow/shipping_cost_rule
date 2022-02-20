@extends('auth.master')
@section('body')
<div class="login-box-body">
    <p class="login-box-msg">Forgot Password
        @include('auth.flash_message')</p>

    <form action="{{url('/forgot_password')}}" method="post">
        @csrf
        <div class="form-group has-feedback @if($errors->has('email'))has-error @endif">
            <input type="text" class="form-control" name="email" placeholder="Email" value="{{\Input::old('email')}}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if($errors->has('email'))<span class="help-block">{{$errors->first('email')}}</span>@endif
        </div>
        <p>OR</p>
        <div class="form-group has-feedback @if($errors->has('phone'))has-error @endif">
            <input type="text" class="form-control" name="phone" placeholder="Phone Number (eg. 0xxxxxxxxxx)" value="{{\Input::old('phone')}}">
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            @if($errors->has('phone'))<span class="help-block">{{$errors->first('phone')}}</span>@endif
        </div>
        <div class="row">
            <div class="col-xs-8">

            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Send OTP</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
    <a href="{{url('/signin')}}" class="text-center">I have remembered my password</a>
</div>
<!-- /.login-box-body -->
@endsection