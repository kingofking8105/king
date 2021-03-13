@extends('layouts.app')


@section('content')

 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Edit State</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.results.index') }}"> Back</a>
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


    <form action="{{ route('admin.results.update',$result->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="box-body">
		        <div class="form-group">
		            <strong>Date:</strong>
		            <input type="date" name="date" value="{{ $result->date }}" class="form-control" placeholder="Date">
		        </div>
		        <div class="form-group">
		            <strong>Dishawar:</strong>
		            <input type="text" class="form-control"  name="dishawar" placeholder="Dishawar" value="{{ $result->dishawar }}">
		        </div>
                 <div class="form-group">
                     <label for="">Faridabad</label>
                     <input type="text" class="form-control"  name="faridabad" placeholder="Faridabad" value="{{ $result->faridabad }}">
                 </div>
                 <div class="form-group">
                     <label for="">Gaziyabad</label>
                     <input type="text" class="form-control"  name="gaziyabad" placeholder="Gaziyabad" value="{{ $result->gaziyabad }}">
                 </div>
                 <div class="form-group">
                     <label for="">Gali</label>
                     <input type="text" class="form-control"  name="gali" placeholder="Gali" value="{{ $result->gali }}">
                 </div>
                 <div class="form-group">
                     <label for="">Dishawar OLD</label>
                     <input type="text" class="form-control"  name="my_dishawar" placeholder="Dishawar OLD" value="{{ $result->my_dishawar }}">
                 </div>
		    <div class="box-footer">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>
</div>

@endsection
