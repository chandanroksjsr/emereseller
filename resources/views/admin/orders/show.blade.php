@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

  <!-- <h3 class="page-title">{{$card->first_name}} {{$card->last_name}}'s Profile</h3> -->

  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="{{$file['url']}}" alt="User profile picture">

          <h3 class="profile-username text-center">{{$card->first_name}} {{$card->last_name}}</h3>

          <p class="text-muted text-center">{{$card->gender}} - {{$card->date_of_birth}}</p>
          <center>
@if($card->cardno == 'UNASSIGNED')

<a href="{{ route('admin.orders.assign',['post' => $card->id]) }}" class="btn btn-primary">
    <i class="fa fa-user"></i>
    <span class="title">
      ASSIGN CARD
    </span>
</a>

@else
<a class="btn btn-primary" href="{{ route('admin.orders.show',[$card->id]) }}"> VIEW CARD</a><br><br/>

<b>CARD.NO : {{$card->cardno}}</b>
@endif
</center>

<!--
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Followers</b> <a class="pull-right">1,322</a>
            </li>
            <li class="list-group-item">
              <b>Following</b> <a class="pull-right">543</a>
            </li>
            <li class="list-group-item">
              <b>Friends</b> <a class="pull-right">13,287</a>
            </li>
          </ul>

          <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">About Me</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

          <p class="text-muted">
            B.S. in Computer Science from the University of Tennessee at Knoxville
          </p> -->
<!--
          <hr> -->

          <strong><i class="fa fa-map-marker margin-r-5"></i>Delivery Location</strong>

          <p class="text-muted">{{$order->door_no}}, {{$order->address}}, {{$order->city}}, {{$order->state}}-{{$order->pin}}</p>

          <!-- <hr>

          <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

          <p>
            <span class="label label-danger">UI Design</span>
            <span class="label label-success">Coding</span>
            <span class="label label-info">Javascript</span>
            <span class="label label-warning">PHP</span>
            <span class="label label-primary">Node.js</span>
          </p>

          <hr> -->

          <!-- <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li ><a href="#activity" data-toggle="tab"><i class="fa fa-user"></i> Personal Details</a></li>
          <li><a href="#timeline" data-toggle="tab"><i class="fa fa-medkit"></i> Medical Profile</a></li>
          <li><a href="#settings" data-toggle="tab"><i class="fa fa-info-circle"></i>  Emergency Contacts</a></li>
          <li class="active"><a href="#settings" data-toggle="tab"><i class="fa fa-credit-card" aria-hidden="true"></i>  Card</a></li>
          <li><a href="#track" data-toggle="tab"><i class="fa fa-map" aria-hidden="true"></i>  Order Status</a></li>
        </ul>
        <div class="tab-content">
          <div class=" tab-pane" id="activity">
            <!-- Post -->
            <div class="post">
              <form class="form-horizontal">
                <div class="form-group col-sm-6">
                  <label for="inputName" class="col-sm-4 control-label">First Name</label>

                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="inputName" value="{{$card->first_name}}" placeholder="unavailable">
                  </div>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputName" class="col-sm-4 control-label">Last Name</label>

                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="inputName" value="{{$card->last_name}}" placeholder="unavailable">
                  </div>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputName" class="col-sm-4 control-label">Display Name</label>

                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="inputName" value="{{$card->display_name}}" placeholder="unavailable">
                  </div>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputEmail" class="col-sm-4 control-label">Email</label>

                  <div class=" col-sm-8">
                    <input type="email" class="form-control" value="{{$card->email}}" id="inputEmail" placeholder="unavailable">
                  </div>
                </div>

                <div class="form-group col-sm-6">
                  <label for="inputEmail" class="col-sm-4 control-label">Phone</label>

                  <div class=" col-sm-8">
                    <input type="email" class="form-control" value="{{$card->mobile}}" id="inputEmail" placeholder="unavailable">
                  </div>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputEmail" class="col-sm-4 control-label">Office Phone</label>

                  <div class=" col-sm-8">
                    <input type="email" class="form-control" value="{{$card->officephone}}" id="inputEmail" placeholder="unavailable">
                  </div>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputEmail" class="col-sm-4 control-label">Landline</label>

                  <div class=" col-sm-8">
                    <input type="email" class="form-control" value="{{$card->landline}}" id="inputEmail" placeholder="unavailable">
                  </div>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputEmail" class="col-sm-4 control-label">Aadhaar</label>

                  <div class=" col-sm-8">
                    <input type="email" class="form-control" value="{{$card->aadhaar}}" id="inputEmail" placeholder="unavailable">
                  </div>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputEmail" class="col-sm-4 control-label">Door No</label>

                  <div class=" col-sm-8">
                    <input type="email" class="form-control" value="{{$card->doorno}}" id="inputEmail" placeholder="unavailable">
                  </div>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputEmail" class="col-sm-4 control-label">Building/Street</label>

                  <div class=" col-sm-8">
                    <input type="email" class="form-control" value="{{$card->buildingstreet}}" id="inputEmail" placeholder="unavailable">
                  </div>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputEmail" class="col-sm-4 control-label">Area/Locality</label>

                  <div class=" col-sm-8">
                    <input type="email" class="form-control" value="{{$card->arealocality}}" id="inputEmail" placeholder="unavailable">
                  </div>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputEmail" class="col-sm-4 control-label">City</label>

                  <div class=" col-sm-8">
                    <input type="email" class="form-control" value="{{$card->city}}" id="inputEmail" placeholder="unavailable">
                  </div>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputEmail" class="col-sm-4 control-label">State</label>

                  <div class=" col-sm-8">
                    <input type="email" class="form-control" value="{{$card->state}}" id="inputEmail" placeholder="unavailable">
                  </div>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputEmail" class="col-sm-4 control-label">Pincode</label>

                  <div class=" col-sm-8">
                    <input type="email" class="form-control" value="{{$card->pincode}}" id="inputEmail" placeholder="unavailable">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.post -->

            <!-- Post -->

            <!-- /.post -->
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="timeline">
            <!-- The timeline -->
          </div>
          <!-- /.tab-pane -->
          <style>
          @media print {
  body {
    width:200; /*width of index card*/
    height:400; /*height of index card*/
  }
  /* etc */
}
</style>

          <div class="active tab-pane" id="settings">
            <center>
            <img src="{{asset('images/'.$card->id.'.jpg')}}" width="500px" id="print-el"><br><br>
            <button class="btn btn-success btn-lg" id="print" onclick="printContent('print-el');" >Print Card</button>
          </center>
            <script>
  function printContent(el){

  var restorepage = $('body').html();
  var printcontent = $('#' + el).clone();

  $('body').empty().html(printcontent);
  window.print();
  $('body').html(restorepage);
  }
  </script>
          </div>

          <div class="tab-pane" id="track">
  <div class="post">
    <h4>ORDER STATUS UPDATE</h4>

    <ul class="timeline timeline-inverse">
      <!-- timeline time label -->
      <li class="time-label">
            <span class="bg-red">
              {{$order->order_time}}
            </span>
      </li>
      <!-- /.timeline-label -->
      <!-- timeline item -->

      <li>
