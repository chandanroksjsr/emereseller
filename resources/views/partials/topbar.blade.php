
<script type="text/javascript">
var Tawk_API=Tawk_API||{};


Tawk_API.visitor = {
    name  : '{{Auth::user()->name}}',
    email : '{{Auth::user()->email}}',
    phone : '{{Auth::user()->phone}}',
    hash : '{{hash_hmac("sha256",Auth::user()->email,"d94c33c99b2f6a397f30d8df232ecc442964b752") }}'
};

var Tawk_LoadStart=new Date();







(function(){



var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];



s1.async=true;
s1.src='https://embed.tawk.to/59b1799a4854b82732feebcf/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');

s0.parentNode.insertBefore(s1,s0);
})();




</script>
<header class="main-header">

    <a href="{{ url('/admin/home') }}" class="logo"
       style="font-size: 16px;">

        <span class="logo-mini">
          <img src="https://image.prntscr.com/image/i3EnxmITQpu0P6jGJYOL5A.png" width="50px"></span>

        <span class="logo-lg" style="font-weight:900;">
      <img src="{{url('images/elogo.png')}}" width="100px"></span></span>
    </a>

    <nav class="navbar navbar-static-top">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>


        <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">


















                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="{{$data}}" class="user-image" alt="User Image">
                      <span class="hidden-xs">Welcome, <strong>{{ucfirst(Auth::user()->name)}}</strong> &nbsp;&nbsp;<i class="fa fa-caret-down"></i> </span>
                    </a>
                    <ul class="dropdown-menu">

                      <li class="user-header">
                        <img src="{{$data}}" class="img-circle" alt="User Image">

                        <p>





                         {{ucfirst(Auth::user()->name)}}
                          <small>Member since: <strong> {{ date('M d, Y', strtotime(Auth::user()->created_at)) }}</strong></small>

                        </p>
                      </li>


                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="{{route('settings')}}" class="btn btn-default btn-flat"><i class="fa fa-wrench"></i> Settings</a>
                        </div>
                        <div class="pull-right">
                          <a href="#logout" onclick="$('#logout').submit();" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                        </div>
                      </li>
                    </ul>
                  </li>


                </ul>
              </div>


    </nav>
</header>
