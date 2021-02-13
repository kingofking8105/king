@extends('layouts.app')


@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Show State</h1>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('districts.index') }}"> Back</a>
            </div>
        </div>
        <div class="box-body">
        <div class="form-group">
                <strong>State:</strong>
                {{ $district->state->state }}
            </div>
            <div class="form-group">
                <strong>District:</strong>
                {{ $district->district }}
            </div>
            <div class="form-group">
                <strong>District Code:</strong>
                {{ $district->dist_code }}
            </div>
        </div>
    </div>

@endsection