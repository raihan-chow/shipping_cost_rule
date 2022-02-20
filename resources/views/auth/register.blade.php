@extends('auth.master')
@section('body')
<div class="login-box-body">
    <p class="login-box-msg">Sign up
        @include('auth.flash_message')</p>

    <form action="{{url('/signup')}}" method="post">
        @csrf
        <div class="form-group has-feedback @if($errors->has('login'))has-error @endif">
            <input type="text" class="form-control" name="login" placeholder="Enter email or phone number(eg. 0xxxxxxxxxx)" value="{{old('login')}}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if($errors->has('login'))<span class="help-block">{{$errors->first('login')}}</span>@endif
        </div>
        <div class="form-group has-feedback @if($errors->has('password'))has-error @endif">
            <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if($errors->has('password'))<span class="help-block">{{$errors->first('password')}}</span>@endif
        </div>
        <div class="form-group has-feedback @if($errors->has('password_confirmation'))has-error @endif">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Retype Password" autocomplete="off">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            @if($errors->has('password'))<span class="help-block">{{$errors->first('password_confirmation')}}</span>@endif
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label class="hover">
                        <div class="icheckbox_square-blue hover" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" name="terms_and_conditions" required style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> I agree to the <a href="{{url('/privacy_policy')}}">terms and conditions</a>
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="{{url('/signin_with_facebook')}}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
            Facebook</a>
        <a href="{{url('/signin_with_google')}}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google"></i> Sign in using
            Google</a>
    </div>
    <a href="{{url('/signin')}}" class="text-center">I have an account</a>
</div>
<!-- /.login-box-body -->
@endsection