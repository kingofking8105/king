@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New DonationType</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('donationtypes.index') }}"> Back</a>
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
    @if(isset($donationtype))
    <form action="{{ route('donationtypes.update',$donationtype->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('donationtypes.store') }}" method="POST">
    @endif
        @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="">DonationType</label>
                    <input type="text" name="donation_type_name" value = "{{isset($donationtype->donation_type_name) ? $donationtype->donation_type_name : old('donation_type_name')}}" class="form-control" placeholder="Donation Type ">
                </div>
            </div>    
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div> 

@endsection