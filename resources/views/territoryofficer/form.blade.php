@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New  Territory Offier</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('territoryofficers.index') }}"> Back</a>
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
    @if(isset($territoryofficer))
    <form action="{{ route('territoryofficers.update',$territoryofficer->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('territoryofficers.store') }}" method="POST">
    @endif
        @csrf
            <div class="box-body">
            <div class="form-group">
                <label>Select User</label>
                <select name="user_id" class="form-control">
                    <option value="">Select User</option>
                    @php $users=\App\User::all(); @endphp
                        @foreach($users as $user)
                    <option value="{{$user->id}}" @if(isset($territoryofficer->user_id)) {{ $territoryofficer->user->id == $user->id ? ' selected="selected"' : '' }} @else {{ old('user_id') == $user->id ? ' selected="selected"' : '' }}@endif >{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
           

            <div class="form-group">
                <label>Select Project Officer</label>
                <select name="project_officer_id" class="form-control">
                    <option value="">Select Project Officer</option>
                    @php $projectofficers=\App\Model\ProjectOfficer\ProjectOfficer::all(); @endphp

                        @foreach($projectofficers as $projectofficer)
                        
                        <option value="{{$projectofficer->id}}" @if(isset($territoryofficer->project_officer_id)) {{ $territoryofficer->project_officer_id == $projectofficer->id ? ' selected="selected"' : '' }} @else {{ old('project_officer_id') == $projectofficer->id ? ' selected="selected"' : '' }}@endif >{{$projectofficer->user->name}}</option>
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