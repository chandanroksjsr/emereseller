@extends('layouts.auth')

@section('content')



<style>

.form-horizontal .form-group {
    margin-right: 0px;
    margin-left: 0px;
}


.login-box, .register-box {
    width: auto!important;
    margin-top: 4%;
}
@media (max-width: 768px) {
    .login-box, .register-box {
        width: 90%;
        margin-top: 20px;
    }
    .slidelogin{
        display: none;
    }
}

.login-box-body, .register-box-body {

    box-shadow: 0px 0px 1px 0px #465862;
}


/************************************************************
*************************Footer******************************
*************************************************************/

@import url(http://fonts.googleapis.com/css?family=Fjalla+One);
@import url(http://fonts.googleapis.com/css?family=Gudea);
/*.footer1 {*/
    /*background: #fff url("../images/footer/footer-bg.png") repeat scroll left top;*/
    /*padding-top: 40px;*/
    /*padding-right: 0;*/
    /*padding-bottom: 20px;*/
    /*padding-left: 0;!*	border-top-width: 4px;*/
	/*border-top-style: solid;*/
	/*border-top-color: #003;*!*/
/*}*/



.title-widget {
    color: #898989;
    font-size: 20px;
    font-weight: 300;
    line-height: 1;
    position: relative;
    text-transform: uppercase;
    font-family: 'Fjalla One', sans-serif;
    margin-top: 0;
    margin-right: 0;
    margin-bottom: 25px;
    margin-left: 0;
    padding-left: 28px;
}

.title-widget::before {
    background-color: #ea5644;
    content: "";
    height: 22px;
    left: 0px;
    position: absolute;
    top: -2px;
    width: 5px;
}



.widget_nav_menu ul {
    list-style: outside none none;
    padding-left: 0;
}

.widget_archive ul li {
    background-color: rgba(0, 0, 0, 0.3);
    content: "";
    height: 3px;
    left: 0;
    position: absolute;
    top: 7px;
    width: 3px;
}


.widget_nav_menu ul li {
    font-size: 13px;
    font-weight: 700;
    line-height: 20px;
    position: relative;
    text-transform: uppercase;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    margin-bottom: 7px;
    padding-bottom: 7px;
    width:95%;
}



.title-median {
    color: #636363;
    font-size: 20px;
    line-height: 20px;
    margin: 0 0 15px;
    text-transform: uppercase;
    font-family: 'Fjalla One', sans-serif;
}

.footerp p {font-family: 'Gudea', sans-serif; }


#social:hover {
    -webkit-transform:scale(1.1);
    -moz-transform:scale(1.1);
    -o-transform:scale(1.1);
}
#social {
    -webkit-transform:scale(0.8);
    /* Browser Variations: */
    -moz-transform:scale(0.8);
    -o-transform:scale(0.8);
    -webkit-transition-duration: 0.5s;
    -moz-transition-duration: 0.5s;
    -o-transition-duration: 0.5s;
}
/*
    Only Needed in Multi-Coloured Variation
                                               */
.social-fb:hover {
    color: #3B5998;
}
.social-tw:hover {
    color: #4099FF;
}
.social-gp:hover {
    color: #d34836;
}
.social-em:hover {
    color: #f39c12;
}
.nomargin { margin:0px; padding:0px;}





.footer-bottom {
    background-color: #15224f;
    min-height: 30px;
    width: 100%;
}
.copyright {
    color: #fff;
    line-height: 30px;
    min-height: 30px;
    padding: 7px 0;
}
.design {
    color: #fff;
    line-height: 30px;
    min-height: 30px;
    padding: 7px 0;
    text-align: right;
}
.design a {
    color: #fff;
}