<i class="fa fa-check bg-green"></i>
        <div class="timeline-item">
          <span class="time"><i class="fa fa-clock-o"></i> {{ $order['order_time'] }}</span>

          <h3 class="timeline-header"><a href="#">ORDER RECEIVED</a></h3>

          <div class="timeline-body">
          you order is recieved and qr code will be assigned shortly and the kit will be delivered to you shortly
          </div>

        </div>






      </li>

      <li>
<i
@if($card->cardno == 'UNASSIGNED')
class="fa fa-clock-o
bg-gray
@else
class="fa fa-check
bg-green
@endif

"></i>
        <div class="timeline-item">
          <span class="time"><i class="fa fa-clock-o"></i> {{ $track['created_at'] }}</span>

          <h3 class="timeline-header"><a href="#">QR-CODE ASSIGNED</a></h3>

          <div class="timeline-body">
        QR code is assigned to your card and will be shared with our curior partner to get your kit delivered ASAP.
          </div>

        </div>






      </li>






      <li id="rel">

        <i class="@if($arr['partner'] == '')
        fa fa-clock-o bg-gray
        @else
        fa fa-check bg-green
        @endif
        "></i>



        <div class="timeline-item">
          <span class="time"><i class="fa fa-clock-o"></i>{{ $arr['updated'] }}</span>

          <h3 class="timeline-header"><a href="#">SHIPPED VIA CURIOR PARTNER</a></h3>

          <div class="timeline-body">
            Your Order Shipped by <input type="text" placeholder="curior partner name"class="form-control" value="{{ $arr['partner'] }}" id="partner">
             tracking number <input type="text" id="tracking" value="{{ $arr['number'] }}" placeholder="Tracking Number"class="form-control">




          </div>
          <div class="timeline-footer">
            <a class="btn btn-primary btn-xs addtrack">Update</a>
            <a class="btn btn-danger btn-xs">Clear</a>
          </div>
          <div id="snackbar"></div>
        </div>
      </li>
      <li>
        <i class="fa  fa-clock-o bg-gray"></i>

        <div class="timeline-item">
          <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

          <h3 class="timeline-header"><a href="#">Delivered</a></h3>

          <div class="timeline-body">
            Your Order is delivered!<br>
            <b>Thanks!</b> for your subscription we are always there behind you in case of Emergency.
          </div>
          <div class="timeline-footer">

          </div>
        </div>
      </li>


      <li class="time-label">
            <span class="bg-green">
            awaited
            </span>
      </li>













    </ul>




</div>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <script>
  $('.addtrack').on('click',function(){
  var partner = $('#partner').val();
  var number = $('#tracking').val();

  $.post("{{ route('admin.postInsertShip',[$track->id]) }}",{partner:partner,number:number}, function(data){
    $("#rel").load(location.href + " #rel>*", "");

    var x = document.getElementById("snackbar")
x.innerHTML = data;
       // Add the "show" class to DIV
       x.className = "show";

       // After 3 seconds, remove the show class from DIV
       setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  })})



  </script>

@stop
