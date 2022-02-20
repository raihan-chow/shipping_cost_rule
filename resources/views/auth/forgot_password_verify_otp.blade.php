@extends('auth.master')
@section('body')
<div class="login-box-body">
    <p class="login-box-msg">Verify OTP for Forgot Password
        @include('auth.flash_message')</p>

    <form action="{{url('forgot_password_verify_otp/' . $reference_id)}}" method="post">
        @csrf
        <div class="form-group has-feedback @if($errors->has('otp'))has-error @endif">
            <input type="text" class="form-control" name="otp" placeholder="Enter OTP" value="{{\Input::old('otp')}}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if($errors->has('otp'))<span class="help-block">{{$errors->first('otp')}}</span>@endif
        </div>
        <div class="row">
            <div class="col-xs-4">
                <a href="{{url('/resend_otp_forgot_password/' . $reference_id)}}" class="btn btn-primary btn-block btn-flat">Re-send</a>
            </div>
            <div class="col-xs-4">
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Verify OTP</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
</div>
<!-- /.login-box-body -->
@endsection