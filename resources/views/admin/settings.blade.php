@extends('layouts.app')

@section('content')
<div id="snackbar"></div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Crop Pic</h4>
            </div>
            <div class="modal-body">

              <div id="upload-demo" style="width:350px"></div>

    <input type="file" id="upload"  style="display:none;">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button class="btn btn-success upload-result">Save Image</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          ACCOUNT SETTINGS
        </h1>

        <ol class="breadcrumb">
<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active"><a href="{{route('invoice.all')}}">Account Settings</a></li>
</ol>
      </section>


      <!-- Main content -->

  <div class="col-md-8">

    <div class="panel panel-default">
        <div class="panel-heading">
            Basic Details
        </div>

        <div class="panel-body">
            <div class="row">

              <div class="col-md-4" style="">
              <div id="upload-demo-i" class="text-center" style="margin-top:30px">
          <img src="{{$pic}}" style="max-width:120px;">


              </div>
<div class="text-center">
                                  <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-default" onclick="document.getElementById('upload').click()">
                    Change Pic
                  </button>

</div>

              </div>
              <div class="col-xs-8">

                <h3>Update My Details</h3>

                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.users.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name',  auth::user()->name, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>


                <div class="col-xs-12 form-group">
                    {!! Form::label('email', trans('quickadmin.users.fields.email').'*', ['class' => 'control-label']) !!}
                    {!! Form::email('email',  auth::user()->email, ['class' => 'form-control', 'placeholder' => '', 'required' => '','disabled' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>


                <div class="col-xs-12 form-group">
                    {!! Form::label('', 'Phone*', ['class' => 'control-label']) !!}
                    {!! Form::tel('tel', auth::user()->phone , ['class' => 'form-control', 'placeholder' => '']); !!}
                    <p class="help-block"></p>
                    @if($errors->has('tel'))
                        <p class="help-block">
                            {{ $errors->first('tel') }}
                        </p>
                    @endif
                </div>

                                <div class="col-xs-12 form-group">
            {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-success']) !!}

            <a href="{{route('auth.change_password')}}" class="btn btn-primary">Change Password</a>
          </div>
            {!! Form::close() !!}

          </div>


        </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Crop Pic</h4>
            </div>
            <div class="modal-body">

              <div id="upload-demo" style="width:350px"></div>

  <input type="file" id="upload"  style="display:none;">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button class="btn btn-success upload-result">Save Image</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


    <script type="text/javascript">

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});



$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'square'
    },
    boundary: {
        width: 300,
        height: 300
    }
});


$('#upload').on('change', function () {
	var reader = new FileReader();
    reader.onload = function (e) {
    	$uploadCrop.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
    }
    reader.readAsDataURL(this.files[0]);
});


$('.upload-result').on('click', function (ev) {
  var x = document.getElementById("snackbar");
	$uploadCrop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (resp) {
		$.ajax({
      url: "{{ route('admin.image-crop') }}",
      type: "POST",
      data: {"image":resp},
      success: function (data) {
				html = '<img src="' + resp + '" style="max-width:120px;" />';
        $('#modal-default').modal('hide');
        x.innerHTML = data.msg;
               // Add the "show" class to DIV
               x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
				$("#upload-demo-i").html(html);
            //$('#finsih').prop('disabled', false);
			}
		});
	});
});


</script>

</body>
</html>



@stop
