@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Teacher Attendance</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('teacherattendances.index') }}"> Back</a>
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
    @if(isset($teacherattendance))
    <form action="{{ route('teacherattendances.update',$teacherattendance->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('teacherattendances.store') }}" method="POST">
    @endif
        @csrf
            <div class="box-body">
            <div class="form-group">
                <label>Select Teacher</label>
                <select name="teacher_id" class="form-control">
                    <option value="">Select Teacher</option>
                    @php $teachers=\App\Model\Teacher\Teacher::all(); @endphp
                        @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}" @if(isset($teacherattendance->teacher_id)) {{ $teacherattendance->teacher->id == $teacher->id ? ' selected="selected"' : '' }} @else {{ old('teacher_id') == $teacher->id ? ' selected="selected"' : '' }}@endif >{{$teacher->teacher_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Academic Year</label>
                <select name="academic_year_id" class="form-control"  id="state-list">
                    <option value="">Select Academic Year </option>
                    @php $academicyears=\App\Model\AcademicYear\AcademicYear::all(); @endphp
                    @foreach($academicyears as $academicyear)
                    <option value="{{$academicyear->id}}" @if(isset($teacherattendance->academic_year_id)) {{ $teacherattendance->academic_year_id == $academicyear->id ? ' selected="selected"' : '' }} @else {{ old('academic_year_id') == $academicyear->id ? ' selected="selected"' : '' }}@endif >{{$academicyear->year}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Month</label>
                <select name="month_id" class="form-control">
                    <option value="">Select Month </option>
                        @foreach(Config::get('constants.months') as $key=>$month)
                        <option value="{{$key}}" @if(isset($teacherattendance->month_id)) {{ $teacherattendance->month_id == $key ? ' selected="selected"' : '' }} @else {{ old('month_id') == $key ? ' selected="selected"' : '' }}@endif >{{$month}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Attendance</label>
                <input maxlength="2" type="text" name="attendance" value = "{{isset($teacherattendance->attendance) ? $teacherattendance->attendance : old('attendance')}}" class="form-control" placeholder="Teacher Attendance ">
            </div>
            </div>    
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div> 

@endsection