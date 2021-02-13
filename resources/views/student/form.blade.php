@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New Student</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
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
    @if(isset($student))
    <form action="{{ route('students.update',$student->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('students.store') }}" method="POST">
    @endif
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label>Select Lc</label>
                <select name="lc_id" class="form-control">
                    <option value="">Select Lc </option>
                    @php $lcs=\App\Model\Lc\Lc::all(); @endphp
                        @foreach($lcs as $lc)
                        <option value="{{$lc->id}}" @if(isset($student->lc_id)) {{ $student->lc_id == $lc->id ? ' selected="selected"' : '' }} @else {{ old('lc_id') == $lc->id ? ' selected="selected"' : '' }}@endif >{{$lc->lc_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Class</label>
                <select name="current_class" class="form-control">
                        <option value="">Select Class </option>
                        @foreach(Config::get('constants.classes') as $class)
                        <option value="{{$class}}" @if(isset($student->current_class)) {{ $student->current_class == $class ? ' selected="selected"' : '' }} @else {{ old('current_class') == $class ? ' selected="selected"' : '' }}@endif >{{$class}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value = "{{isset($student->name) ? $student->name : old('name')}}" class="form-control" placeholder="Student Name ">
            </div>
            <div class="form-group">
                <label for="">Father Name</label>
                <input type="text" name="father_name" value = "{{isset($student->father_name) ? $student->father_name : old('father_name')}}" class="form-control" placeholder="Father Name ">
            </div>
           
            <div class="form-group">
                <label for="">Father Occupation</label>
                <input type="text" name="father_occupation" value = "{{isset($student->father_occupation) ? $student->father_occupation : old('father_occupation')}}" class="form-control" placeholder="Father Occupation ">
            </div>
            <div class="form-group">
                <label for="">Mother Name</label>
                <input type="text" name="mother_name" value = "{{isset($student->mother_name) ? $student->mother_name : old('mother_name')}}" class="form-control" placeholder="Mother Name ">
            </div>
            <div class="form-group">
                <label for="">Mother Occupation</label>
                <input type="text" name="mother_occupation" value = "{{isset($student->mother_occupation) ? $student->mother_occupation : old('mother_occupation')}}" class="form-control" placeholder="Mother Occupation ">
            </div>
            <div class="form-group">
                <label>Select Country</label>
                <select name="country_id" class="form-control" onChange="getState(this.value);" id="country-list">
                    <option value="">Select Country</option>
                    @php $countries=\App\Model\CountryState\Country::all(); @endphp
                        @foreach($countries as $country)
                    <option value="{{$country->id}}" @if(isset($student->country_id)) {{ $student->country->id == $country->id ? ' selected="selected"' : '' }} @else {{ old('country_id') == $country->id ? ' selected="selected"' : '' }}@endif >{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select State</label>
                <select name="state_id" class="form-control" onChange="getCity(this.value);" id="state-list">
                    <option value="">Select State</option>
                    @php $states=\App\Model\CountryState\State::all(); @endphp
                    @foreach($states as $state)
                    <option value="{{$state->id}}" @if(isset($student->state_id)) {{ $student->state->id == $state->id ? ' selected="selected"' : '' }} @else {{ old('state_id') == $state->id ? ' selected="selected"' : '' }}@endif >{{$state->state}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                  <label>Select District</label>
                  <select name="district_id" class="form-control" onChange="getBlock(this.value);" id="city-list" >
                      @php $districts=\App\Model\CountryState\District::all(); @endphp
                      @foreach($districts as $district)
                    <option value="{{$district->id}}"  @if(isset($student->block_id)) {{ $student->district->id == $district->id ? ' selected="selected"' : '' }} @else {{ old('district_id') == $district->id ? ' selected="selected"' : '' }}@endif >{{$district->district}}</option>
                    @endforeach
                  </select>
                </div>
            <div class="form-group">
                  <label>Select Block</label>
                  <select name="block_id" class="form-control" id="block-list" >
                      @php $blocks=\App\Model\CountryState\Block::all(); @endphp
                      @foreach($blocks as $block)
                    <option value="{{$block->id}}"  @if(isset($student->block_id)) {{ $student->block->id == $block->id ? ' selected="selected"' : '' }} @else {{ old('district_id') == $block->id ? ' selected="selected"' : '' }}@endif >{{$block->block}}</option>
                    @endforeach
                  </select>
                </div>
             <div class="form-group">
                <label>Select Academic Year</label>
                <select name="academic_year_id" class="form-control"  id="state-list">
                    <option value="">Select Academic Year </option>
                    @php $academicyears=\App\Model\AcademicYear\AcademicYear::all(); @endphp
                    @foreach($academicyears as $academicyear)
                    <option value="{{$academicyear->id}}" @if(isset($student->academic_year_id)) {{ $student->academic_year_id == $academicyear->id ? ' selected="selected"' : '' }} @else {{ old('academic_year_id') == $academicyear->id ? ' selected="selected"' : '' }}@endif >{{$academicyear->year}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea required class="form-control" name="address" rows="3" placeholder="Enter Address..." value ="">{{isset($student->address) ? htmlspecialchars($student->address) : old('address')}}</textarea>
            </div>
           
            <!-- Date -->
            <div class="form-group">
                <label>DOB:</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="dob" value="{{isset($student->dob) ? $student->dob : old('dob')}}" class="form-control pull-right" id="datepicker">
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
                    <input type="text" name="doj" value="{{isset($student->doj) ? $student->doj : old('doj')}}" class="form-control pull-right" id="datepicker">
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
                    <input type="text" name="dol" value="{{isset($student->dol) ? $student->dol : old('dol')}}" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
            </div>
            <div class="form-group">
                <label>Select Leave Reason</label>
                <select name="leave_reason_id" class="form-control"  id="state-list">
                    <option value="">Select Leave Reason </option>
                    @php $leavereasons=\App\Model\LeaveReason\LeaveReason::all(); @endphp
                    @foreach($leavereasons as $leavereason)
                    <option value="{{$leavereason->id}}" @if(isset($student->leave_reason_id)) {{ $student->leave_reason_id == $leavereason->id ? ' selected="selected"' : '' }} @else {{ old('leave_reason_id') == $leavereason->id ? ' selected="selected"' : '' }}@endif >{{$leavereason->reason}}</option>
                    @endforeach
                </select>
            </div>
            <!-- /.form group -->
            <div class="form-group">
                <label>Leave Description</label>
                <textarea  class="form-control" name="leave_description" rows="3" placeholder="Enter Description..." value ="">{{isset($student->leave_description) ? htmlspecialchars($student->leave_description) : old('leave_description')}}</textarea>
            </div>
            <!-- checkbox -->
            <span id="errorCheck" style="display:none;">Please Check on Status</span>
            <div class="form-group">
                <label>Status
                    <input type="checkbox" class="flat-red" name="status" @if(isset($student->status)) {{ $student->status == '1' ? ' checked="checked"' : '' }} @else {{ old('status') == '1' ? ' checked="checked"' : '' }}@endif>
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