@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New State</h1>
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
    <!-- form start -->
    <form action="{{ route('states.store') }}" method="POST">
        @csrf
           
            <div class="box-body">
            <div class="form-group">
                  <label>Select Country</label>
                  <select name="country_id" class="form-control">
                      @php $countries=\App\Model\CountryState\Country::all(); @endphp
                      @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="">state Name</label>
                    <input type="text" name="state" class="form-control" placeholder="State">
                </div>
                <div class="form-group">
                    <label for="">Code</label>
                    <input type="text" class="form-control"  name="st_code" placeholder="Code">
                </div>
            </div>    
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div> 

@endsection