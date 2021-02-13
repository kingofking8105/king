@extends('layouts.app')


@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Show Country</h1>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('countries.index') }}"> Back</a>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $country->name }}
            </div>
            <div class="form-group">
                <strong>Code:</strong>
                {{ $country->code }}
            </div>
        </div>
    </div>

@endsection