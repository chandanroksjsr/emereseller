@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

<style>


.panel
{
    text-align: center;
}
.panel:hover { box-shadow: 0 1px 5px rgba(0, 0, 0, 0.4), 0 1px 5px rgba(130, 130, 130, 0.35); }
.panel-body
{
    padding: 0px;
    text-align: center;
}

.the-price
{
    background-color: rgba(220,220,220,.17);
    box-shadow: 0 1px 0 #dcdcdc, inset 0 1px 0 #fff;
    padding: 20px;
    margin: 0;
}

.the-price h1
{
    line-height: 1em;
    padding: 0;
    margin: 0;
}

.subscript
{
    font-size: 25px;
}

/* CSS-only ribbon styles    */
.cnrflash
{
    /*Position correctly within container*/
    position: absolute;
    top: -9px;
    right: 4px;
    z-index: 1; /*Set overflow to hidden, to mask inner square*/
    overflow: hidden; /*Set size and add subtle rounding  		to soften edges*/
    width: 100px;
    height: 100px;
    border-radius: 3px 5px 3px 0;
}
.cnrflash-inner
{
    /*Set position, make larger then 			container and rotate 45 degrees*/
    position: absolute;
    bottom: 0;
    right: 0;
    width: 145px;
    height: 145px;
    -ms-transform: rotate(45deg); /* IE 9 */
    -o-transform: rotate(45deg); /* Opera */
    -moz-transform: rotate(45deg); /* Firefox */
    -webkit-transform: rotate(45deg); /* Safari and Chrome */
    -webkit-transform-origin: 100% 100%; /*Purely decorative effects to add texture and stuff*/ /* Safari and Chrome */
    -ms-transform-origin: 100% 100%;  /* IE 9 */
    -o-transform-origin: 100% 100%; /* Opera */
    -moz-transform-origin: 100% 100%; /* Firefox */
    background-image: linear-gradient(90deg, transparent 50%, rgba(255,255,255,.1) 50%), linear-gradient(0deg, transparent 0%, rgba(1,1,1,.2) 50%);
    background-size: 4px,auto, auto,auto;
    background-color: #aa0101;
    box-shadow: 0 3px 3px 0 rgba(1,1,1,.5), 0 1px 0 0 rgba(1,1,1,.5), inset 0 -1px 8px 0 rgba(255,255,255,.3), inset 0 -1px 0 0 rgba(255,255,255,.2);
}
.cnrflash-inner:before, .cnrflash-inner:after
{
    /*Use the border triangle trick to make  				it look like the ribbon wraps round it's 				container*/
    content: " ";
    display: block;
    position: absolute;
    bottom: -16px;
    width: 0;
    height: 0;
    border: 8px solid #800000;
}
.cnrflash-inner:before
{
    left: 1px;
    border-bottom-color: transparent;
    border-right-color: transparent;
}
.cnrflash-inner:after
{
    right: 0;
    border-bottom-color: transparent;
    border-left-color: transparent;
}
.cnrflash-label
{
    /*Make the label look nice*/
    position: absolute;
    bottom: 0;
    left: 0;
    display: block;
    width: 100%;
    padding-bottom: 5px;
    color: #fff;
    text-shadow: 0 1px 1px rgba(1,1,1,.8);
    font-size: 0.95em;
    font-weight: bold;
    text-align: center;
}

</style>
<div id="snackbar"></div>

      <!-- <div class="id-card-tag"></div>
<div class="id-card-tag-strip"></div>
<div class="id-card-hook"></div> -->
<div class="container">
  <center><h2><b>SELECT PLAN</b></h2></center>
    <div class="row">
@foreach ($plans as $plan)
        <div class="col-xs-12 col-md-3">
            <div class="panel panel-success">
                <!-- <div class="cnrflash">
                    <div class="cnrflash-inner">
                        <span class="cnrflash-label">MOST
                            <br>
                            POPULR</span>
                    </div>
                </div> -->
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {{$plan['name']}}</h3>
                </div>
                <div class="panel-body">
                    <div class="the-price">
                        <h1>
                              Rs. {{$plan['price']}} <span class="subscript">/Year</span></h1>
                        <!-- <small>1 month FREE trial</small> -->
                    </div>
<div class="col-sm-12">
<h5><b>Discription</b></h5>
<p>
  {{$plan['discription']}}
</p>
</div>
<div class="col-sm-12">
<h5><b>Includes</b></h5>
<p>
  {{$plan['includes']}}
</p>
</div>



                </div>
                <div class="panel-footer">
                    <a href="{{url('checkout')}}/{{ $id }}/{{ Crypt::encryptString($plan['id'])}}" class="btn btn-success" role="button">SELECT</a>

            </div>
        </div>
      </div>
        @endforeach


</div></div>


<script>
















</script>


@endsection
