@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New Teacher</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('teachers.index') }}"> Back</a>
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
    @if(isset($teacher))
    <form action="{{ route('teachers.update',$teacher->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('teachers.store') }}" method="POST">
    @endif
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label>Select Lc</label>
                <select name="lc_id" class="form-control">
                    <option value="">Select Lc </option>
                    @php $lcs=\App\Model\Lc\Lc::all(); @endphp
                        @foreach($lcs as $lc)
                        <option value="{{$lc->id}}" @if(isset($teacher->lc_id)) {{ $teacher->lc_id == $lc->id ? ' selected="selected"' : '' }} @else {{ old('lc_id') == $lc->id ? ' selected="selected"' : '' }}@endif >{{$lc->lc_name}}</option>
                    @endforeach
                </select>
            </div>
           
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="teacher_name" value = "{{isset($teacher->teacher_name) ? $teacher->teacher_name : old('teacher_name')}}" class="form-control" placeholder="Teacher Name ">
            </div>
            <div class="form-group">
                <label for="">Qualification</label>
                <input type="text" name="teacher_qualifi" value = "{{isset($teacher->teacher_qualifi) ? $teacher->teacher_qualifi : old('teacher_qualifi')}}" class="form-control" placeholder="Teacher Qualification">
            </div>
           
            <div class="form-group">
                <label for="">Pan Number</label>
                <input type="text" name="teacher_pan" value = "{{isset($teacher->teacher_pan) ? $teacher->teacher_pan : old('teacher_pan')}}" class="form-control" placeholder="Pan Number ">
            </div>
            <div class="form-group">
                <label for="">Aadhar Number</label>
                <input type="text" name="teacher_aadhar" value = "{{isset($teacher->teacher_aadhar) ? $teacher->teacher_aadhar : old('teacher_aadhar')}}" class="form-control" placeholder="Aadhar Number ">
            </div>
            <div class="form-group">
                <label for="">Mobile</label>
                <input type="text" name="teacher_mobile" value = "{{isset($teacher->teacher_mobile) ? $teacher->teacher_mobile : old('teacher_mobile')}}" class="form-control" placeholder="Mobile Number ">
            </div>
            <div class="form-group">
                <label>Select Country</label>
                <select name="country_id" class="form-control" onChange="getState(this.value);" id="country-list">
                    <option value="">Select Country</option>
                    @php $countries=\App\Model\CountryState\Country::all(); @endphp
                        @foreach($countries as $country)
                    <option value="{{$country->id}}" @if(isset($teacher->country_id)) {{ $teacher->country->id == $country->id ? ' selected="selected"' : '' }} @else {{ old('country_id') == $country->id ? ' selected="selected"' : '' }}@endif >{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select State</label>
                <select name="state_id" class="form-control" onChange="getCity(this.value);" id="state-list">
                    <option value="">Select State</option>
                    @php $states=\App\Model\CountryState\State::all(); @endphp
                    @foreach($states as $state)
                    <option value="{{$state->id}}" @if(isset($teacher->state_id)) {{ $teacher->state->id == $state->id ? ' selected="selected"' : '' }} @else {{ old('state_id') == $state->id ? ' selected="selected"' : '' }}@endif >{{$state->state}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                  <label>Select District</label>
                  <select name="district_id" class="form-control" onChange="getBlock(this.value);" id="city-list" >
                      @php $districts=\App\Model\CountryState\District::all(); @endphp
                      @foreach($districts as $district)
                    <option value="{{$district->id}}"  @if(isset($teacher->block_id)) {{ $teacher->district->id == $district->id ? ' selected="selected"' : '' }} @else {{ old('district_id') == $district->id ? ' selected="selected"' : '' }}@endif >{{$district->district}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                <label for="">Pincode</label>
                <input type="text" name="pincode" value = "{{isset($teacher->pincode) ? $teacher->pincode : old('pincode')}}" class="form-control" placeholder="Pincode">
            </div>
            <div class="form-group">
                <label for="">Bank Name</label>
                <input type="text" name="bank_name" value = "{{isset($teacher->bank_name) ? $teacher->bank_name : old('bank_name')}}" class="form-control" placeholder="Bank Name ">
            </div>
            <div class="form-group">
                <label for="">Account No.</label>
                <input type="text" name="account_no" value = "{{isset($teacher->account_no) ? $teacher->account_no : old('account_no')}}" class="form-control" placeholder="Account Number ">
            </div>
            <div class="form-group">
                <label for="">Ifsc</label>
                <input type="text" name="ifsc" value = "{{isset($teacher->ifsc) ? $teacher->ifsc : old('ifsc')}}" class="form-control" placeholder="Ifsc">
            </div>
             
            <div class="form-group">
                <label>Address</label>
                <textarea required class="form-control" name="teacher_address" rows="3" placeholder="Enter Address..." value ="">{{isset($teacher->teacher_address) ? htmlspecialchars($teacher->teacher_address) : old('address')}}</textarea>
            </div>
           
            <!-- Date -->
            <div class="form-group">
                <label>DOB:</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="teacher_dob" value="{{isset($teacher->teacher_dob) ? $teacher->teacher_dob : old('teacher_dob')}}" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
            </div>
            <!-- /.form group -->
            <!-- Date -->
            <div class="form-group">
                <label>Date Of Joining:</label>

                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="teacher_doj" value="{{isset($teacher->teacher_doj) ? $teacher->teacher_doj : old('teacher_doj')}}" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
            </div>
            <!-- /.form group -->
            <!-- Date -->
            <div class="form-group">
                <label>Date of Leaving:</label>

                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="teacher_dol" value="{{isset($teacher->teacher_dol) ? $teacher->teacher_dol : old('teacher_dol')}}" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
            </div>
            
            <!-- checkbox -->
            <span id="errorCheck" style="display:none;">Please Check on Status</span>
            <div class="form-group">
                <label>Status
                    <input type="checkbox" class="flat-red" name="status" @if(isset($teacher->status)) {{ $teacher->status == '1' ? ' checked="checked"' : '' }} @else {{ old('status') == '1' ? ' checked="checked"' : '' }}@endif>
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