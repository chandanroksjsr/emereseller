@extends('layouts.app')

@section('content')









<style>

.folder * {
  width: 100px;
}
.folder {
  float: left;
  height: 152px;
  //padding: 20px;
  margin-right: 0px;
  margin-bottom: 15px;
  border-radius: 2px;
  //overflow: hidden;
  cursor: pointer;
}

.folder:hover h1 {
  display: none;
}
.folder:hover p.cooltip {
  opacity: 1;
  top: 0;
}

.folder * {
  text-align: center;
}

.folder i {
  margin: 0;
  font-size: 100px;
color: #e9335d;
}

.folder h1 {
  position: relative;
  display: block;
  top: -37px;
  font-size: 20px;
  font-weight: 400;
}

.folder p.cooltip {
  position: relative;
  top: 5px;
  left: -50%;
  margin-left: 35px;
  background: #212121;
  font-size: 15px;
  color: white;
  border-radius: 4px;
  padding: 10px 20px;
  padding-right: 30px;
  width: 100px;
  opacity: 0;
}
.folder p.cooltip:before {
  content: '';
  position: absolute;
  display: block;
  top: -4px;
  left: 50%;
  margin-left: -5px;
  height: 10px;
  width: 10px;
  border-radius: 2px;
  background-color: #212121;
  transform: rotate(45deg);
}
</style>














                  <!-- Content Header (Page header) -->
                  <section class="content-header">
                    <h1>
                      Invoices

                    </h1>

                    <ol class="breadcrumb">
      <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="#">My Invoices</a></li>

      </ol>
                  </section>
                  <section class="content">

                      <div class="row">
                        <div class="col-md-9">

                          <!-- Profile Image -->
                          <div class="box box-primary">
                            <div class="box-body box-profile">
@if (count($invoices) > 0)
@foreach($invoices as $invoice)
<div class="folder col-md-3">
  <a href="{{ route('invoice', Crypt::encryptString($invoice['card_id'])) }}">
   <i class="fa fa-file-pdf-o"></i>
     <p><b>{{ date('d-M-Y', strtotime( $invoice['order_time'] )) }} #00{{$invoice['id']}}</b></p></a>
 </div>

@endforeach

@else

<center><img src="{{asset('images/noinv.png')}}" style="max-width:150px;">
<h5 style="font-weight:800;">Oops! You are seeing this message because there is no Successful  Transaction found associated with this account!</h5></center>
<center><a href="{{route('Card')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create Card Now</a> <a href="{{route('Card.manage')}}" class="btn btn-success"><i class="fa fa-wrench"></i> Manage Cards</a> </center>



        @endif

                            </div>
                          </div>

                                                  </div>
                  </div>
                </section>





                  <!-- /.content -->
                  <div class="clearfix"></div>






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
