@extends('layouts.app')


@section('content')

 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Edit State</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('states.index') }}"> Back</a>
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


    <form action="{{ route('states.update',$state->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="box-body">
                <div class="form-group">
                  <label>Select Country</label>
                  <select name="country_id" class="form-control">
                      @php $countries=\App\Model\CountryState\Country::all(); @endphp
                      @foreach($countries as $country)
                    <option value="{{$country->id}}" @if($state->country->id==$country->id) selected='selected' @endif>{{$country->name}}</option>
                    @endforeach
                  </select>
                </div>
		        <div class="form-group">
		            <strong>State:</strong>
		            <input type="text" name="state" value="{{ $state->state }}" class="form-control" placeholder="Name">
		        </div>
		  
		   
		        <div class="form-group">
		            <strong>Code:</strong>
		            <input type="text" class="form-control"  name="st_code" placeholder="Code" value="{{ $state->st_code }}">
		        </div>
		   
		    <div class="box-footer">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>
</div>

@endsection