@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New Pngo Project</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('pngos.index') }}"> Back</a>
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
    @if(isset($pngoproject))
    <form action="{{ route('pngoprojects.update',$pngoproject->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('pngoprojects.store') }}" method="POST">
    @endif
    @csrf
        <div class="box-body">
        <div class="form-group">
                <label>Select Pngo</label>
                <select name="pngo_id" class="form-control"  id="pngo_id">
                <option value="">Select Pngo</option>
                    @php $pngos=\App\Model\Pngo\Pngo::all(); @endphp
                    @foreach($pngos as $pngo)
                <option value="{{$pngo->id}}" @if(isset($pngoproject->pngo_id)) {{ $pngoproject->pngo_id == $pngo->id ? ' selected="selected"' : '' }} @else {{ old('pngo_id') == $pngo->id ? ' selected="selected"' : '' }}@endif >{{$pngo->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Project Officer</label>
                <select name="project_officer_id" class="form-control">
                    <option value="">Select Project Officer</option>
                    @php $projectofficers=\App\Model\ProjectOfficer\ProjectOfficer::all(); @endphp

                        @foreach($projectofficers as $projectofficer)
                        
                        <option value="{{$projectofficer->id}}" @if(isset($pngoproject->project_officer_id)) {{ $pngoproject->project_officer_id == $projectofficer->id ? ' selected="selected"' : '' }} @else {{ old('project_officer_id') == $projectofficer->id ? ' selected="selected"' : '' }}@endif >{{$projectofficer->user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Project Manager</label>
                <select name="project_manager_id" class="form-control">
                    <option value="">Select Project Manager</option>
                    @php $projectmanagers=\App\Model\ProjectManager\ProjectManager::all(); @endphp

                        @foreach($projectmanagers as $projectmanager)
                        
                        <option value="{{$projectmanager->id}}" @if(isset($pngoproject->project_manager_id)) {{ $pngoproject->project_manager_id == $projectmanager->id ? ' selected="selected"' : '' }} @else {{ old('project_manager_id') == $projectmanager->id ? ' selected="selected"' : '' }}@endif >{{$projectmanager->user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Country</label>
                <select name="country_id" class="form-control" onChange="getState(this.value);" id="country-list">
                    <option value="">Select Country</option>
                    @php $countries=\App\Model\CountryState\Country::all(); @endphp
                        @foreach($countries as $country)
                    <option value="{{$country->id}}" @if(isset($pngoproject->country_id)) {{ $pngoproject->country->id == $country->id ? ' selected="selected"' : '' }} @else {{ old('country_id') == $country->id ? ' selected="selected"' : '' }}@endif >{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select State</label>
                <select name="state_id" class="form-control" onChange="getCity(this.value);" id="state-list">
                    <option value="">Select State</option>
                    @php $states=\App\Model\CountryState\State::all(); @endphp
                    @foreach($states as $state)
                    <option value="{{$state->id}}" @if(isset($pngoproject->state_id)) {{ $pngoproject->state->id == $state->id ? ' selected="selected"' : '' }} @else {{ old('state_id') == $state->id ? ' selected="selected"' : '' }}@endif >{{$state->state}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select District</label>
                <select name="district_id" class="form-control" onChange="getBlock(this.value);"  id="city-list">
                    <option value="">Select District</option>
                    @php $districts=\App\Model\CountryState\District::all(); @endphp
                    @foreach($districts as $district)
                    <option value="{{$district->id}}" @if(isset($pngoproject->district_id)) {{ $pngoproject->district->id == $district->id ? ' selected="selected"' : '' }} @else {{ old('district_id') == $district->id ? ' selected="selected"' : '' }}@endif >{{$district->district}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Block</label>
                <select name="block_id" class="form-control"  id="block-list">
                    <option value="">Select Block</option>
                    @php $blocks=\App\Model\CountryState\Block::all(); @endphp
                    @foreach($blocks as $block)
                    <option value="{{$block->id}}" @if(isset($pngoproject->block_id)) {{ $pngoproject->block->id == $block->id ? ' selected="selected"' : '' }} @else {{ old('block_id') == $block->id ? ' selected="selected"' : '' }}@endif >{{$block->block}}</option>
                    @endforeach
                </select>
            </div>
          
           
            <!-- checkbox -->
            <span id="errorCheck" style="display:none;">Please Check on Status</span>
            <div class="form-group">
                <label>Status
                    <input type="checkbox" class="flat-red" name="status" @if(isset($pngoproject->status)) {{ $pngoproject->status == '1' ? ' checked="checked"' : '' }} @else {{ old('status') == '1' ? ' checked="checked"' : '' }}@endif>
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