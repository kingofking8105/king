@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New PngoType</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('pngotypes.index') }}"> Back</a>
        </div>
    </div>
    <!-- /.box-header -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- form start -->
    @if(isset($pngotype))
    <form action="{{ route('pngotypes.update',$pngotype->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('pngotypes.store') }}" method="POST">
    @endif
        @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="">PngoTypes</label>
                    <input type="text" name="pngo_type" value = "{{isset($pngotype->pngo_type) ? $pngotype->pngo_type : old('pngo_type')}}" class="form-control" placeholder="PngoType">
                </div>
            </div>    
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div> 

@endsection