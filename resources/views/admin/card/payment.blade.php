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

      <!-- <div class="id-card-tag"></div>
<div class="id-card-tag-strip"></div>
<div class="id-card-hook"></div> -->
<div class="container">
  <!-- <center><h2><b>Complete Order</b></h2></center> -->
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

       <a href="{{ route('checkout', Crypt::encryptString($card->id)) }}" class="btn btn-success btn-xs" style="border-radius: 0px;"><i class="fa fa-undo"></i> Change Plan</a>

        <a href="{{ route('Card.main', Crypt::encryptString($card->id)) }}" class="btn-xs btn btn-primary" style="border-radius: 0px;"><i class="fa fa-cog"></i> Edit Card</a>
      			</div>


      		</div>
      	</div>


              </div>
							<div class="col-md-7 col-xs-12">


								<div class="box box-primary">
								            <div class="box-header with-border">
								              <h3 class="box-title" style="font-weight:900;"><i class="fa fa-certificate"></i> We Got your Order</h3>
								            </div>
								            <!-- /.box-header -->
								            <div class="box-body">
								              <!-- <strong><i class="fa fa-book margin-r-5"></i> Plan</strong>

								              <p class="text-muted">
								                STANDARD
								              </p>

								              <hr> -->

								              <strong><i class="fa fa-map-marker margin-r-5"></i>Delivery Address (The Emerecard and the kit will be delivered to this address)
</strong>

								              <div class="row" style="padding:10px;">



                <div class="checkbox" style="padding-left:30px;">
	<label>
		<input type="checkbox" id="sameaddr"><span class="checkbox-material"><span class="check"></span></span>
		Use Same Address Provided in personal details
	</label>
</div>
<form id="delivery_address">

        <div class="col-sm-4">
<div class="form-group">
<label class="control-label">Recipent's Name</label>
<input type="text" id="rname" name="recipent_name" class="form-control" value="{{ $order['recipent_name'] }}">
<span class="material-input"></span><span class="material-input"></span></div>
</div>

<div class="col-sm-4">
<div class="form-group">
<label class="control-label">Recipent's Phone</label>
<input type="tel" id="rphone" class="form-control" name="recipent_phone" value="{{ $order['recipent_phone'] }}" maxlength="10" pattern="^[0-9]{10,10}$" required="">
<span class="material-input"></span><span class="material-input"></span></div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label class="control-label">Door.No</label>
<input type="text" id="dno" class="form-control" name="door_no" value="{{ $order['door_no'] }}">
<span class="material-input"></span><span class="material-input"></span></div>
</div>
        <div class="col-sm-4">
<div class="form-group">
<label class="control-label">Building, Street, Locality</label>
<input type="text" id="bls" class="form-control" name="address" value="{{ $order['address'] }}">
<span class="material-input"></span><span class="material-input"></span></div>
</div>
        <div class="col-sm-3">
<div class="form-group">
<label class="control-label">City</label>
<input type="text" id="city" class="form-control" name="city" value="{{ $order['city'] }}">
<span class="material-input"></span><span class="material-input"></span></div>
</div>
        <div class="col-sm-3">
<div class="form-group">
<label class="control-label">State</label>
<input type="text" id="state" class="form-control" name="state" value="{{ $order['state'] }}">
<span class="material-input"></span><span class="material-input"></span></div>
</div>

        <div class="col-sm-2">
<div class="form-group">
<label class="control-label">Pin Code</label>
<input type="tel" id="pin" class="form-control" name="pin" value="{{ $order['pin'] }}">
<span class="material-input"></span><span class="material-input"></span></div>
</div>
<input type="hidden" name="card_token" value="{{ Crypt::encryptString($id) }}">
<input type="hidden" id="charlie" value="'{{ Crypt::encryptString($card_plan['price']) }}'">
        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary" id="delive">
            Save Details
          </button>
          <div id="resultadr">

          </div>
        </div>
			</form>




															</div>
<hr>


<form >
	<div class="col-md-6"> <input type="text" class="form-control" placeholder="Offer/Corporate Code(OPTIONAL)"></div>
	<div class="col-md-6"> <button type="submit" class="btn btn-primary">APPLY CODE</button>
	</div>
