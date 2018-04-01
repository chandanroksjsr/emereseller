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

                <p>RECOVER YOUR ACCOUNT</p>

                <form action="{{ url('password/email') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden"
                    name="_token"
                    value="{{ csrf_token() }}">
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



                    <button type="submit" class="btn btn-block btn-primary login-button" style="width: 50%;">
                        <span class="signingin hidden"><span class="voyager-refresh"></span> RECOVER ACCOUNT</span>
                        <span class="signin">RECOVER ACCOUNT</span>
                    </button>

                    <a href="../login" class="btn btn-block btn-success login-button" style="width: 50%;">
                        <span class="signingin hidden"><span class="voyager-refresh"></span> BACK TO LOGIN</span>
                        <span class="signin"><i class="fa fa-arrow-circle-left"></i> BACK TO LOGIN</span>
                    </a>

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
    {{--<p class="login-box-msg">Account Recovery</p>--}}

    {{--<form class="form-horizontal"--}}
          {{--role="form"--}}
          {{--method="POST"--}}
          {{--action="{{ url('password/email') }}">--}}
        {{--<input type="hidden"--}}
               {{--name="_token"--}}
               {{--value="{{ csrf_token() }}">--}}

      {{--<div class="form-group has-feedback">--}}
        {{--<input type="email" class="form-control"  name="email"--}}
         {{--value="{{ old('email') }}"  placeholder="Email">--}}
        {{--<span class="glyphicon glyphicon-envelope form-control-feedback"></span>--}}
      {{--</div>--}}

          {{--<div class="row">--}}

        {{--<!-- /.col -->--}}
        {{--<div class="col-xs-12">--}}
          {{--<button type="submit" class="btn btn-primary btn-block btn-flat">Recover Password</button>--}}
        {{--</div>--}}
        {{--<!-- /.col -->--}}
      {{--</div>--}}
    {{--</form>--}}

    {{--<!-- <div class="social-auth-links text-center">--}}
      {{--<p>- OR -</p>--}}
      {{--<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using--}}
        {{--Facebook</a>--}}
      {{--<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using--}}
        {{--Google+</a>--}}
    {{--</div> -->--}}


  {{--</div>--}}
  {{--<!-- /.form-box -->--}}
  {{--@if (session('status'))--}}
      {{--<div class="alert alert-success">--}}
          {{--{{ session('status') }}--}}
      {{--</div>--}}
  {{--@endif--}}

  {{--@if (count($errors) > 0)--}}
      {{--<div class="alert alert-danger">--}}
          {{--<strong>Whoops!</strong> There were problems with input:--}}
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
