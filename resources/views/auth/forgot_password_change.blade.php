@extends('auth.master')
@section('body')
<div class="login-box-body">
    <p class="login-box-msg">Change Password
        @include('auth.flash_message') <br> <span class="help-block alert-info">{{ $infoMessage }}</span></p>

    <form action="{{url('/forgot_password_update/'.$reference_id)}}" method="post" id="changePassword">
        @csrf
        <div class="form-group has-feedback @if($errors->has('password'))has-error @endif">
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password" value="{{\Input::old('password')}}" autocomplete="off">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if($errors->has('password'))<span class="help-block">{{$errors->first('password')}}</span>@endif
            <span class="help-block" id="passwordErrorMessage" style="color: red"></span>
        </div>
        <div class="form-group has-feedback @if($errors->has('password_confirmation'))has-error @endif">
            <input type="password" class="form-control" id="passwordConfirm" name="password_confirmation" placeholder="Retype Password" value="{{\Input::old('password_confirmation')}}" autocomplete="off">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            @if($errors->has('password_confirmation'))<span class="help-block">{{$errors->first('password_confirmation')}}</span>@endif
        </div>
        <div class="row">
            <div class="col-xs-6">

            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Update Password</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
</div>
<!-- /.login-box-body -->
@endsection