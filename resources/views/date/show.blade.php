@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Date</h2>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date:</strong>
                    {{ $date->date }}
                </div>

                <div class="form-group">
                    <strong>Trip:</strong>
                    {{ $date->trip->name ?? '' }}
                </div>

                <div class="form-group">
                    <strong>Car:</strong>
                    {{ $date->car->name ?? '' }}
                </div>

                <div class="form-group">
                    <strong>Number:</strong>
                    {{ $date->number }}
                </div>

                <div class="form-group">
                    <strong>Car:</strong>
                    {{ number_format($date->price) }} UZS
                </div>

                <div class="form-group">
                    <strong>Status:</strong>
                    {{ $date->status }}
                </div>

            </div>
        </div>
    </div>
@endsection
