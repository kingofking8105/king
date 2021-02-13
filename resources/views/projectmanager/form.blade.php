@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New  Project Manager</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('projectmanagers.index') }}"> Back</a>
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
    @if(isset($projectmanager))
    <form action="{{ route('projectmanagers.update',$projectmanager->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('projectmanagers.store') }}" method="POST">
    @endif
        @csrf
            <div class="box-body">
            <div class="form-group">
                <label>Select User</label>
                <select name="user_id" class="form-control">
                    <option value="">Select User</option>
                    @php $users=\App\User::all(); @endphp
                        @foreach($users as $user)
                    <option value="{{$user->id}}" @if(isset($projectmanager->user_id)) {{ $projectmanager->user->id == $user->id ? ' selected="selected"' : '' }} @else {{ old('user_id') == $user->id ? ' selected="selected"' : '' }}@endif >{{$user->name}}</option>
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