</form>


								              <hr>

								              <strong><i class="fa fa-money margin-r-5"></i> Complete Payment</strong>

								              <p>
								                <span class="label label-info label-lg">Total Payable Amount : {{$card_plan['price']}}.00 INR</span>
																<button class="btn btn-success" id="pay" style="float:right;border-radius:0px;font-weight:700;"
@if(empty($order['recipent_phone']))
																disabled
																@else

																@endif
																>PROCEED TO PAY</button>
								                <!-- <span class="label label-success">Coding</span>
								                <span class="label label-info">Javascript</span>
								                <span class="label label-warning">PHP</span>
								                <span class="label label-primary">Node.js</span> -->
								              </p>

								              <hr>

															<strong><h4><i class="fa fa-file-text-o margin-r-5"></i> Notes</h4></strong>


														<p>* As your Payment is recieved we start to process your kit.</p>
														<p>* You Can Complete Your Profile Details later from your dashboard but we recommend you to do it right after payment.</p>
														<p>* Address you are providing here the EmeRe Card along with other kit will be delivered to the same address.</p>




								            </div>
								            <!-- /.box-body -->
								          </div>
















							</div>
</div></div>


<script>



  $('#sameaddr').click(function(){
//$('#resultadr').html("Please Wait...");



$.ajax({
type: 'POST',
url: '{{  route('Card.sameaddr') }}',
data: {id:'{{ Crypt::encryptString($id) }}'},
success: function(response) {
	console.log(response.card.success);
var obj = response;
if(obj.card.success=='1'){
$('#rname').val(obj.card.first_name + ' ' + obj.card.last_name);
$('#rphone').val(obj.card.mobile);
$('#dno').val(obj.card.doorno);
$('#bls').val(obj.card.buildingstreet + ' '+ obj.card.arealocality);
$('#city').val(obj.card.city);
$('#state').val(obj.card.state);
$('#pin').val(obj.card.pincode);
$('#delive').click();

}else{

//$('#resultadr').html("<br><div class='alert alert-danger'>"+obj.msg+"</div>");

}



}

});

});


$(function(){

$('#delivery_address').on('submit',function(e){

  $('#delive').html('<i class="fa fa-spin fa-spinner" aria-hidden="true"></i>');
  $('#delive').prop('disabled', true);
    $.ajaxSetup({
        header:$('meta[name="_token"]').attr('content')
    })
    e.preventDefault(e);

        $.ajax({
        type:"POST",
        url:'{{ route('delivery_address_add') }}',
        data:$(this).serialize(),
        dataType: 'json',
        success: function(data){
            var x = document.getElementById("snackbar");
						console.log(data);
          if(data.error==true){

$('#delive').html('<b>Proceed to Next</b> <i class="fa fa-arrow-circle-right"></i>');
  $('#delive').prop('disabled', false);
        x.innerHTML = data.msg;
               // Add the "show" class to DIV
               x.className = "show";


               // After 3 seconds, remove the show class from DIV
               setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

          }
          else if(data.error==false) {
            $('#card_id').val(data.token);
            $('#delive').html('<b>Proceed to Next</b> <i class="fa fa-arrow-circle-right"></i>');
              $('#delive').prop('disabled', false);
              $('#pay').prop('disabled', false);


          //  var x = document.getElementById("snackbar")
        x.innerHTML = data.msg;
               // Add the "show" class to DIV
               x.className = "show";

               // After 3 seconds, remove the show class from DIV
               setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

        //  $('#personal_detailsa').click();
          }
            // console.log(data.msg);
        },
        error: function(data){

        }
    })
    });
});










$('#pay').click(function() {
			               $('#pay').prop('disabled', false);
					$('#result').html("PLEASE WAIT Process your request");

var val1 = $('#rname').val();
var val2 = $('#email').val();
var val3 = $('#rphone').val();
var val4 = $('#charlie').val();
var val5 = '';
var val6 = '';

var valc = '{{ Crypt::encryptString($id) }}';

  var x = document.getElementById("snackbar");
$.ajax({
type: 'POST',
url:'{{ route('request_payment') }}',
data: { name: val1 ,email:val2
,phone:val3
,charlie:val4
,purpose:val5
,redirect:val6,
card_token:valc},
success: function(response) {
console.log(response);
if(response.error==false){

	x.innerHTML = response.msg;
				 // Add the "show" class to DIV
				 x.className = "show";
window.location.href= response.url;
				 // After 3 seconds, remove the show class from DIV
			//	 setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
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


@endsection
