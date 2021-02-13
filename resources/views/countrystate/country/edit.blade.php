@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Edit Country</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('countries.index') }}"> Back</a>
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


    <form action="{{ route('countries.update',$country->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="box-body">
		   
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" value="{{ $country->name }}" class="form-control" placeholder="Name">
		        </div>
		  
		   
		        <div class="form-group">
		            <strong>Code:</strong>
		            <input type="text" class="form-control"  name="code" placeholder="Code" value="{{ $country->code }}">
		        </div>
		   
		    <div class="box-footer">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>
</div>

@endsection