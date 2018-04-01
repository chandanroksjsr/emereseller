@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')




    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">

<table id="users-table" class="display" cellspacing="0" width="100%">
</table>



        </div>
    </div>
@stop

@section('javascript')
<script>

var oTable = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{route('admin.scanlogs.getAdvanceFilterData')}}',
            data: function (d) {
                d.name = $('input[name=name]').val();
                d.operator = $('select[name=operator]').val();
                d.post = $('input[name=post]').val();
            }
        },
        columns: [
            {data: 'id', name: 'users.card_id'},
            {data: 'name', name: 'users.scan_user_location'},
            {data: 'email', name: 'users.scan_user_name'},
            {data: 'count', name: 'count', searchable: false},
            {data: 'created_at', name: 'users.scan_user_phone'},
            {data: 'updated_at', name: 'users.scan_time'}
        ]
    });

    $('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });

</script>







    <script>
        @can('order_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
        @endcan

    </script>
@endsection
