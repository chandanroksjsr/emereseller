<meta charset="utf-8">
<title>
    @lang('quickadmin.quickadmin_title')
</title>

<meta http-equiv="X-UA-Compatible"
      content="IE=edge">
<meta content="width=device-width, initial-scale=1.0"
      name="viewport"/>
<meta http-equiv="Content-type"
      content="text/html; charset=utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

<link href="{{ url('css/newapp.css') }}" rel="stylesheet">
{{--<link rel="stylesheet"--}}
      {{--href="{{ url('quickadmin/css') }}/select2.min.css"/>--}}
{{--<link href="{{ url('adminlte/css/AdminLTE.min.css') }}" rel="stylesheet">--}}
{{--<link href="{{ url('adminlte/css/custom.css') }}" rel="stylesheet">--}}
{{--<link href="{{ url('adminlte/css/skins/skin-blue.min.css') }}" rel="stylesheet">--}}



<!--- EOC ---->

<script>
    $(document).ajaxStart(function() { Pace.restart(); });
</script>

