@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Trip</h2>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $trip->name }}
                </div>

                <div class="form-group">
                    <strong>Info:</strong>
                    {{ $trip->info }}
                </div>

                <div class="form-group">
                    <strong>Image:</strong>
                    <img src="{{ asset('public/images/'.$trip->image) }}" height="100px">
                </div>

                <div class="form-group">
                    <strong>Status:</strong>
                    {{ $trip->status }}
                </div>

            </div>
        </div>
    </div>
@endsection
