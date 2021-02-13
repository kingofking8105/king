@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New Duration</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('donationdurations.index') }}"> Back</a>
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
    @if(isset($donationduration))
    <form action="{{ route('donationdurations.update',$donationduration->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('donationdurations.store') }}" method="POST">
    @endif
        @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="">Duration</label>
                    <input type="text" name="duration_name" value = "{{isset($donationduration->duration_name) ? $donationduration->duration_name : old('duration_name')}}" class="form-control" placeholder="Duration">
                </div>
            </div>    
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div> 

@endsection