@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New TicketCategory</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('lcticketcategories.index') }}"> Back</a>
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
    @if(isset($lcticketcategory))
    <form action="{{ route('lcticketcategories.update',$lcticketcategory->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('lcticketcategories.store') }}" method="POST">
    @endif
        @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="">lcticketcategory</label>
                    <input type="text" name="cat_name" value = "{{isset($lcticketcategory->cat_name) ? $lcticketcategory->cat_name : old('cat_name')}}" class="form-control" placeholder="LcTicket Category ">
                </div>
            </div>    
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div> 

@endsection