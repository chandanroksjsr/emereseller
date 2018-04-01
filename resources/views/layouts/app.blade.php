<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials.javascripts')
    @include('partials.head')

</head>


<body class="hold-transition
@if(Auth::user()->role_id == "1")
   skin-blue
   @elseif(Auth::user()->role_id == "2")
   skin-blue
   @elseif(Auth::user()->role_id == "4")
   skin-blue
   @endif
 sidebar-mini fixed sidebar-collapse">

<div id="wrapper">

@include('partials.topbar')
@include('partials.sidebar')


    <div class="content-wrapper">

        <section class="content">
            @if(isset($siteTitle))
                <h3 class="page-title">
                    {{ $siteTitle }}
                </h3>
            @endif

            <div class="row">
                <div class="col-md-12">

                    @if (Session::has('message'))
                        <div class="alert alert-info">
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')

                </div>
            </div>
        </section>
    </div>
</div>

{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Logout</button>
{!! Form::close() !!}



</body>
</html>
