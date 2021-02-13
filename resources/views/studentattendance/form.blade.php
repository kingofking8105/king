@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Student Attendance</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('studentattendances.index') }}"> Back</a>
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
    @if(isset($studentattendance))
    <form action="{{ route('studentattendances.update',$studentattendance->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('studentattendances.store') }}" method="POST">
    @endif
        @csrf
            <div class="box-body">
            <div class="form-group">
                <label>Select Student</label>
                <select name="student_id" class="form-control">
                    <option value="">Select Student</option>
                    @php $students=\App\Model\Student\Student::all(); @endphp
                        @foreach($students as $student)
                    <option value="{{$student->id}}" @if(isset($studentattendance->student_id)) {{ $studentattendance->student->id == $student->id ? ' selected="selected"' : '' }} @else {{ old('student_id') == $student->id ? ' selected="selected"' : '' }}@endif >{{$student->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Academic Year</label>
                <select name="academic_year_id" class="form-control"  id="state-list">
                    <option value="">Select Academic Year </option>
                    @php $academicyears=\App\Model\AcademicYear\AcademicYear::all(); @endphp
                    @foreach($academicyears as $academicyear)
                    <option value="{{$academicyear->id}}" @if(isset($studentattendance->academic_year_id)) {{ $studentattendance->academic_year_id == $academicyear->id ? ' selected="selected"' : '' }} @else {{ old('academic_year_id') == $academicyear->id ? ' selected="selected"' : '' }}@endif >{{$academicyear->year}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Month</label>
                <select name="month_id" class="form-control">
                    <option value="">Select Month </option>
                        @foreach(Config::get('constants.months') as $key=>$month)
                        <option value="{{$key}}" @if(isset($studentattendance->month_id)) {{ $studentattendance->month_id == $key ? ' selected="selected"' : '' }} @else {{ old('month_id') == $key ? ' selected="selected"' : '' }}@endif >{{$month}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Attendance</label>
                <input maxlength="2" type="text" name="attendance" value = "{{isset($studentattendance->attendance) ? $studentattendance->attendance : old('attendance')}}" class="form-control" placeholder="Student Attendance ">
            </div>
            </div>    
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div> 

@endsection