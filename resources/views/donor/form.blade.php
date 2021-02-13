@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Donor Management</h1>
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
    @if(isset($donor))
    <form action="{{ route('donors.update',$donor->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('donors.store') }}" method="POST">
    @endif
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value = "{{isset($donor->name) ? $donor->name : old('name')}}" class="form-control" placeholder="Donor Name ">
            </div>
            <div class="form-group">
                <label>Select Country</label>
                <select name="country_id" class="form-control" onChange="getState(this.value);" id="country-list">
                    <option value="">Select Country</option>
                    @php $countries=\App\Model\CountryState\Country::all(); @endphp
                        @foreach($countries as $country)
                    <option value="{{$country->id}}" @if(isset($donor->country_id)) {{ $donor->country->id == $country->id ? ' selected="selected"' : '' }} @else {{ old('country_id') == $country->id ? ' selected="selected"' : '' }}@endif >{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select State</label>
                <select name="state_id" class="form-control"  id="state-list">
                    <option value="">Select State</option>
                    @php $states=\App\Model\CountryState\State::all(); @endphp
                    @foreach($states as $state)
                    <option value="{{$state->id}}" @if(isset($donor->state_id)) {{ $donor->state->id == $state->id ? ' selected="selected"' : '' }} @else {{ old('state_id') == $state->id ? ' selected="selected"' : '' }}@endif >{{$state->state}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Donor Type</label>
                <select name="donor_type_id" class="form-control"  id="donor_type_id">
                <option value="">Select Donor Type</option>
                    @php $donortypes=\App\Model\DonorType\DonorType::all(); @endphp
                    @foreach($donortypes as $donortype)
                <option value="{{$donortype->id}}" @if(isset($donor->donor_type_id)) {{ $donor->donor_type_id == $donortype->id ? ' selected="selected"' : '' }} @else {{ old('donor_type_id') == $donortype->id ? ' selected="selected"' : '' }}@endif >{{$donortype->type_name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Donation Duration</label>
                <select name="donation_duration_id" class="form-control"  id="state-list">
                    <option value="">Select Donation Duration</option>
                    @php $donationdurations=\App\Model\DonationDuration\DonationDuration::all(); @endphp
                    @foreach($donationdurations as $donationduration)
                    <option value="{{$donationduration->id}}" @if(isset($donor->donation_duration_id)) {{ $donor->donation_duration_id == $donationduration->id ? ' selected="selected"' : '' }} @else {{ old('donation_duration_id') == $donationduration->id ? ' selected="selected"' : '' }}@endif >{{$donationduration->duration_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Donation Frequency</label>
                <select name="donation_frequency_id" class="form-control"  id="state-list">
                    <option value="">Select Donation Frequency </option>
                    @php $donationfrequencies=\App\Model\DonationFrequency\DonationFrequency::all(); @endphp
                    @foreach($donationfrequencies as $donationfrequency)
                    <option value="{{$donationfrequency->id}}" @if(isset($donor->donation_frequency_id)) {{ $donor->donation_frequency_id == $donationfrequency->id ? ' selected="selected"' : '' }} @else {{ old('donation_frequency_id') == $donationfrequency->id ? ' selected="selected"' : '' }}@endif >{{$donationfrequency->freq_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea required class="form-control" name="address" rows="3" placeholder="Enter Address..." value ="">{{isset($donor->address) ? htmlspecialchars($donor->address) : old('address')}}</textarea>
            </div>
            <!-- Date -->
            <div class="form-group">
                <label>Association Date:</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="association_date" value="{{isset($donor->association_date) ? $donor->association_date : old('association_date')}}" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
            </div>
            <!-- /.form group -->
            <!-- Date -->
            <div class="form-group">
                <label>Exit Date:</label>

                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="date_of_exit" value="{{isset($donor->date_of_exit) ? $donor->date_of_exit : old('date_of_exit')}}" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
            </div>
            <!-- /.form group -->
            <div class="form-group">
                    <label for="">INR Bank Name</label>
                    <input type="text" name="inr_bank_name" value = "{{isset($donor->inr_bank_name) ? $donor->inr_bank_name : old('inr_bank_name')}}" class="form-control" placeholder="INR Bank Name ">
            </div>
            <div class="form-group">
                    <label for="">INR Account Number</label>
                    <input type="text" name="inr_account_no" value = "{{isset($donor->inr_account_no) ? $donor->inr_account_no : old('inr_account_no')}}" class="form-control" placeholder="INR Account Number ">
            </div>
            <div class="form-group">
                    <label for="">INR Ifsc Code</label>
                    <input type="text" name="inr_ifsc" value = "{{isset($donor->inr_ifsc) ? $donor->inr_ifsc : old('inr_ifsc')}}" class="form-control" placeholder="INR Ifsc Code">
            </div>
            <div class="form-group">
                    <label for="">INR Pan Number</label>
                    <input type="text" name="inr_pan" value = "{{isset($donor->inr_pan) ? $donor->inr_pan : old('inr_pan')}}" class="form-control" placeholder="INR Pan Number ">
            </div>
            <div class="form-group">
                    <label for="">FCRA Bank Name</label>
                    <input type="text" name="fcra_bank_name" value = "{{isset($donor->fcra_bank_name) ? $donor->fcra_bank_name : old('fcra_bank_name')}}" class="form-control" placeholder="FCRA Bank Name ">
            </div>
            <div class="form-group">
                    <label for="">FCRA Account Number</label>
                    <input type="text" name="fcra_account_no" value = "{{isset($donor->fcra_account_no) ? $donor->fcra_account_no : old('fcra_account_no')}}" class="form-control" placeholder="FCRA Account Number ">
            </div>
            <div class="form-group">
                    <label for="">FCRA Ifsc Code</label>
                    <input type="text" name="fcra_ifsc" value = "{{isset($donor->fcra_ifsc) ? $donor->fcra_ifsc : old('fcra_ifsc')}}" class="form-control" placeholder="FCRA Ifsc Code">
            </div>
            <div class="form-group">
                    <label for="">FCRA Pan Number</label>
                    <input type="text" name="fcra_pan" value = "{{isset($donor->fcra_pan) ? $donor->fcra_pan : old('fcra_pan')}}" class="form-control" placeholder="FCRA Pan Number ">
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="poc_name" value = "{{isset($poc->poc_name) ? $poc->poc_name : old('poc_name')}}" class="form-control" placeholder="Poc Name ">
            </div>
            <div class="form-group">
                <label for="">Mobile Number</label>
                <input type="text" name="poc_mobile" value = "{{isset($poc->poc_mobile) ? $poc->poc_mobile : old('poc_mobile')}}" class="form-control" placeholder="Mobile Number">
            </div>
            
            <div class="form-group">
                    <label for="">Landline</label>
                    <input type="text" name="poc_landline" value = "{{isset($poc->poc_landline) ? $poc->poc_landline : old('poc_landline')}}" class="form-control" placeholder="Landline ">
            </div>
            <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="poc_email" value = "{{isset($poc->poc_email) ? $poc->poc_email : old('poc_email')}}" class="form-control" placeholder="Email ">
            </div>
            <div class="form-group">
                    <label for="">Designation</label>
                    <input type="text" name="poc_designation" value = "{{isset($poc->poc_designation) ? $poc->poc_designation : old('poc_designation')}}" class="form-control" placeholder="Designation">
            </div>
            <!-- checkbox -->
            <span id="pocErrorCheck" style="display:none;">Please Check on Status</span>
            <div class="form-group">
                <label>Status
                    <input type="checkbox" class="flat-red" name="poc_status" @if(isset($poc->poc_status)) {{ $poc->poc_status == '1' ? ' checked="checked"' : '' }} @else {{ old('poc_status') == '1' ? ' checked="checked"' : '' }}@endif>
                </label>
            </div>
            <!-- checkbox -->
            <span id="errorCheck" style="display:none;">Please Check on Status</span>
            <div class="form-group">
                <label>Status
                    <input type="checkbox" class="flat-red" name="status" @if(isset($donor->status)) {{ $donor->status == '1' ? ' checked="checked"' : '' }} @else {{ old('status') == '1' ? ' checked="checked"' : '' }}@endif>
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
$( "#but_submit").click(function() {
        if ($("input[type=checkbox]").prop("checked")) {
            return true; 
        } else { 
            $('#errorCheck').attr('style','display:block;color:red;')
            $('#pocErrorCheck').attr('style','display:block;color:red;')
            return false;
        } 
    });
</script>
@endsection