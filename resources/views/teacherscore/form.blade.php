@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Teacher Attendance</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('teacherscores.index') }}"> Back</a>
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
    @if(isset($teacherscore))
    <form action="{{ route('teacherscores.update',$teacherscore->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('teacherscores.store') }}" method="POST">
    @endif
        @csrf
            <div class="box-body">
            <div class="form-group">
                <label>Select Teacher</label>
                <select name="teacher_id" class="form-control">
                    <option value="">Select Teacher</option>
                    @php $teachers=\App\Model\Teacher\Teacher::all(); @endphp
                        @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}" @if(isset($teacherscore->teacher_id)) {{ $teacherscore->teacher->id == $teacher->id ? ' selected="selected"' : '' }} @else {{ old('teacher_id') == $teacher->id ? ' selected="selected"' : '' }}@endif >{{$teacher->teacher_name}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="">Score</label>
                <input maxlength="2" type="text" name="score" value = "{{isset($teacherscore->score) ? $teacherscore->score : old('score')}}" class="form-control" placeholder="Teacher Attendance ">
            </div>
            </div>    
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div> 

@endsection