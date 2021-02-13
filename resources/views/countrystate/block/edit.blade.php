@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Edit Block</h1>
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


    <form action="{{ route('blocks.update',$block->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="box-body">
                <div class="form-group">
                  <label>Select State</label>
                  <select name="state_id" class="form-control" onChange="getCity(this.value);" id="state_list">
                      <option value="">Select State</option>
                  @php $states=\App\Model\CountryState\State::all(); @endphp
                      @foreach($states as $state)
                    <option value="{{$state->id}}"@if($block->state->id==$state->id) selected='selected' @endif >{{$state->state}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Select District</label>
                  <select name="district_id" class="form-control" id="city-list">
                      @php $districts=\App\Model\CountryState\District::all(); @endphp
                      @foreach($districts as $district)
                    <option value="{{$district->id}}" @if($block->state->id==$district->id) selected='selected' @endif>{{$district->district}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="">Block Name</label>
                    <input type="text" name="block" value="{{ $block->block }}" class="form-control" placeholder="Block">
                </div>
                <div class="form-group">
                    <label for="">Code</label>
                    <input type="text" class="form-control"  value="{{ $block->block_code }}" name="block_code" placeholder="Code">
                </div>
		    <div class="box-footer">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>
</div>

@endsection