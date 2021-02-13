@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Teacher Attendance</h3>
              <div class="pull-right">
            @can('teacherattendance-create')
            <a class="btn btn-success" href="{{ route('teacherattendances.create') }}" > Create TeacherAttendance</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>TeacherName</th>
                  <th>Month</th>
                  <th>Academic Year</th>
                  <th>TeacherAttendance</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($teacherattendances as $key => $teacherattendance)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$teacherattendance->teacher->teacher_name}}</td>
                  <td>{{$teacherattendance->month_id}}</td>
                  <td>{{$teacherattendance->academicYear->year}}</td>
                  <td>{{$teacherattendance->attendance}}</td>

                  <td>
                        @can('teacherattendance-edit')
                            <a class="btn btn-primary" href="{{ route('teacherattendances.edit',$teacherattendance->id) }}">Edit</a>
                        @endcan
                        @can('teacherattendance-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['teacherattendances.destroy', $teacherattendance->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @empty
                No Data Found !!

                @endforelse
               
               
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>TeacherName</th>
                  <th>Month</th>
                  <th>Academic Year</th>
                  <th>TeacherAttendance</th>
                  <th>Actions</th>        
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection