@extends('layouts.app')


@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Show Result</h1>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.results.index') }}"> Back</a>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <strong>Date:</strong>
                {{ $result->date }}
            </div>
            <div class="form-group">
                <strong>Dishawar:</strong>
                {{ $result->dishawar }}
            </div>
            <div class="form-group">
                <strong>Faridabad:</strong>
                {{ $result->faridabad }}
            </div>
            <div class="form-group">
                <strong>Gaziyabad:</strong>
                {{ $result->gaziyabad }}
            </div>
            <div class="form-group">
                <strong>Gali:</strong>
                {{ $result->gali }}
            </div>
            <div class="form-group">
                <strong>Dishawar Old:</strong>
                {{ $result->my_dishawar }}
            </div>
        </div>
    </div>

@endsection
