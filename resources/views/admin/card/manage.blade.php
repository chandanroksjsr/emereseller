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



<div id="snackbar"></div>
    <div class="panel panel-default">
        <div class="panel-heading">
        Manage My Cards
        </div>

        <div class="panel-body">
          <!-- <div class="id-card-tag"></div>
	<div class="id-card-tag-strip"></div>
	<div class="id-card-hook"></div> -->
  <div class="row">
    <script>
    </script>
    @if (count($carda) > 0)
        @foreach ($carda as $card)
	<span style="display:none;">{{@$a = Crypt::encryptString($card->id)}}</span>
<div class="col-md-6 col-xs-12" id='{{$a}}xy'>
  <div class="id-card-holder">
		<div class="id-card" style="box-shadow:0px 0px 1px 0px #000;">
			<div class="header" style="">
				<img src="https://image.prntscr.com/image/nsdP0f_zSguGn1_43ipLnQ.png" style="width:100%;">
			</div>
			<div class="details" style="width:60%; float:left;text-align:left;padding:10px;">
			<b>{{ strtoupper($card['first_name'].' '.$card['last_name']) }}</b><br>
				Card No- <b>{{$card['cardno']}}</b>

			</div>
			<div class="photo" style="float:left;width:40%;text-align: right;">
				@if($card['url']=='nope')

	<img src="https://upload.wikimedia.org/wikipedia/commons/3/37/No_person.jpg">

			@else
				<img src="{{ $card['url'] }}">

		@endif
			</div>

      <hr style="    margin-top: 5px;
    margin-bottom: 5px;">

		@if($card['order']['payment_status']=='Credit')
      Status: Active

			@else
			  Status: Inactive / Payment Pending

			@endif
	<hr style="    margin-top: 5px;
    margin-bottom: 5px;">
			<div class="qr-code" style="text-align: center;">

				@if($card['order']['payment_status']=='Credit')
<a href="{{ route('Card.main', $a) }}" class="btn btn-success btn-xs" style="border-radius: 0px;"><i class="fa fa-cog"></i> Edit Card</a>

<a href="{{ route('invoice', $a) }}" class="btn btn-primary btn-xs" style="border-radius: 0px;"><i class="fa fa-file-o"></i> View Invoice</a>
				@else


<a href="{{ url('checkout')}}/{{ $a }}" class="btn btn-primary btn-xs" style="border-radius: 0px;"><i class="fa fa-money"></i> Pay Now</a>

<a href="{{ route('Card.main', $a) }}" class="btn btn-success btn-xs" style="border-radius: 0px;"><i class="fa fa-cog"></i> Edit Card</a>



 <button class="btn-xs btn btn-danger" id='{{urldecode($a)}}' style="border-radius: 0px;"><i class="fa fa-remove"></i> Delete Card</button>

@endif



			</div>
			<script>
		//	var data = $('#{{ $a }}').val();


			$('#{{$a}}').click(function() {
						               $('#{{urldecode($a)}}').prop('disabled', false);
							//	$('#result').html("PLEASE WAIT Process your request");

			var val1 = '{{$a}}';


			  var x = document.getElementById("snackbar");
			$.ajax({
			type: 'POST',
			url:'{{ route('destroy_card') }}',
			data: { desi_token: val1},
			success: function(response) {
			console.log(response);
			if(response.error==false){

				x.innerHTML = response.msg;
							 // Add the "show" class to DIV
							 x.className = "show";
$('#'+val1+'xy').remove();
							 // After 3 seconds, remove the show class from DIV
					 setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
			}else{
				x.innerHTML = response.msg;
							 // Add the "show" class to DIV
							 x.className = "show";

							 // After 3 seconds, remove the show class from DIV
					 setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
			}
			}

			});

			});

			</script>

		</div>
	</div>
        </div>

        @endforeach
@else

<center><img src="{{url('images/not.jpg')}}">
<h5 style="font-weight:800;">Oops! You are seeing this as you have not registered any card yet!</h5></center>
<center><a href="{{route('Card')}}" class="btn btn-primary">Create Card Now</a></center>



        @endif
</div>





      </div>
    </div>
@stop

@section('javascript')

@endsection
