@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')




    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($order) > 0 ? 'datatable' : '' }} @can('order_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('order_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.users.fields.name')</th>
                        <th>Phone</th>
                        <th>Amt</th>
<th>Card No</th>
                          <th>Status</th>
                            <th>Ordered_at</th>
                                                <th>Action</th>

                    </tr>
                </thead>

                <tbody>
                    @if (count($order) > 0)
                        @foreach ($order as $orders)
                            <tr data-entry-id="{{ $orders->id }}">
                                @can('order_delete')
                                    <td></td>
                                @endcan

                                <td field-key='name'>{{ $orders->recipent_name }}</td>
                                <td field-key='email'>{{ $orders->recipent_phone }}</td>
                                <td field-key='role'>{{ $orders->amount }}</td>
                                  <td field-key='txnid'>{{ $orders->pin }}</td>
                                <td field-key='status'>{{ $orders->payment_status }}</td>
                                <td field-key='date'>{{ $orders->order_time }}</td>
                                                                <td>

                                  @can('order_view')
@if($orders->payment_status == 'Credit')
    <a  href="{{ route('admin.orders.assign',['post' => Crypt::encryptString($orders->card_id)]) }}" class="btn btn-xs btn-success">Assign Card</a>

@else
                                <a href="#" class="btn btn-xs btn-success" disabled>Assign Pin</a>
                      @endif
                      <a href="{{ route('Card.main', Crypt::encryptString($orders->card_id)) }}" class="btn btn-xs btn-primary">Modify Details</a>
                      @endcan


                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>


    </script>
@endsection
