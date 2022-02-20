<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="{{asset('')}}" sizes="16x16" type="image/png">
        <title>@yield('title')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        @include('layout.partial.header_stylesheet_base')

    </head>
    <body class="hold-transition skin-green sidebar-mini">
        @if (session('successMessage'))
        <div class="alert alert-success">
            {{ session('successMessage') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </div>
        @endif
        @if (session('errorMessage'))
        <div class="alert alert-danger">
            {{ session('errorMessage') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </div>
        @endif
        <div class="wrapper">

            @include('layout.partial.top_navbar')

            @if(\Auth::check() && \Auth::user()->isAdmin())
            @include('layout.partial.sidebar_admin')
            @elseif(\Auth::check() && \Auth::user()->isBlAnalytic())
            @include('layout.partial.sidebar_blanalytic')
            @else
            @include('layout.partial.sidebar_user')
            @endif

            @yield('content')

            @include('layout.partial.footer_content')
        </div>
        <!-- ./wrapper -->

        @include('layout.partial.footer_script_base')

    </body>
</html>
