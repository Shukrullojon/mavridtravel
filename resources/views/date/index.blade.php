@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="d-flex justify-content-between margin-tb">
                <h2>Date Management</h2>
                <a class="btn btn-success" href="{{ route('date.create') }}">Create</a>
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
                <th>Date</th>
                <th>Trip</th>
                <th>Car</th>
                <th>Number</th>
                <th>Price</th>
                <th>Status</th>
                <th></th>
            </tr>
            @foreach ($dates as $key => $date)
                <tr>
                    <td>{{ $date->date }}</td>
                    <td>{{ $date->trip->name ?? '' }}</td>
                    <td>{{ $date->car->name ?? '' }}</td>
                    <td>{{ $date->number }}</td>
                    <td>{{ number_format($date->price) }} UZS</td>
                    <td>{{ $date->status }}</td>

                    <td>
                        <div class="btn-group">
                            <a class="" style="margin-right: 10px" href="{{ route('date.show',$date->id) }}">
                                <span class="fa fa-eye"></span>
                            </a>
                            <a class="" style="margin-right: 2px" href="{{ route('date.edit',$date->id) }}">
                                <span class="fa fa-edit" style="color: #562bb0"></span>
                            </a>

                            <form action="{{ route("date.destroy", $date->id) }}" method="POST">
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
                    {{ $dates->links() }}
                </td>
            </tr>
        </tfooter>
    </div>

@endsection
