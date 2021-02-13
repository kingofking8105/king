@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New LeaveReason</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('leavereasons.index') }}"> Back</a>
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
    @if(isset($leavereason))
    <form action="{{ route('leavereasons.update',$leavereason->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('leavereasons.store') }}" method="POST">
    @endif
        @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="">LeaveReason</label>
                    <input type="text" name="reason" value = "{{isset($leavereason->reason) ? $leavereason->reason : old('reason')}}" class="form-control" placeholder="DonorType">
                </div>
            </div>    
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div> 

@endsection