/************************************************************
*************************Footer******************************
*************************************************************/
</style>



    {{--<div class="container login-box">--}}
        {{--<div class="col-sm-8 slidelogin">--}}
            {{--<div class="box box-solid">--}}
                {{--<!-- /.box-header -->--}}
                {{--<div class="box-body">--}}
                    {{--<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">--}}
                        {{--<ol class="carousel-indicators">--}}
                            {{--<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>--}}
                            {{--<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>--}}
                            {{--<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>--}}
                            {{--<li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>--}}
                        {{--</ol>--}}
                        {{--<div class="carousel-inner">--}}

                            {{--<div class="item active">--}}
                                {{--<img src="https://scontent-bom1-1.xx.fbcdn.net/v/t1.0-9/22089691_285583015180292_2000022305555666879_n.jpg?oh=2100040c5a73a8b06fbe1de8c91d4dcc&oe=5B26D654" alt="First slide">--}}

                                {{--<div class="carousel-caption">--}}
                                {{--First Slide--}}
                                {{--</div>--}}
                            {{--</div>--}}


                            {{--<div class="item">--}}
                                {{--<img src="{{url('images/ban1.png')}}" alt="First slide">--}}

                                {{--<div class="carousel-caption">--}}
                                {{--First Slide--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="item">--}}
                                {{--<img src="https://scontent-bom1-1.xx.fbcdn.net/v/t1.0-9/22089691_285583015180292_2000022305555666879_n.jpg?oh=2100040c5a73a8b06fbe1de8c91d4dcc&oe=5B26D654" alt="First slide">--}}

                                {{--<div class="carousel-caption">--}}
                                {{--First Slide--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="item">--}}
                                {{--<img src="https://scontent-bom1-1.xx.fbcdn.net/v/t31.0-8/22219919_285954765143117_7506143383910498875_o.jpg?oh=2b42d6c3e2c8740a86b1eec560142251&oe=5B106C36" alt="Second slide">--}}

                            {{--</div>--}}
                            {{--<div class="item">--}}
                                {{--<img src="https://scontent-bom1-1.xx.fbcdn.net/v/t31.0-8/22051301_285693381835922_4461730977559702305_o.jpg?oh=32f8cd76493ea77a82a04bbc6c65c98c&oe=5B145C07" alt="Third slide">--}}


                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">--}}
                            {{--<span class="fa fa-angle-left"></span>--}}
                        {{--</a>--}}
                        {{--<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">--}}
                            {{--<span class="fa fa-angle-right"></span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- /.box-body -->--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-sm-4 col-xs-12">--}}
            {{--<!-- /.login-logo -->--}}
            {{--<div class="login-box-body">--}}
                {{--<h4 class="login-box-msg text-center" style="font-weight: 700;color: #999191;">LOGIN TO YOUR ACCOUNT</h4>--}}

                {{--<form class="form-horizontal"--}}
                      {{--role="form"--}}
                      {{--method="POST"--}}
                      {{--action="{{ url('login') }}">--}}
                    {{--<input type="hidden"--}}
                           {{--name="_token"--}}
                           {{--value="{{ csrf_token() }}">--}}
                    {{--<div class="form-group has-feedback">--}}
                        {{--<input type="email"--}}
                               {{--class="form-control"--}}
                               {{--name="email"--}}
                               {{--placeholder="Email"--}}
                               {{--value="{{ old('email') }}" autofocus>--}}

                        {{--<span class="glyphicon glyphicon-envelope form-control-feedback"></span>--}}
                    {{--</div>--}}
                    {{--<div class="form-group has-feedback">--}}
                        {{--<input type="password"--}}
                               {{--class="form-control"--}}
                               {{--name="password"--}}
                               {{--placeholder="Password"--}}
                               {{--value="{{ old('password') }}">--}}
                        {{--<span class="glyphicon glyphicon-lock form-control-feedback"></span>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-xs-8">--}}
                            {{--<div class="checkbox icheck">--}}
                                {{--<label>--}}
                                    {{--<input type="checkbox"--}}
                                           {{--name="remember"> @lang('quickadmin.qa_remember_me')--}}
                                {{--</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- /.col -->--}}
                        {{--<div class="col-xs-4">--}}
                            {{--<button type="submit"--}}
                                    {{--class="btn btn-block btn-primary btn-flat"--}}
                                    {{--style="margin-right: 15px;">--}}
                                {{--@lang('quickadmin.qa_login')--}}
                            {{--</button>--}}
                        {{--</div>--}}
                        {{--<!-- /.col -->--}}
                    {{--</div>--}}
                {{--</form>--}}

                {{--<div class="social-auth-links text-center">--}}
                    {{--<p>- OR -</p>--}}
                    {{--<!-- <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using--}}
                      {{--Facebook</a> -->--}}
                    {{--<a href="{{ route('glogin') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using--}}
                        {{--Google+</a>--}}
                {{--</div>--}}
                {{--<!-- /.social-auth-links-->--}}

                {{--<a href="{{ route('auth.password.reset') }}">@lang('quickadmin.qa_forgot_password')</a><br/>--}}
                {{--<a href="register" class="text-center">Register a new membership</a>--}}

            {{--</div>--}}

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
            {{--<div class="col-sm-12" style="margin-top: 10px;">--}}
                {{--<div class="info-box">--}}
                    {{--<span class="info-box-icon bg-aqua"><i class="fa fa-lock"></i></span>--}}

                    {{--<div class="info-box-content">--}}
                        {{--<span class="info-box-text">Total Protected Users</span>--}}
                        {{--<span class="info-box-number">{{4400+$cardco}}+</span><small>Cards Created!</small>--}}
                    {{--</div>--}}
                    {{--<!-- /.info-box-content -->--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- /.login-box-body -->--}}

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
                            <h1>EmeReCard PARTNER</h1>
                            <p>INDIA'S FIRST EMERGENCY RESPONSE COMMUNICATION SYSTEM</p>
                        </div>
                    </div> <!-- .logo-title-container -->
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-5 col-md-4 login-sidebar">

            <div class="login-container">
<h5 style="font-weight: 800;">ELITE PARTNER</h5>
                <p>LOGIN TO YOUR ACCOUNT</p>

                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group form-group-default" id="emailGroup">
                        <label>Email</label>
                        <div class="controls">
                            <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="" class="form-control" required>
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
                        <span class="signingin hidden"><span class="voyager-refresh"></span> LOGIN</span>
                        <span class="signin">LOGIN</span>
                    </button>
                    {{--<a HREF="register" class="btn btn-block btn-info login-button" style="width: 50%;">--}}
                        {{--<span class="signingin hidden"><span class="voyager-refresh"></span> REGISTER</span>--}}
                        {{--<span class="signin">REGISTER</span>--}}
                    {{--</a>--}}

                    {{--<div class="" style="margin-top: 20px;">--}}
                        {{--<a href="{{ route('glogin') }}" class="btn btn-danger" style="width: 100%;"><i class="fa fa-google-plus"></i> Sign in using--}}
                            {{--Google+</a>--}}


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
<script>
    var btn = document.querySelector('button[type="submit"]');
    var form = document.forms[0];
    var email = document.querySelector('[name="email"]');
    var password = document.querySelector('[name="password"]');
    btn.addEventListener('click', function(ev){
        if (form.checkValidity()) {
            btn.querySelector('.signingin').className = 'signingin';
            btn.querySelector('.signin').className = 'signin hidden';
        } else {
            ev.preventDefault();
        }
    });
    email.focus();
    document.getElementById('emailGroup').classList.add("focused");

    // Focus events for email and password fields
    email.addEventListener('focusin', function(e){
        document.getElementById('emailGroup').classList.add("focused");
    });
    email.addEventListener('focusout', function(e){
        document.getElementById('emailGroup').classList.remove("focused");
    });
    password.addEventListener('focusin', function(e){
        document.getElementById('passwordGroup').classList.add("focused");
    });
    password.addEventListener('focusout', function(e){
        document.getElementById('passwordGroup').classList.remove("focused");
    });
</script>




</div>


<!-- /.login-box -->
@endsection
