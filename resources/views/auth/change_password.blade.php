@extends('layout.master')

@section('title','Dashboard')

@section('header_stylesheet_extra')

@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Change Password
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-md-11">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{url('change_password')}}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="form-group @if($errors->has('old_password'))has-error @endif">
                                <label for="oldPassword">Old Password</label>
                                <input type="password" class="form-control" id="oldPassword" name="old_password" placeholder="Password" autocomplete="off">
                                @if($errors->has('old_password'))<span class="help-block">{{$errors->first('old_password')}}</span>@endif
                            </div>
                            <div class="form-group @if($errors->has('password'))has-error @endif">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                                @if($errors->has('password'))<span class="help-block">{{$errors->first('password')}}</span>@endif
                            </div>
                            <div class="form-group @if($errors->has('password_confirmation'))has-error @endif">
                                <label for="confirmPassword">Confirm New Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Password" autocomplete="off">
                                @if($errors->has('password_confirmation'))<span class="help-block">{{$errors->first('password_confirmation')}}</span>@endif
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('footer_script_extra')

@endsection
