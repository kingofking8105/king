@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New Frequency</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('donationfrequencies.index') }}"> Back</a>
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
    @if(isset($donationfrequency))
    <form action="{{ route('donationfrequencies.update',$donationfrequency->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('donationfrequencies.store') }}" method="POST">
    @endif
        @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="">Frequency</label>
                    <input type="text" name="freq_name" value = "{{isset($donationfrequency->freq_name) ? $donationfrequency->freq_name : old('freq_name')}}" class="form-control" placeholder="Frequency Name">
                </div>
            </div>    
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div> 

@endsection