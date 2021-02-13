@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Poc Management</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('pocs.index') }}"> Back</a>
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
    @if(isset($poc))
    <form action="{{ route('pocs.update',$poc->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('pocs.store') }}" method="POST">
    @endif
    @csrf
        <div class="box-body">
            <!-- <div class="form-group">
                <label>Select Poc Type</label>
                <select name="slug_name" class="form-control"  id="slug_name">
                    <option value="">Select Type</option>
                    <option value="Donor" @if(isset($poc->slug_name)) {{ $poc->slug_name == 'Donor' ? ' selected="selected"' : '' }} @else {{ old('slug_name') == 'Donor' ? ' selected="selected"' : '' }}@endif >Donor</option>
                    <option value="Pngo" @if(isset($poc->slug_name)) {{ $poc->slug_name == 'Pngo' ? ' selected="selected"' : '' }} @else {{ old('slug_name') == 'Pngo' ? ' selected="selected"' : '' }}@endif >Pngo</option>
                </select>
            </div> -->
            <div class="form-group">
            <input type="hidden" name="slug_name" value="{{request()->list}}">
                <label>Select Poc For</label>
                <select name="slug_id" class="form-control"  id="slug_id">
                <option value="">Select Poc For</option>
                    @php 
                    $slugs=[];
                    if(request()->list == 'Donor')
                        $slugs=\App\Model\Donor\Donor::all();
                    if(request()->list == 'Pngo')
                        $slugs=\App\Model\Pngo\Pngo::all();
                    @endphp
                    @foreach($slugs as $slug)
                    <option value="{{$slug->id}}" @if(isset($poc->slug_id)) {{ $poc->slug_id == $slug->id ? ' selected="selected"' : '' }} @else {{ old('slug_id') == $slug->id ? ' selected="selected"' : '' }}@endif >{{$slug->name}}</option>
                @endforeach
                </select>
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
            <span id="errorCheck" style="display:none;">Please Check on Status</span>
            <div class="form-group">
                <label>Status
                    <input type="checkbox" class="flat-red" name="poc_status" @if(isset($poc->poc_status)) {{ $poc->poc_status == '1' ? ' checked="checked"' : '' }} @else {{ old('poc_status') == '1' ? ' checked="checked"' : '' }}@endif>
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