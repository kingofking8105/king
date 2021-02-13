@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Lc Ticket</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('lctickets.index') }}"> Back</a>
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
    @if(isset($lctickets))
    <form action="{{ route('lctickets.update',$lcticket->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('lctickets.store') }}" method="POST">
    @endif
        @csrf
            <div class="box-body">
                <div class="form-group">
                    <label>Select Lc</label>
                    <select name="lc_id" class="form-control">
                        <option value="">Select Lc</option>
                        @php $lcs=\App\Model\Lc\Lc::all(); @endphp
                            @foreach($lcs as $lc)
                            <option value="{{$lc->id}}" @if(isset($lcticket->lc_id)) {{ $lcticket->lc_id == $lc->id ? ' selected="selected"' : '' }} @else {{ old('lc_id') == $lc->id ? ' selected="selected"' : '' }}@endif >{{$lc->lc_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Select Category</label>
                    <select name="comment_category_id" class="form-control">
                        <option value="">Select Category</option>
                        @php $commentcategories=\App\Model\LcTicketCategory\LcTicketCategory::all(); @endphp
                            @foreach($commentcategories as $commentcategory)
                            <option value="{{$commentcategory->id}}" @if(isset($lcticket->lc_ticket_category_id)) {{ $lcticket->lc_ticket_category_id == $commentcategory->id ? ' selected="selected"' : '' }} @else {{ old('lc_ticket_category_id') == $commentcategory->id ? ' selected="selected"' : '' }}@endif >{{$commentcategory->cat_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                <label>Select Allocate User</label>
                <select name="allocated_user_id" class="form-control">
                    <option value="">Select Allocate User</option>
                    @php $users=\App\User::all(); @endphp
                        @foreach($users as $user)
                    <option value="{{$user->id}}" @if(isset($lcticket->allocated_user_id)) {{ $lcticket->user->id == $user->id ? ' selected="selected"' : '' }} @else {{ old('allocated_user_id') == $user->id ? ' selected="selected"' : '' }}@endif >{{$user->name}}</option>
                    @endforeach
                </select>
                </div>
           
            <div class="form-group">
                    <label for="">Comment</label>
                    <textarea required class="form-control" name="comment" rows="3" placeholder="Enter Comment..." value ="">{{isset($lcticket->comment) ? htmlspecialchars($lcticket->comment) : old('comment')}}</textarea>
            </div>
                <!-- Date -->
            <div class="form-group">
                <label>End Date:</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="tgt_close_date" value="{{isset($lcticket->tgt_close_date) ? $lcticket->tgt_close_date : old('tgt_close_date')}}" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
            </div>
            <!-- /.form group -->                       
            <div class="form-group">
                <label>Select Status</label>
                <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    @foreach(Config::get('constants.ticketStatus') as $status)
                        <option value="{{$status}}" @if(isset($lcticket->status)) {{ $lcticket->status == $status ? ' selected="selected"' : '' }} @else {{ old('status') == $status ? ' selected="selected"' : '' }}@endif >{{$status}}</option>
                    @endforeach
                </select>
                </div>
            </div>    
                <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div> 

@endsection