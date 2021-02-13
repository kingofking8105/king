@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New  Academic Year</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('academicyears.index') }}"> Back</a>
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
    @if(isset($academicyear))
    <form action="{{ route('academicyears.update',$academicyear->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('academicyears.store') }}" method="POST">
    @endif
        @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="">Academic Year</label>
                    <input type="text" name="year" value = "{{isset($academicyear->year) ? $academicyear->year : old('year')}}" class="form-control" placeholder="Academic Year">
                </div>
            </div>    
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div> 

@endsection