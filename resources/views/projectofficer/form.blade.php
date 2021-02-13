@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New  Project Offier</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('projectofficers.index') }}"> Back</a>
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
    @if(isset($projectofficer))
    <form action="{{ route('projectofficers.update',$projectofficer->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('projectofficers.store') }}" method="POST">
    @endif
        @csrf
            <div class="box-body">
            <div class="form-group">
                <label>Select User</label>
                <select name="user_id" class="form-control">
                    <option value="">Select User</option>
                    @php $users=\App\User::all(); @endphp
                        @foreach($users as $user)
                    <option value="{{$user->id}}" @if(isset($projectofficer->user_id)) {{ $projectofficer->user->id == $user->id ? ' selected="selected"' : '' }} @else {{ old('user_id') == $user->id ? ' selected="selected"' : '' }}@endif >{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
           

            <div class="form-group">
                <label>Select Project Manager</label>
                <select name="project_manager_id" class="form-control">
                    <option value="">Select Project Manager</option>
                    @php $projectmanagers=\App\Model\ProjectManager\ProjectManager::all(); @endphp

                        @foreach($projectmanagers as $projectmanager)
                        
                        <option value="{{$projectmanager->id}}" @if(isset($projectofficer->project_manager_id)) {{ $projectofficer->project_manager_id == $projectmanager->id ? ' selected="selected"' : '' }} @else {{ old('project_manager_id') == $projectmanager->id ? ' selected="selected"' : '' }}@endif >{{$projectmanager->user->name}}</option>
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