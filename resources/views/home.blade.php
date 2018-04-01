@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">Welcome to India's First Emergency Response Communication System</div>

            <div class="panel-body text-center">
{{Auth::user()->pico}}



              <!-- <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#activity" data-toggle="tab">Latest Feeds</a></li>
                                                </ul>
                        <div class="tab-content">
                          <div class="active tab-pane" id="activity">

                          </div>

                        </div>

                      </div> -->

<p>Create a Card with 4 Simple steps
</p>
<img src="https://www.lexisnexis.com/legalnewsroom/resized-image.ashx/__size/480x320/__key/communityserver-components-userfiles/00-00-00-21-11/umbrella-protect-family.jpg" style="max-width:150px;"/>

<p style="font-weight:600;font-size:1.2em;">

  "Protect yourself and your loved ones at just 42 INR/Month, i.e. just 499/Year"</p>
<a href="{{route('Card')}}" class="btn btn-primary btn-lg">Create Card Now</a>


















          </div>
        </div>
      </div>


      <div class="col-md-5">
<!-- start feedwind code --> <script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="62992/"></script> <!-- end feedwind code -->
          </div>






</div>













  <!-- <h3 class="page-title"><i class="fa fa-dashboard"></i> DASHBOARD</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">SIGN UPS</div>

                <div class="panel-body">




                  <div id="temps_div"></div>


                @linechart('Temps', 'temps_div')
              </div>
            </div>
          </div>

                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">CARD SUBSCRIPTIONS</div>

                        <div class="panel-body">

                <div id="temps_div1"></div>


              @linechart('Temps1', 'temps_div1')


                </div>
            </div>
        </div>
    </div> -->




















@endsection
