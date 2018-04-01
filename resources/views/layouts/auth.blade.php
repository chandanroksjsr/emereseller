@inject('request', 'Illuminate\Http\Request')

        <!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.authead')
</head>
<style>
    .skin-black .main-header .navbar-brand {
        color: #333;
        border-right: none;
    }
    canvas{
        display:block;
        vertical-align:bottom;
        position: absolute;
        z-index: 0;
    }


    /* ---- stats.js ---- */

    .count-particles{
        background: #000022;
        position: absolute;
        top: 48px;
        left: 0;
        width: 80px;
        color: #13E8E9;
        font-size: .8em;
        text-align: left;
        text-indent: 4px;
        line-height: 14px;
        padding-bottom: 2px;
        font-family: Helvetica, Arial, sans-serif;
        font-weight: bold;
    }

    .js-count-particles{
        font-size: 1.1em;
    }

    #stats,
    .count-particles{
        -webkit-user-select: none;
        margin-top: 5px;
        margin-left: 5px;
        display: none;
    }

    #stats{
        border-radius: 3px 3px 0 0;
        overflow: hidden;
    }

    .count-particles{
        border-radius: 0 0 3px 3px;
    }


    /* ---- particles.js container ---- */

    #particles-js{
        width: 100%;
        height: 100%;

        background-position: 50% 50%;
        background-repeat: no-repeat;
    }



</style>
{{--<body class="hold-transition login-page skin-black layout-top-nav" style="background:url({{url('images/bgs.png')}});" >--}}
<body class="login" style="background:url({{url('images/partner.jpg')}});background-size:cover;background-repeat:no-repeat;">

{{--<header class="main-header">--}}
    {{--<nav class="navbar navbar-static-top" style="min-height: 55px;">--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="navbar-header">--}}
                {{--<a href="../../index2.html" class="navbar-brand"><img src="https://emerecard.com/img/emerelogo.png" width="85px"></a>--}}
                {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">--}}
                    {{--<i class="fa fa-bars"></i>--}}
                {{--</button>--}}
            {{--</div>--}}

            {{--<!-- Collect the nav links, forms, and other content for toggling -->--}}
            {{--<div class="collapse navbar-collapse" id="navbar-collapse">--}}
                {{--<ul class="nav navbar-nav navbar-right">--}}
                    {{--@if($request->segment(1) == 'login')--}}
                        {{--<li><a href="{{route('auth.signup')}}">Signup</a></li>--}}
                        {{--@else--}}
                        {{--<li><a href="{{route('auth.login')}}">Login Now</a></li>--}}
                    {{--@endif--}}

                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">More <span class="caret"></span></a>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="{{route('auth.password.reset')}}">Forgot Password ?</a></li>--}}
                            {{--<li><a href="https://www.emerecard.com">Go Home</a></li>--}}
                            {{--</ul>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<!-- /.navbar-collapse -->--}}
        {{--</div>--}}
        {{--<!-- /.container-fluid -->--}}
    {{--</nav>--}}
{{--</header>--}}


<div class="content" id="particles-js" style="padding: 0px">

    <!--header-->




    <script src="{{ url('particles/particles.js') }}"></script>
    <script src="{{ url('particles/app.js') }}"></script>

    <!-- stats.js -->
    <script src="{{ url('particles/lib/stats.js') }}"></script>
    <script>
        var count_particles, stats, update;
        stats = new Stats;
        stats.setMode(0);
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        document.body.appendChild(stats.domElement);
        count_particles = document.querySelector('.js-count-particles');
        update = function() {
            stats.begin();
            stats.end();
            if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
                count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
            }
            requestAnimationFrame(update);
        };
        requestAnimationFrame(update);
    </script>





        @yield('content')


