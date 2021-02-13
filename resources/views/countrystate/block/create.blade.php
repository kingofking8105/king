@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New Block</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('blocks.index') }}"> Back</a>
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
    <form action="{{ route('blocks.store') }}" method="POST">
        @csrf
            
            <div class="box-body">
                <div class="form-group">
                  <label>Select State</label>
                  <select name="state_id" class="form-control" onChange="getCity(this.value);" id="state_list">
                      <option value="">Select State</option>
                  @php $states=\App\Model\CountryState\State::all(); @endphp
                      @foreach($states as $state)
                    <option value="{{$state->id}}">{{$state->state}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Select District</label>
                  <select name="district_id" class="form-control" id="city-list">
                      @php $districts=\App\Model\CountryState\District::all(); @endphp
                      @foreach($districts as $district)
                    <option value="{{$district->id}}">{{$district->district}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="">Block Name</label>
                    <input type="text" name="block" class="form-control" placeholder="Block">
                </div>
                <div class="form-group">
                    <label for="">Code</label>
                    <input type="text" class="form-control"  name="block_code" placeholder="Code">
                </div>
            </div>    
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div> 

@endsection