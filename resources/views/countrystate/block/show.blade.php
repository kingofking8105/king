@extends('layouts.app')


@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Show Block</h1>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('blocks.index') }}"> Back</a>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <strong>State:</strong>
                {{ $block->state->state }}
            </div>
            <div class="form-group">
                <strong>District:</strong>
                {{ $block->district->district }}
            </div>
            <div class="form-group">
                <strong>block:</strong>
                {{ $block->block }}
            </div>
            <div class="form-group">
                <strong>Block Code:</strong>
                {{ $block->block_code }}
            </div>
        </div>
    </div>

@endsection