</div>
<style>

    .mdb-skin-custom .page-footer {
        background-color: #243a51;
    }
    .documentation footer {
        padding-left: 0;
    }

        .fixed-sn .double-nav, .fixed-sn footer, .fixed-sn main {
            padding-left: 0;
        }
        .fixed-sn .double-nav, .fixed-sn footer, .fixed-sn main {
            padding-left: 240px;
        }
        footer.page-footer {
            margin-top: 20px;
            padding-top: 20px;
            color: #fff;
        }
    .page-footer {
            font-size: 0.9rem;
        }
        .blue {
            background-color: #2196f3!important;
        }
        article, aside, dialog, figcaption, figure, footer, header, hgroup, main, nav, section {
            display: block;
        }







    @media (min-width: 1200px) {
        .fixed-sn .page-footer .container-fluid, .fixed-sn main {
            margin-left: 6%;
            margin-right: 6%;
        }
    }
        @media (min-width: 992px) {
            .fixed-sn .page-footer .container-fluid, .fixed-sn main {
                margin-left: 5%;
                margin-right: 5%;
            }
        }
            @media (min-width: 600px) {
                .fixed-sn .page-footer .container-fluid, .fixed-sn main {
                    margin-left: 2%;
                    margin-right: 2%;
                }

                footer.page-footer .container-fluid {
                    width: auto;
                }
            }
                .container-fluid {
                    width: 100%;
                    padding-right: 15px;
                    padding-left: 15px;
                    margin-right: auto;
                    margin-left: auto;
                }


                div {
                    display: block;
                }
                footer.page-footer {
                    margin-top: 20px;
                    padding-top: 20px;
                    color: #fff;
                }
                .page-footer {
                    font-size: 0.9rem;
                }
    footer.page-footer .footer-copyright {
        overflow: hidden;
        height: 50px;
        line-height: 50px;

        background-color: rgba(244, 243, 255, 0.99);
        text-align: center;
        font-size: 1.5em;
        color: #0c91e5;
    }
    footer.page-footer ul {
        list-style-type: none;
        padding: 0;
    }
    dl, ol, ul {
        margin-top: 0;
        margin-bottom: 1rem;
    }
    footer.page-footer .social-section ul li {
        display: inline-block;
    }


    .btn-floating.btn-sm i, .btn-floating.btn-small i, .btn-floating.wishlist i {
        font-size: .96154rem;
        line-height: 36.15385px;
    }
    .btn-floating i {
        display: inline-block;
        width: inherit;
        color: #617eff;
        font-size: 1.25rem;
        line-height: 47px;
        text-align: center;
    }

    .fa {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    footer.page-footer .call-to-action {
        text-align: center;
        padding-top: 1.3rem;
        padding-bottom: .5rem;
        color: #0c91e5;
    }
    footer.page-footer .call-to-action ul li {

        padding-right: 10px;
    }
    .stylish-color-dark {
        background-color: #fff!important;
        box-shadow: 0px 1px 1px 1px #000;
    }
    .btn-floating.btn-sm i, .btn-floating.btn-small i, .btn-floating.wishlist i {
        font-size: 1.96154rem;
        line-height: 36.15385px;
        color: unset;
    }

</style>
<!--Footer-->
<footer class="page-footer stylish-color-dark center-on-small-only">

    <!--Footer Links-->
    <!--/.Footer Links-->
    <div class="call-to-action">
        <ul>
            <li>
                <h4 class="mb-1"><b>Not a Card Holder Yet?</b></h4>
            </li>
            <li><a href="{{route('auth.signup')}}" class="btn btn-danger btn-rounded">Sign up!</a></li>
        </ul>
    </div>
    <!--/.Call to action-->

    <hr>

    <!--Social buttons-->
    <div class="social-section text-center">
        <ul>

            <li><a href="https://www.facebook.com/emerecard/" class="btn-floating btn-sm btn-fb"><i class="fa fa-facebook"> </i></a></li>
            <li><a href="https://twitter.com/emerecard" class="btn-floating btn-sm btn-tw"><i class="fa fa-twitter"> </i></a></li>
            <li><a href="https://www.linkedin.com/company/27163319/" class="btn-floating btn-sm btn-li"><i class="fa fa-linkedin"> </i></a></li>


        </ul>
    </div>
    <!--/.Social buttons-->

    <!--Copyright-->
    <div class="footer-copyright">
        <div class="container-fluid">
            © 2018 Copyright. <a href="https://www.emerecard.com"> EmeRe Card </a>

        </div>
    </div>
    <!--/.Copyright-->

</footer>

    <!-- <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div> -->

    @include('partials.javascripts')


    <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>




</body>
</html>
