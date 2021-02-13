@extends('layouts.app')


@section('content')
  
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Edit District</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('districts.index') }}"> Back</a>
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


    <form action="{{ route('districts.update',$district->id) }}" method="POST">
    	@csrf
        @method('PUT')
         <div class="box-body">
                <div class="form-group">
                  <label>Select Country</label>
                  <select name="country_id" class="form-control" onChange="getState(this.value);" >
                  <option>Select Country</option>
                      @php $countries=\App\Model\CountryState\Country::all(); @endphp
                      @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Select State</label>
                  <select name="state_id" class="form-control" id="state_list">
                      @php $states=\App\Model\CountryState\State::all(); @endphp
                      @foreach($states as $state)
                    <option value="{{$state->id}}" @if($district->state_id==$state->id) selected='selected' @endif>{{$state->state}}</option>
                    @endforeach
                  </select>
                </div>
		        <div class="form-group">
		            <strong>District:</strong>
		            <input type="text" name="district" value="{{ $district->district }}" class="form-control" placeholder="Name">
		        </div>
		        <div class="form-group">
		            <strong>Code:</strong>
		            <input type="text" class="form-control"  name="dist_code" placeholder="Code" value="{{ $district->dist_code }}">
		        </div>
		   
		    <div class="box-footer">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>
</div>

@endsection