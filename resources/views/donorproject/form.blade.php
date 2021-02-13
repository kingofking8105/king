@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New Donor Project</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('donors.index') }}"> Back</a>
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
    @if(isset($donorproject))
    <form action="{{ route('donorprojects.update',$donorproject->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('donorprojects.store') }}" method="POST">
    @endif
    @csrf
        <div class="box-body">
        <div class="form-group">
                <label>Select Donor</label>
                <select name="donor_id" class="form-control"  id="donor_id">
                <option value="">Select Donor</option>
                    @php $donors=\App\Model\Donor\Donor::all(); @endphp
                    @foreach($donors as $donor)
                <option value="{{$donor->id}}" @if(isset($donorproject->donor_id)) {{ $donorproject->donor_id == $donor->id ? ' selected="selected"' : '' }} @else {{ old('donor_id') == $donor->id ? ' selected="selected"' : '' }}@endif >{{$donor->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Country</label>
                <select name="country_id" class="form-control" onChange="getState(this.value);" id="country-list">
                    <option value="">Select Country</option>
                    @php $countries=\App\Model\CountryState\Country::all(); @endphp
                        @foreach($countries as $country)
                    <option value="{{$country->id}}" @if(isset($donorproject->country_id)) {{ $donorproject->country->id == $country->id ? ' selected="selected"' : '' }} @else {{ old('country_id') == $country->id ? ' selected="selected"' : '' }}@endif >{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select State</label>
                <select name="state_id" class="form-control" onChange="getCity(this.value);" id="state-list">
                    <option value="">Select State</option>
                    @php $states=\App\Model\CountryState\State::all(); @endphp
                    @foreach($states as $state)
                    <option value="{{$state->id}}" @if(isset($donorproject->state_id)) {{ $donorproject->state->id == $state->id ? ' selected="selected"' : '' }} @else {{ old('state_id') == $state->id ? ' selected="selected"' : '' }}@endif >{{$state->state}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select District</label>
                <select name="district_id" class="form-control" onChange="getBlock(this.value);"  id="city-list">
                    <option value="">Select District</option>
                    @php $districts=\App\Model\CountryState\District::all(); @endphp
                    @foreach($districts as $district)
                    <option value="{{$district->id}}" @if(isset($donorproject->district_id)) {{ $donorproject->district->id == $district->id ? ' selected="selected"' : '' }} @else {{ old('district_id') == $district->id ? ' selected="selected"' : '' }}@endif >{{$district->district}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Block</label>
                <select name="block_id" class="form-control"  id="block-list">
                    <option value="">Select Block</option>
                    @php $blocks=\App\Model\CountryState\Block::all(); @endphp
                    @foreach($blocks as $block)
                    <option value="{{$block->id}}" @if(isset($donorproject->block_id)) {{ $donorproject->block->id == $block->id ? ' selected="selected"' : '' }} @else {{ old('block_id') == $block->id ? ' selected="selected"' : '' }}@endif >{{$block->block}}</option>
                    @endforeach
                </select>
            </div>
          
           
            <!-- checkbox -->
            <span id="errorCheck" style="display:none;">Please Check on Status</span>
            <div class="form-group">
                <label>Status
                    <input type="checkbox" class="flat-red" name="status" @if(isset($donorproject->status)) {{ $donorproject->status == '1' ? ' checked="checked"' : '' }} @else {{ old('status') == '1' ? ' checked="checked"' : '' }}@endif>
                </label>
            </div>
            </div>    
            <div class="box-footer">
                <button type="submit" id="but_submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
</div> 

@endsection
@section('custom-js')
<script>
$( "#but_submit" ).click(function() {
        if ($("input[type=checkbox]").prop("checked")) {
            return true; 
        } else { 
            $('#errorCheck').attr('style','display:block;color:red;')
            return false;
        } 
    });
</script>
@endsection