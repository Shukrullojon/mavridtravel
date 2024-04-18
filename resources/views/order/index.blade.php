@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="d-flex justify-content-between margin-tb">
                <h2>Order Management</h2>
                <a class="btn btn-success" href="{{ route('order.create') }}">Create</a>
            </div>
        </div>
    </div>

    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
            <tr>
                <th>User</th>
                <th>Date</th>
                <th>Number</th>
                <th>Price</th>
                <th>Status</th>
                <th></th>
            </tr>
            @foreach ($orders as $key => $order)
                <tr>
                    <td>{{ $order->user->first_name ?? '' }} {{ $order->user->last_name }} {{ $order->user->phone }}</td>
                    <td>{{ $order->date->date ?? '' }} - {{ $order->date->trip->name ?? '' }} {{ $order->date->car->name ?? '' }}</td>
                    <td>{{ $order->number ?? '' }}</td>
                    <td>{{ number_format($order->price) }} UZS</td>
                    <td>{{ $order->status }}</td>

                    <td>
                        <div class="btn-group">
                            <a class="" style="margin-right: 10px" href="{{ route('order.show',$order->id) }}">
                                <span class="fa fa-eye"></span>
                            </a>
                            <a class="" style="margin-right: 2px" href="{{ route('order.edit',$order->id) }}">
                                <span class="fa fa-edit" style="color: #562bb0"></span>
                            </a>

                            <form action="{{ route("order.destroy", $order->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" style='display:inline; border:none; background: none' onclick="if (confirm('Вы уверены?')) { this.form.submit() } "><span class="fa fa-trash"></span></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        <tfooter>
            <tr>
                <td colspan="9">
                    {{ $orders->links() }}
                </td>
            </tr>
        </tfooter>
    </div>

@endsection
