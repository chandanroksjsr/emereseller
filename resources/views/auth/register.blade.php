@extends('layouts.auth')

@section('content')
<style>

.form-horizontal .form-group {
    margin-right: 0px;
    margin-left: 0px;
}

</style>





{{--<div class="register-box">--}}

  {{--<div class="register-box-body">--}}
    {{--<p class="login-box-msg">Register a new membership</p>--}}

    {{--<form class="form-horizontal"--}}
          {{--role="form"--}}
          {{--method="POST"--}}
          {{--action="{{ url('register') }}">--}}
        {{--<input type="hidden"--}}
               {{--name="_token"--}}
               {{--value="{{ csrf_token() }}">--}}

      {{--<div class="form-group has-feedback">--}}
        {{--<input type="text"--}}
               {{--class="form-control"--}}
               {{--name="name"--}}
               {{--value="{{ old('name') }}" placeholder="Full name">--}}
        {{--<span class="glyphicon glyphicon-user form-control-feedback"></span>--}}
      {{--</div>--}}
      {{--<div class="form-group has-feedback">--}}
        {{--<input type="email" class="form-control"  name="email"--}}
         {{--value="{{ old('email') }}"  placeholder="Email">--}}
        {{--<span class="glyphicon glyphicon-envelope form-control-feedback"></span>--}}
      {{--</div>--}}

      {{--<div class="form-group has-feedback">--}}
        {{--<input type="password" class="form-control" placeholder="Password"  name="password"--}}
         {{--value="{{ old('password') }}" >--}}
        {{--<span class="glyphicon glyphicon-lock form-control-feedback"></span>--}}
      {{--</div>--}}
      {{--<!-- <div class="form-group has-feedback">--}}
        {{--<input type="password" class="form-control" placeholder="Retype password">--}}
        {{--<span class="glyphicon glyphicon-log-in form-control-feedback"></span>--}}
      {{--</div> -->--}}
      {{--<div class="row">--}}

        {{--<!-- /.col -->--}}
        {{--<div class="col-xs-12">--}}
          {{--<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>--}}
        {{--</div>--}}
        {{--<!-- /.col -->--}}
      {{--</div>--}}
    {{--</form>--}}

      {{--<div class="social-auth-links text-center">--}}
          {{--<p>- OR -</p>--}}
          {{--<!-- <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using--}}
            {{--Facebook</a> -->--}}
          {{--<a href="{{ route('glogin') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign Up using--}}
              {{--Google+</a>--}}
      {{--</div>--}}

    {{--<a href="login" class="text-center">I already have a membership</a>--}}
  {{--</div>--}}
  {{--<!-- /.form-box -->--}}
  {{--@if (count($errors) > 0)--}}
      {{--<div class="alert alert-danger">--}}
          {{--<strong>@lang('quickadmin.qa_whoops')</strong> @lang('quickadmin.qa_there_were_problems_with_input'):--}}
          {{--<br><br>--}}
          {{--<ul>--}}
              {{--@foreach ($errors->all() as $error)--}}
                  {{--<li>{{ $error }}</li>--}}
              {{--@endforeach--}}
          {{--</ul>--}}
      {{--</div>--}}
  {{--@endif--}}
{{--</div>--}}





<div class="container-fluid">
    <div class="row">
        <div class="faded-bg animated"></div>
        <div class="hidden-xs col-sm-7 col-md-8">
            <div class="clearfix">
                <div class="col-sm-12 col-md-10 col-md-offset-2">
                    <div class="logo-title-container">

                        {{--@if('0' == '0')--}}
                        <img class="img-responsive pull-left logo hidden-xs animated fadeIn" src="https://image.prntscr.com/image/i3EnxmITQpu0P6jGJYOL5A.png" alt="Logo Icon">
                        {{--@else--}}
                        {{--<img class="img-responsive pull-left logo hidden-xs animated fadeIn" src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">--}}
                        {{--@endif--}}
                        <div class="copy animated fadeIn">
                            <h1>EmeReCard</h1>
                            <p>INDIA'S FIRST EMERGENCY RESPONSE COMMUNICATION SYSTEM</p>
                        </div>
                    </div> <!-- .logo-title-container -->
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-5 col-md-4 login-sidebar">

            <div class="login-container">

                <p>REGISTER YOUR ACCOUNT</p>

                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group form-group-default" id="nameGroup">
                        <label>Full Name</label>
                        <div class="controls">
                            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="" class="form-control" required autofocus>
                            {{--<input type="text"--}}
                            {{--class="form-control"--}}
                            {{--name="name"--}}
                            {{--value="{{ old('name') }}" placeholder="Full name">--}}
                            {{--<span class="glyphicon glyphicon-user form-control-feedback"></span>--}}
                        </div>
                    </div>
                    <div class="form-group form-group-default" id="emailGroup">
                        <label>Email</label>
                        <div class="controls">
                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="" class="form-control" required>
                            {{--<input type="text"--}}
                            {{--class="form-control"--}}
                            {{--name="name"--}}
                            {{--value="{{ old('name') }}" placeholder="Full name">--}}
                            {{--<span class="glyphicon glyphicon-user form-control-feedback"></span>--}}
                        </div>
                    </div>

                    <div class="form-group form-group-default" id="passwordGroup">
                        <label>Password</label>
                        <div class="controls">
                            <input type="password" name="password" placeholder="" class="form-control" required>
                        </div>
                    </div>
                    <a href="{{ route('auth.password.reset') }}" class="btn-block">@lang('quickadmin.qa_forgot_password')</a>

                    <button type="submit" class="btn btn-block btn-primary login-button" style="width: 50%;">
                        <span class="signingin hidden"><span class="voyager-refresh"></span> REGISTER</span>
                        <span class="signin">REGISTER</span>
                    </button>
                    <a href="login" class="btn btn-block btn-success login-button" style="width: 50%;">
                        <span class="signingin hidden"><span class="voyager-refresh"></span> BACK TO LOGIN</span>
                        <span class="signin"><i class="fa fa-arrow-circle-left"></i> BACK TO LOGIN</span>
                    </a>
                    <div class="" style="margin-top: 20px;">
                        <a href="{{ route('glogin') }}" class="btn btn-danger" style="width: 100%;"><i class="fa fa-google-plus"></i> Sign Up using
                            Google+</a>
                    </div>
                </form>
                    <div style="clear:both"></div>

                    @if(!$errors->isEmpty())
                        <div class="alert alert-red">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </form> <!-- .login-container -->

            </div> <!-- .login-sidebar -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

























</div>












@endsection
