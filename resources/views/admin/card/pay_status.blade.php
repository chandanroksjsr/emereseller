@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

<style>

.id-card-holder {
			width: 350px;
		    padding: 4px;
		    margin: 0 auto;

		    border-radius: 5px;
		    position: relative;
		}
		.id-card-holder:after {
		    content: '';
		    width: 7px;
		    display: block;
		    background-color: #0a0a0a;

		    position: absolute;
		    top: 105px;
		    border-radius: 0 5px 5px 0;
		}
		.id-card-holder:before {
		    content: '';
		    width: 7px;
		    display: block;
		    background-color: #0a0a0a;

		    position: absolute;
		    top: 105px;
		    left: 222px;
		    border-radius: 5px 0 0 5px;
		}
		.id-card {

			background-color: #fff;
			padding: 10px;
			border-radius: 10px;
			text-align: center;
      height: 200px;
			box-shadow: 0 0 1.5px 0px #b9b9b9;
		}
		.id-card img {
			margin: 0 auto;
		}
		.header img {
			width: 100px;
    		margin-top: 0px;
		}
		.photo img {
			width: 80px;
			height: 80px;
    		margin-top: 15px;
		}
		/* h2 {
			font-size: 15px;
			margin: 5px 0;
		}
		h3 {
			font-size: 12px;
			margin: 2.5px 0;
			font-weight: 300;
		} */
		.qr-code img {
			width: 50px;
		}

		.id-card-hook {
			background-color: #000;
		    width: 70px;
		    margin: 0 auto;
		    height: 15px;
		    border-radius: 5px 5px 0 0;
		}
		.id-card-hook:after {
			content: '';
		    background-color: #d7d6d3;
		    width: 47px;
		    height: 6px;
		    display: block;
		    margin: 0px auto;
		    position: relative;
		    top: 6px;
		    border-radius: 4px;
		}
		.id-card-tag-strip {
			width: 45px;
		    height: 40px;
		    background-color: #0950ef;
		    margin: 0 auto;
		    border-radius: 5px;
		    position: relative;
		    top: 9px;
		    z-index: 1;
		    border: 1px solid #0041ad;
		}
		.id-card-tag-strip:after {
			content: '';
		    display: block;
		    width: 100%;
		    height: 1px;
		    background-color: #c1c1c1;
		    position: relative;
		    top: 10px;
		}
		.id-card-tag {
			width: 0;
			height: 0;
			border-left: 100px solid transparent;
			border-right: 100px solid transparent;
			border-top: 100px solid #0958db;
			margin: -10px auto -30px auto;
		}
		.id-card-tag:after {
			content: '';
		    display: block;
		    width: 0;
		    height: 0;
		    border-left: 50px solid transparent;
		    border-right: 50px solid transparent;
		    border-top: 100px solid #d7d6d3;
		    margin: -10px auto -30px auto;
		    position: relative;
		    top: -130px;
		    left: -50px;
		}


</style>




    <div class="panel panel-default">
        <div class="panel-heading">
      Payment Status   <span class="label label-warning label-lg"> {{$response->payment_request->status}} </span>
        </div>

        <div class="panel-body">
					<div class="row">

					      <div class="col-md-4 col-xs-12">
									<div class="id-card-holder">
										<div class="id-card" style="box-shadow:0px 0px 1px 0px #000;background:url('https://image.prntscr.com/image/RJve3bH4SgOLOit3oZd83A.png');">
											<div class="header" style="">
												<img src="https://image.prntscr.com/image/nsdP0f_zSguGn1_43ipLnQ.png" style="width:100%;">
											</div>
											<div class="details" style="width:60%; float:left;text-align:left;padding:10px;">
											<b>{{ strtoupper($card['first_name'].' '.$card['last_name']) }}</b>
								<br>
								Price : {{$card_plan['price']}}.00 INR

											</div>
											<div class="photo" style="float:left;width:40%;text-align: right;">
												@if($n['url']=='nope')

									<img src="https://upload.wikimedia.org/wikipedia/commons/3/37/No_person.jpg">

											@else
												<img src="{{ $n['url'] }}">

										@endif
											</div>

											<hr style="    margin-top: 5px;
										margin-bottom: 5px;">

									<hr style="    margin-top: 5px;
										margin-bottom: 5px;">
											<div class="qr-code" style="text-align: center;">
												<center style="font-weight:400;padding:10px;"><strong>PLAN:</strong> {{$card_plan['name']}}</center>

								 <a href="{{ route('Card.main', Crypt::encryptString($card['id'])) }}" class="btn btn-primary btn-xs" style="border-radius: 0px;"><i class="fa fa-cog"></i> Edit Card</a>



			 @if($response->payment_request->payment->status == 'Failed')

			 																				   <a href="{{ route('checkout', Crypt::encryptString($card['id'] )) }}" class="btn btn-success btn-xs" style="border-radius: 0px;"><i class="fa fa-undo"></i> Change Plan</a>
			 @else

   <a href="{{ route('checkout', Crypt::encryptString($card['id'] )) }}" class="btn btn-info btn-xs" style="border-radius: 0px;"><i class="fa fa-map"></i> Track Card</a>
			 @endif



											</div>


										</div>
									</div>




					              </div>
												<div class="col-md-7 col-xs-12">


													<div class="box box-primary">
													            <div class="box-header with-border">
													              <h3 class="box-title" style="font-weight:900;"><i class="fa fa-info-circle"></i> Payment Info</h3>
													            </div>
													            <!-- /.box-header -->
													            <div class="box-body">
													              <!-- <strong><i class="fa fa-book margin-r-5"></i> Plan</strong>

													              <p class="text-muted">
													                STANDARD
													              </p>

													              <hr> -->

													              <strong><i class="fa fa-map-marker margin-r-5"></i>Transaction ID
					</strong> :
					{{$response->payment_request->id}}

													           <hr>

													              <strong><i class="fa fa-money margin-r-5"></i> Instamojo Txn ID</strong> : {{$response->payment_request->payment->payment_id}}


													              <hr>

																				<strong><i class="fa fa-file-text-o margin-r-5"></i> Payment Status</strong> :
@if($response->payment_request->payment->status == 'Failed')

																				<span class="label label-danger label-lg">{{$response->payment_request->payment->status}}
</span>
@else

<span class="label label-success label-lg">{{$response->payment_request->payment->status}}
</span>
@endif



<hr>
@if($response->payment_request->payment->status == 'Failed')
 <a class="btn btn-primary"><i class="fa fa-envelope"></i> Contact Support</a>  <a href="{{url('checkout')}}/{{  Crypt::encryptString($order['card_id']) }}/{{ Crypt::encryptString($order['plan'])}}" class="btn btn-warning"><i class="fa fa-refresh"></i> Retry Payment</a>
@else
<a class="btn btn-success"><i class="fa fa-print"></i> Print Invoice</a>
@endif


													            </div>
													            <!-- /.box-body -->
													          </div>
















												</div>
					</div>






          <!-- <div class="id-card-tag"></div>
	<div class="id-card-tag-strip"></div>
	<div class="id-card-hook"></div> -->
  <div class="row">

</div>





      </div>
    </div>
@stop

@section('javascript')
<script>
console.log("{{ json_encode($response) }}");

</script>
@endsection
