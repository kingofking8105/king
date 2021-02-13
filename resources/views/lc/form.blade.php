@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Manage Learning Center</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('lcs.index') }}"> Back</a>
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
    @if(isset($lc))
    <form action="{{ route('lcs.update',$lc->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('lcs.store') }}" method="POST">
    @endif
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="lc_name" value = "{{isset($lc->lc_name) ? $lc->lc_name : old('lc_name')}}" class="form-control" placeholder="Center Name ">
            </div>
            <div class="form-group">
                <label>Select Country</label>
                <select name="country_id" class="form-control" onChange="getState(this.value);" id="country-list">
                    <option value="">Select Country</option>
                    @php $countries=\App\Model\CountryState\Country::all(); @endphp
                        @foreach($countries as $country)
                    <option value="{{$country->id}}" @if(isset($lc->country_id)) {{ $lc->country->id == $country->id ? ' selected="selected"' : '' }} @else {{ old('country_id') == $country->id ? ' selected="selected"' : '' }}@endif >{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select State</label>
                <select name="state_id" class="form-control" onChange="getCity(this.value);" id="state-list">
                    <option value="">Select State</option>
                    @php $states=\App\Model\CountryState\State::all(); @endphp
                    @foreach($states as $state)
                    <option value="{{$state->id}}" @if(isset($lc->state_id)) {{ $lc->state->id == $state->id ? ' selected="selected"' : '' }} @else {{ old('state_id') == $state->id ? ' selected="selected"' : '' }}@endif >{{$state->state}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                  <label>Select District</label>
                  <select name="district_id" class="form-control" onChange="getBlock(this.value);" id="city-list" >
                      @php $districts=\App\Model\CountryState\District::all(); @endphp
                      @foreach($districts as $district)
                    <option value="{{$district->id}}"  @if(isset($lc->block_id)) {{ $lc->district->id == $district->id ? ' selected="selected"' : '' }} @else {{ old('district_id') == $district->id ? ' selected="selected"' : '' }}@endif >{{$district->district}}</option>
                    @endforeach
                  </select>
                </div>
            <div class="form-group">
                  <label>Select Block</label>
                  <select name="block_id" class="form-control" id="block-list" >
                      @php $blocks=\App\Model\CountryState\Block::all(); @endphp
                      @foreach($blocks as $block)
                    <option value="{{$block->id}}"  @if(isset($lc->block_id)) {{ $lc->block->id == $block->id ? ' selected="selected"' : '' }} @else {{ old('district_id') == $block->id ? ' selected="selected"' : '' }}@endif >{{$block->block}}</option>
                    @endforeach
                  </select>
                </div>
            <div class="form-group">
                <label>Select Donor</label>
                <select name="donor_id" class="form-control" onChange="getDonorProject(this.value);" id="donor_id">
                <option value="">Select Donor</option>
                    @php $donors=\App\Model\Donor\Donor::all(); @endphp
                    @foreach($donors as $donor)
                <option value="{{$donor->id}}" @if(isset($lc->donor_id)) {{ $lc->donor_id == $donor->id ? ' selected="selected"' : '' }} @else {{ old('donor_id') == $donor->id ? ' selected="selected"' : '' }}@endif >{{$donor->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Donor Project</label>
                <select name="donor_project_id" class="form-control" id="donor-project" >
                    <option value="">Select Donor Project</option>
                    @php $donorprojects=\App\Model\DonorProject\DonorProject::all(); @endphp
                    @foreach($donorprojects as $donorproject)
                    <option value="{{$donorproject->id}}" @if(isset($lc->donor_project_id)) {{ $lc->donor_project_id == $donorproject->id ? ' selected="selected"' : '' }} @else {{ old('donor_project_id') == $donorproject->id ? ' selected="selected"' : '' }}@endif >{{$donorproject->id}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Pngo</label>
                <select name="pngo_id" class="form-control"  onChange="getPngoProject(this.value);" id="pngo_id">
                <option value="">Select Pngo</option>
                    @php $pngos=\App\Model\Pngo\Pngo::all(); @endphp
                    @foreach($pngos as $pngo)
                <option value="{{$pngo->id}}" @if(isset($lc->pngo_id)) {{ $lc->pngo_id == $pngo->id ? ' selected="selected"' : '' }} @else {{ old('pngo_id') == $pngo->id ? ' selected="selected"' : '' }}@endif >{{$pngo->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Pngo Project</label>
                <select name="pngo_project_id" class="form-control" id="pngo-project" >
                    <option value="">Select Pngo Project</option>
                    @php $pngoprojects=\App\Model\PngoProject\PngoProject::all(); @endphp
                    @foreach($pngoprojects as $pngoproject)
                    <option value="{{$pngoproject->id}}" @if(isset($lc->pngo_project_id)) {{ $lc->pngo_project_id == $pngoproject->id ? ' selected="selected"' : '' }} @else {{ old('pngo_project_id') == $pngoproject->id ? ' selected="selected"' : '' }}@endif >{{$pngoproject->id}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Territory Officer</label>
                <select name="territory_officer_id" class="form-control"  >
                    <option value="">Select Territory Officer </option>
                    @php $territoryofficers=\App\Model\TerritoryOfficer\TerritoryOfficer::all(); @endphp
                    @foreach($territoryofficers as $territoryofficer)
                    <option value="{{$territoryofficer->id}}" @if(isset($lc->territory_officer_id)) {{ $lc->territory_officer_id == $territoryofficer->id ? ' selected="selected"' : '' }} @else {{ old('territory_officer_id') == $territoryofficer->id ? ' selected="selected"' : '' }}@endif >{{$territoryofficer->user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Project Officer</label>
                <select name="project_officer_id" class="form-control"  >
                    <option value="">Select Project Officer </option>
                    @php $projectofficers=\App\Model\ProjectOfficer\ProjectOfficer::all(); @endphp
                    @foreach($projectofficers as $projectofficer)
                    <option value="{{$projectofficer->id}}" @if(isset($lc->project_officer_id)) {{ $lc->project_officer_id == $projectofficer->id ? ' selected="selected"' : '' }} @else {{ old('project_officer_id') == $projectofficer->id ? ' selected="selected"' : '' }}@endif >{{$projectofficer->user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Academic Year</label>
                <select name="academic_year_id" class="form-control"  id="state-list">
                    <option value="">Select Academic Year </option>
                    @php $academicyears=\App\Model\AcademicYear\AcademicYear::all(); @endphp
                    @foreach($academicyears as $academicyear)
                    <option value="{{$academicyear->id}}" @if(isset($lc->academic_year_id)) {{ $lc->academic_year_id == $academicyear->id ? ' selected="selected"' : '' }} @else {{ old('academic_year_id') == $academicyear->id ? ' selected="selected"' : '' }}@endif >{{$academicyear->year}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea required class="form-control" name="lc_address" rows="3" placeholder="Enter Address..." value ="">{{isset($lc->lc_address) ? htmlspecialchars($lc->lc_address) : old('lc_address')}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Pincode</label>
                <input type="text" name="lc_pincode" value = "{{isset($lc->lc_pincode) ? $lc->lc_pincode : old('lc_pincode')}}" class="form-control" placeholder="Pincode">
            </div>
            <!-- Date -->
            <div class="form-group">
                <label>Start Date:</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="lc_start_date" value="{{isset($lc->lc_start_date) ? $lc->lc_start_date : old('lc_start_date')}}" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
            </div>
            <!-- /.form group -->
            <!-- Date -->
            <div class="form-group">
                <label>close Date:</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="lc_end_date" value="{{isset($lc->lc_end_date) ? $lc->lc_end_date : old('lc_end_date')}}" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
            </div>
            <!-- /.form group -->
            <div class="form-group">
                <label for="">Latitude</label>
                <input type="text" name="lat" value = "{{isset($lc->lat) ? $lc->lat : old('lat')}}" class="form-control" placeholder="Center Latitude ">
            </div>
            <div class="form-group">
                <label for="">Longitude</label>
                <input type="text" name="lng" value = "{{isset($lc->lng) ? $lc->lng : old('lng')}}" class="form-control" placeholder="Center Longitude ">
            </div>
            
            <!-- checkbox -->
            <span id="errorCheck" style="display:none;">Please Check on Status</span>
            <div class="form-group">
                <label>Status
                    <input type="checkbox" class="flat-red" name="status" @if(isset($lc->status)) {{ $lc->status == '1' ? ' checked="checked"' : '' }} @else {{ old('status') == '1' ? ' checked="checked"' : '' }}@endif>
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

    function getPngoProject(val) {
	$.ajax({
		type: "GET",
		url: "/getPngoProject/"+val,
		//data:'country_id='+val,
		beforeSend: function() {
			$("#pngo-project").addClass("loader");
		},
		success: function(data){
            var data =JSON.parse(data);
            var select = $('#pngo-project');
            select.empty();
            select.append("<option value=''>Select Pngo Project</option>");
            for(i in data){
                    select.append(
                            $('<option></option>').val(data[i].id).html(data[i].id));
                }
                $("#pngo-project").removeClass("loader");
        },
        error: function() {
            alert('Error occured');
        }
	});
}

function getDonorProject(val) {
	$.ajax({
		type: "GET",
		url: "/getDonarProject/"+val,
		//data:'country_id='+val,
		beforeSend: function() {
			$("#donor-project").addClass("loader");
		},
		success: function(data){
            var data =JSON.parse(data);
            var select = $('#donor-project');
            select.empty();
            select.append("<option value=''>Select Donor Project</option>");
            for(i in data){
                    select.append(
                            $('<option></option>').val(data[i].id).html(data[i].id));
                }
                $("#donor-project").removeClass("loader");
        },
        error: function() {
            alert('Error occured');
        }
	});
}

</script>
@endsection