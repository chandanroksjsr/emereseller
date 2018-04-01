@extends('layouts.auth')

@section('content')


<style>

.form-horizontal .form-group {
    margin-right: 0px;
    margin-left: 0px;
}

</style>























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

                <p>CHANGE YOUR PASSWORD</p>

                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group form-group-default" id="nameGroup">
                        <label>Email</label>
                        <div class="controls">
                            <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="" class="form-control" required autofocus>
                            {{--<input type="text"--}}
                            {{--class="form-control"--}}
                            {{--name="name"--}}
                            {{--value="{{ old('name') }}" placeholder="Full name">--}}
                            {{--<span class="glyphicon glyphicon-user form-control-feedback"></span>--}}
                        </div>
                    </div>
                    <div class="form-group form-group-default" id="passwordGroup">
                        <label>New Password</label>
                        <div class="controls">
                            <input type="password" name="password" id="password"  placeholder="" class="form-control" required>
                            {{--<input type="text"--}}
                            {{--class="form-control"--}}
                            {{--name="name"--}}
                            {{--value="{{ old('name') }}" placeholder="Full name">--}}
                            {{--<span class="glyphicon glyphicon-user form-control-feedback"></span>--}}
                        </div>
                    </div>

                    <div class="form-group form-group-default" id="passwordGroup">
                        <label>Confirm Password</label>
                        <div class="controls">
                            <input type="password" name="password_confirmation" placeholder="" class="form-control" required>
                        </div>
                    </div>
                    <a href="{{ route('auth.password.reset') }}" class="btn-block">@lang('quickadmin.qa_forgot_password')</a>

                    <button type="submit" class="btn btn-block btn-primary login-button" style="width: 50%;">
                        <span class="signingin hidden"><span class="voyager-refresh"></span> CHANGE PASSWORD</span>
                        <span class="signin">CHANGE PASSWORD</span>
                    </button>



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


































{{--<div class="register-box">--}}

  {{--<div class="register-box-body">--}}
    {{--<p class="login-box-msg">Change Password</p>--}}

    {{--<form class="form-horizontal"--}}
          {{--role="form"--}}
          {{--method="POST"--}}
          {{--action="{{ url('password/reset') }}">--}}
        {{--<input type="hidden"--}}
               {{--name="_token"--}}
               {{--value="{{ csrf_token() }}">--}}
        {{--<input type="hidden" name="token" value="{{ $token }}">--}}

      {{--<div class="form-group has-feedback">--}}
        {{--<input type="email" class="form-control"  name="email"--}}
         {{--value="{{ old('email') }}"  placeholder="Email">--}}
        {{--<span class="glyphicon glyphicon-envelope form-control-feedback"></span>--}}
      {{--</div>--}}

      {{--<div class="form-group has-feedback">--}}
        {{--<input type="password"--}}
               {{--class="form-control"--}}
               {{--name="password"  placeholder="New Password">--}}
        {{--<span class="glyphicon glyphicon-lock form-control-feedback"></span>--}}
      {{--</div>--}}

      {{--<div class="form-group has-feedback">--}}
        {{--<input type="password"--}}
               {{--class="form-control"--}}
               {{--name="password_confirmation"  placeholder="Confirm New Password">--}}
        {{--<span class="glyphicon glyphicon-lock form-control-feedback"></span>--}}
      {{--</div>--}}



      {{--<div class="row">--}}

        {{--<!-- /.col -->--}}
        {{--<div class="col-xs-12">--}}
          {{--<button type="submit" class="btn btn-primary btn-block btn-flat">Change Password</button>--}}
        {{--</div>--}}
        {{--<!-- /.col -->--}}
      {{--</div>--}}
    {{--</form>--}}
      {{----}}
      {{----}}
      {{----}}
      {{----}}

    {{--<!-- <div class="social-auth-links text-center">--}}
      {{--<p>- OR -</p>--}}
      {{--<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using--}}
        {{--Facebook</a>--}}
      {{--<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using--}}
        {{--Google+</a>--}}
    {{--</div> -->--}}


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


@endsection
