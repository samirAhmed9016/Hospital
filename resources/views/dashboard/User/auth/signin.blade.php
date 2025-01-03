@extends('dashboard.layouts.master2')
@section('css')
    <style>
        .loginform {
            display: none;
        }
    </style>
    <link href="{{ URL::asset('dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- Image Section -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ URL::asset('dashboard/img/media/login.png') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- Login Section -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex">
                                        <a href="{{ url('/') }}">
                                            <img src="{{ URL::asset('dashboard/img/brand/favicon.png') }}"
                                                class="sign-favicon ht-40" alt="logo">
                                        </a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>{{ trans('Dashboard/login_trans.welcome_back') }}</h2>

                                            <!-- Validation Errors -->
                                            {{-- @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif --}}

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ __('Dashboard/auth.failed') }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif




                                            <!-- Role Selector -->
                                            <div class="form-group">
                                                <label
                                                    for="roleSelector">{{ trans('Dashboard/login_trans.role_to_login') }}</label>
                                                <select class="form-control" id="roleSelector">
                                                    <option value="" selected disabled>
                                                        {{ trans('Dashboard/login_trans.choose') }}</option>
                                                    <option value="user">{{ trans('Dashboard/login_trans.patient') }}
                                                    </option>
                                                    <option value="admin">{{ trans('Dashboard/login_trans.admin') }}
                                                    </option>
                                                </select>
                                            </div>

                                            <!-- User Login Form -->
                                            <div class="loginform" id="user">
                                                <h5 class="font-weight-semibold mb-4">
                                                    {{ trans('Dashboard/login_trans.login_as_user') }}</h5>
                                                <form method="POST" action="{{ route('login.user') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ trans('Dashboard/login_trans.email') }}</label>
                                                        <input class="form-control" type="email" name="email"
                                                            value="{{ old('email') }}" required
                                                            placeholder="{{ trans('Dashboard/login_trans.email') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('Dashboard/login_trans.password') }}</label>
                                                        <input class="form-control" type="password" name="password" required
                                                            placeholder="{{ trans('Dashboard/login_trans.password') }}">
                                                    </div>
                                                    <button class="btn btn-main-primary btn-block" type="submit">
                                                        {{ trans('Dashboard/login_trans.sign_in') }}
                                                    </button>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a
                                                            href="">{{ trans('Dashboard/login_trans.forgot_password') }}</a>
                                                    </p>
                                                    <p>{{ trans('Dashboard/login_trans.dont_have_account') }}
                                                        <a
                                                            href="{{ url('/signup') }}">{{ trans('Dashboard/login_trans.create_account') }}</a>
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Admin Login Form -->
                                            <div class="loginform" id="admin">
                                                <h5 class="font-weight-semibold mb-4">
                                                    {{ trans('Dashboard/login_trans.login_as_admin') }}</h5>
                                                <form method="POST" action="{{ route('login.admin') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ trans('Dashboard/login_trans.email') }}</label>
                                                        <input class="form-control" type="email" name="email"
                                                            value="{{ old('email') }}" required
                                                            placeholder="{{ trans('Dashboard/login_trans.email') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('Dashboard/login_trans.password') }}</label>
                                                        <input class="form-control" type="password" name="password" required
                                                            placeholder="{{ trans('Dashboard/login_trans.password') }}">
                                                    </div>
                                                    <button class="btn btn-main-primary btn-block" type="submit">
                                                        {{ trans('Dashboard/login_trans.sign_in') }}
                                                    </button>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a
                                                            href="">{{ trans('Dashboard/login_trans.forgot_password') }}</a>
                                                    </p>
                                                    <p>{{ trans('Dashboard/login_trans.dont_have_account') }}
                                                        <a
                                                            href="{{ url('/signup') }}">{{ trans('Dashboard/login_trans.create_account') }}</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#roleSelector').change(function() {
            var selectedRole = $(this).val();
            $('.loginform').each(function() {
                $(this).hide();
                if ($(this).attr('id') === selectedRole) {
                    $(this).fadeIn();
                }
            });
        });
    </script>
@endsection
