@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New  Ticket Comment</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('ticketcomments.index') }}"> Back</a>
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
    @if(isset($ticketcomment))
    <form action="{{ route('ticketcomments.update',$ticketcomment->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('ticketcomments.store') }}" method="POST">
    @endif
        @csrf
            <div class="box-body">
            <div class="form-group">
                <label>Select User</label>
                <select name="user_id" class="form-control">
                    <option value="">Select User</option>
                    @php $users=\App\User::all(); @endphp
                        @foreach($users as $user)
                    <option value="{{$user->id}}" @if(isset($ticketcomment->user_id)) {{ $ticketcomment->user->id == $user->id ? ' selected="selected"' : '' }} @else {{ old('user_id') == $user->id ? ' selected="selected"' : '' }}@endif >{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
           

            <div class="form-group">
                <label>Select Lc Ticket</label>
                <select name="lc_ticket_id" class="form-control">
                    <option value="">Select Lc Ticket</option>
                    @php $lctickets=\App\Model\LcTicket\LcTicket::all(); @endphp
                        @foreach($lctickets as $lcticket)
                        <option value="{{$lcticket->id}}" @if(isset($ticketcomment->lc_ticket_id)) {{ $ticketcomment->lc_ticket_id == $lcticket->id ? ' selected="selected"' : '' }} @else {{ old('lc_ticket_id') == $lcticket->id ? ' selected="selected"' : '' }}@endif >{{$lcticket->lc->lc_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                    <label for="">Comment</label>
                    <textarea required class="form-control" name="ticket_comments" rows="3" placeholder="Enter Address..." value ="">{{isset($ticketcomment->ticket_comments) ? htmlspecialchars($ticketcomment->ticket_comments) : old('ticket_comments')}}</textarea>
                </div>
            </div>    
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div> 

@endsection