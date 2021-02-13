@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Pngo Management</h1>
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
    @if(isset($pngo))
    <form action="{{ route('pngos.update',$pngo->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('pngos.store') }}" method="POST">
    @endif
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value = "{{isset($pngo->name) ? $pngo->name : old('name')}}" class="form-control" placeholder="Pngo Name ">
            </div>
            <div class="form-group">
                <label for="">Reg. Number</label>
                <input type="text" name="reg_no" value = "{{isset($pngo->reg_no) ? $pngo->reg_no : old('reg_no')}}" class="form-control" placeholder="Registration Number">
            </div>
            <div class="form-group">
                <label>Select Country</label>
                <select name="country_id" class="form-control" onChange="getState(this.value);" id="country-list">
                    <option value="">Select Country</option>
                    @php $countries=\App\Model\CountryState\Country::all(); @endphp
                        @foreach($countries as $country)
                    <option value="{{$country->id}}" @if(isset($pngo->country_id)) {{ $pngo->country->id == $country->id ? ' selected="selected"' : '' }} @else {{ old('country_id') == $country->id ? ' selected="selected"' : '' }}@endif >{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select State</label>
                <select name="state_id" class="form-control" onChange="getCity(this.value);" id="state-list">
                    <option value="">Select State</option>
                    @php $states=\App\Model\CountryState\State::all(); @endphp
                    @foreach($states as $state)
                    <option value="{{$state->id}}" @if(isset($pngo->state_id)) {{ $pngo->state->id == $state->id ? ' selected="selected"' : '' }} @else {{ old('state_id') == $state->id ? ' selected="selected"' : '' }}@endif >{{$state->state}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                  <label>Select District</label>
                  <select name="district_id" class="form-control" onChange="getBlock(this.value);" id="city-list" >
                      @php $districts=\App\Model\CountryState\District::all(); @endphp
                      @foreach($districts as $district)
                    <option value="{{$district->id}}"  @if(isset($pngo->block_id)) {{ $pngo->district->id == $district->id ? ' selected="selected"' : '' }} @else {{ old('district_id') == $district->id ? ' selected="selected"' : '' }}@endif >{{$district->district}}</option>
                    @endforeach
                  </select>
                </div>
            <div class="form-group">
                  <label>Select Block</label>
                  <select name="block_id" class="form-control" id="block-list" >
                      @php $blocks=\App\Model\CountryState\Block::all(); @endphp
                      @foreach($blocks as $block)
                    <option value="{{$block->id}}"  @if(isset($pngo->block_id)) {{ $pngo->block->id == $block->id ? ' selected="selected"' : '' }} @else {{ old('district_id') == $block->id ? ' selected="selected"' : '' }}@endif >{{$block->block}}</option>
                    @endforeach
                  </select>
                </div>
            <div class="form-group">
                <label>Select Pngo Type</label>
                <select name="pngo_type_id" class="form-control"  id="donor_type_id">
                <option value="">Select Pngo Type</option>
                    @php $pngotypes=\App\Model\Pngo\PngoType::all(); @endphp
                    @foreach($pngotypes as $pngotype)
                <option value="{{$pngotype->id}}" @if(isset($pngo->pngo_type_id)) {{ $pngo->pngo_type_id == $pngotype->id ? ' selected="selected"' : '' }} @else {{ old('pngo_type_id') == $pngotype->id ? ' selected="selected"' : '' }}@endif >{{$pngotype->pngo_type}}</option>
                @endforeach
                </select>
            </div>
           
            <div class="form-group">
                <label>Address</label>
                <textarea required class="form-control" name="address" rows="3" placeholder="Enter Address..." value ="">{{isset($pngo->address) ? htmlspecialchars($pngo->address) : old('address')}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Pincode</label>
                <input type="text" name="pincode" value = "{{isset($pngo->pincode) ? $pngo->pincode : old('pincode')}}" class="form-control" placeholder="Pincode">
            </div>
            <!-- Date -->
            <div class="form-group">
                <label>Association Date:</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="association_date" value="{{isset($pngo->association_date) ? $pngo->association_date : old('association_date')}}" class="form-control pull-right" id="datepicker">
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
                    <input type="text" name="date_of_exit" value="{{isset($pngo->date_of_exit) ? $pngo->date_of_exit : old('date_of_exit')}}" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
            </div>
            <!-- /.form group -->
            <div class="form-group">
                    <label for="">INR Bank Name</label>
                    <input type="text" name="inr_bank_name" value = "{{isset($pngo->inr_bank_name) ? $pngo->inr_bank_name : old('inr_bank_name')}}" class="form-control" placeholder="INR Bank Name ">
            </div>
            <div class="form-group">
                    <label for="">INR Account Number</label>
                    <input type="text" name="inr_account_no" value = "{{isset($pngo->inr_account_no) ? $pngo->inr_account_no : old('inr_account_no')}}" class="form-control" placeholder="INR Account Number ">
            </div>
            <div class="form-group">
                    <label for="">INR Ifsc Code</label>
                    <input type="text" name="inr_ifsc" value = "{{isset($pngo->inr_ifsc) ? $pngo->inr_ifsc : old('inr_ifsc')}}" class="form-control" placeholder="INR Ifsc Code">
            </div>
            <div class="form-group">
                    <label for="">INR Pan Number</label>
                    <input type="text" name="inr_pan" value = "{{isset($pngo->inr_pan) ? $pngo->inr_pan : old('inr_pan')}}" class="form-control" placeholder="INR Pan Number ">
            </div>
            <div class="form-group">
                    <label for="">FCRA Bank Name</label>
                    <input type="text" name="fcra_bank_name" value = "{{isset($pngo->fcra_bank_name) ? $pngo->fcra_bank_name : old('fcra_bank_name')}}" class="form-control" placeholder="FCRA Bank Name ">
            </div>
            <div class="form-group">
                    <label for="">FCRA Account Number</label>
                    <input type="text" name="fcra_account_no" value = "{{isset($pngo->fcra_account_no) ? $pngo->fcra_account_no : old('fcra_account_no')}}" class="form-control" placeholder="FCRA Account Number ">
            </div>
            <div class="form-group">
                    <label for="">FCRA Ifsc Code</label>
                    <input type="text" name="fcra_ifsc" value = "{{isset($pngo->fcra_ifsc) ? $pngo->fcra_ifsc : old('fcra_ifsc')}}" class="form-control" placeholder="FCRA Ifsc Code">
            </div>
            <div class="form-group">
                    <label for="">FCRA Pan Number</label>
                    <input type="text" name="fcra_pan" value = "{{isset($pngo->fcra_pan) ? $pngo->fcra_pan : old('fcra_pan')}}" class="form-control" placeholder="FCRA Pan Number ">
            </div>
            <!-- checkbox -->
            <span id="errorCheck" style="display:none;">Please Check on Status</span>
            <div class="form-group">
                <label>Status
                    <input type="checkbox" class="flat-red" name="status" @if(isset($pngo->status)) {{ $pngo->status == '1' ? ' checked="checked"' : '' }} @else {{ old('status') == '1' ? ' checked="checked"' : '' }}@endif>
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