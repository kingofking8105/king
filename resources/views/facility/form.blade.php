@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New Facility</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('facilities.index') }}"> Back</a>
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
    @if(isset($facility))
    <form action="{{ route('facilities.update',$facility->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('facilities.store') }}" method="POST">
    @endif
        @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="">Facility</label>
                    <input type="text" name="facility_name" value = "{{isset($facility->facility_name) ? $facility->facility_name : old('facility_name')}}" class="form-control" placeholder="Facility">
                </div>
            </div>    
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div> 

@endsection